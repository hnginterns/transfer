<?php

namespace App\Http\Controllers;

use URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\SmsWallet;
use App\SmsWalletFund;
use App\CardWallet;
use Unirest;
use App\Wallet;
use App\Events\FundWallet;
use App\SmsWalletTransaction;

class SmsWalletController extends Controller
{
    public function index()
    {
        return $wallets = SmsWallet::all();
    }
    public function delete_sms(Request $request, $id){
        SmsWallet::find($id)->delete();
        return back()->with('success', 'SMS Account deleted successfully');
    }



    public function smsWalletBalance(SmsWalletFund $sms)
    {
        $smswalletdetails = array();

        $smswallet = CardWallet::latest()->first();

        $wallet = $this->index();

        $smsWallet = Wallet::where('type', 'sms')->first();

        $accounts = SmsWallet::all();

        Unirest\Request::verifyPeer(false); /** Remember to remove this line of code before pushing to production server**/

        foreach ($wallet as $key => $wallet) {
            $headers = array('content-type' => 'application/json');
            $username = $wallet['username'];
            $api_key = $wallet['api_key'];
            $url = 'http://api.ebulksms.com:8080/balance/'.$username.'/'.$api_key;
            $response = Unirest\Request::get($url, $headers);

            $detail  = [
                    'id' => $wallet['id'],
                    'username' => $wallet['username'],
                    'bank_code' => $wallet['bank_code'],
                    'bank_account' => $wallet['bank_account'],
                    'balance' => $response->raw_body,
                    ];

            array_push($smswalletdetails, $detail);
        }

        
        //$balance = $smswalletdetails[0]['balance'];

        return view('admin.smswallet2', compact('accounts', 'smsWallet', 'balance', 'smswalletdetails', 'smswallet'));
    }

    public function getUserDetails(Request $request)
    {
        $user = SmsWallet::where('username', $request->email)->first();
        $user->transaction_id = $this->generate_ref();
        echo json_encode($user->toArray());
    }

    

    public function generate_ref()
    {
        return str_random(15);
    }

    public function getToken()
    {
        $api_key = "lv_I4EE93OHHDADBW7DVLNJ";
        $secret_key = "lv_HTCYZPYLQG7O12C0DC5PXMLWLZ02T2";
        \Unirest\Request::verifyPeer(false);
        $headers = array('content-type' => 'application/json');
        $query = array('apiKey' => $api_key, 'secret' => $secret_key);
        $body = \Unirest\Request\Body::json($query);
        $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/merchant/verify', $headers, $body);
        $response = json_decode($response->raw_body, true);
        $status = $response['status'];
        if (!$status == 'success') {
            echo 'INVALID TOKEN';
        } else {
            $token = $response['token'];
            return $token;
        }
    }

    public function smsWallet(Request $request, Wallet $wallet)
    {

        $smsWallet = Wallet::where('type', 'sms')->first();
        $token = $this->getToken();
        $headers = array('content-type' => 'application/json', 'Authorization' => $token);
        $query = array(
            "firstname" => $request->fname,
            "lastname" => $request->lname,
            "email" => $request->emailaddr,
            "phonenumber" => $request->phone,
            "recipient" => "wallet",
            "recipient_id" => $smsWallet->wallet_code,
            "card_no" => $request->card_no,
            "cvv" => $request->cvv,
            "pin" => $request->pin, //optional required when using VERVE card
            "expiry_year" => $request->expiry_year,
            "expiry_month" => $request->expiry_month,
            "charge_auth" => "PIN", //optional required where card is a local Mastercard
            "apiKey" => env('API_KEY'),
            "amount" => $request->amount,
            "fee" => 0,
            "medium" => "web",
            //"redirecturl" => "https://google.com"
        );
        $body = \Unirest\Request\Body::json($query);

        $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/transfer', $headers, $body);
        $response = json_decode($response->raw_body, TRUE);
         if($response['status'] == 'success') {
            $response = $response['data']['transfer'];
            $transRef = $response['flutterChargeReference'];
            $data = [];
            $data['message'] = $response['flutterChargeResponseMessage'];
            $data['reference'] = $response['flutterChargeReference'];
            
            $transaction = new CardWallet;
            $transaction->firstName = $response['firstName'];
            $transaction->lastName = $response['lastName'];
            $transaction->phoneNumber = $response['phoneNumber'];
            $transaction->amount = $response['amountToSend'];
            $transaction->wallet_name = $request->wallet_name;
            $transaction->status = $response['status'];
            $transaction->ref = $transRef;

           $transaction->save();

                return back()->with('status', array($data));
           
        }else{
            return back()->with('error', $response['message']);
        }
    }

    public function Otp(Request $request, CardWallet $cardWallet)
    {
        \Unirest\Request::verifyPeer(false);

            $headers = array('content-type' => 'application/json');
            $query = array(
                'transactionRef'=>$request->ref,
                'otp' => $request->otp
            );
            $body = \Unirest\Request\Body::json($query);
            $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/transfer/charge/auth/card', $headers, $body);
            $response = json_decode($response->raw_body, true);
            if($response['status'] == 'success') {
                event(new FundWallet($cardWallet));
                $response = $response['data']['flutterChargeResponseMessage'];
                Session::flash('success', 'Wallet funding successful');
                return redirect('admin/smswallet');
            }
            return redirect('admin/smswallet')->with('error', $response['message']);

    }

    public function addSmsAccount(Request $request)
    {
        $smsAccount = new SmsWallet;
        $smsAccount->username = $request->username;
        $smsAccount->bank_code = $request->bank_code;
        $smsAccount->bank_account = $request->bank_account;
        $smsAccount->api_key = $request->api_key;

        $smsAccount->save();

        return back()->with('success', 'Account added successfully');
    }

    //transfer from wallet to bank
    public function transferAccount(Request $request, Wallet $wallet, SmsWalletTransaction $sms)
    {
                // dd($request);
                $smsWallet = Wallet::where('type', 'sms')->first();
                $token = $this->getToken();
                $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                //$beneficiary = Beneficiary::find($request->beneficiary_id);
                $query = array(
                    "lock" => $smsWallet->lock_code,
                    "amount" => $request->amount,
                    "bankcode" => "057",
                    "accountNumber" => $request->account_number,
                    "currency" => "NGN",
                    "senderName" => Auth::user()->username,
                    "narration" => "ebulksms", //Optional
                    "ref" => $this->generate_ref(), // No Refrence from request
                    "walletUref" => $smsWallet->wallet_code
                );

                //Api call to moneywave for transaction
                $body = \Unirest\Request\Body::json($query);
                $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/disburse', $headers, $body);
                $response = json_decode($response->raw_body, true);
                $status = $response['status'];
                //end of Api call

                if ($status == 'success'){
                    //logic to persist transaction details
                    $response = $response['data']['data'];
                    $response = $response['uniquereference'];
                    $transaction = new SmsWalletTransaction;
                    $transaction->uuid = Auth::user()->id;
                    $transaction->bank_name = "Zenith Bank";
                    $transaction->account_number = $request->account_number;
                    $transaction->reference = $response;
                    $transaction->save();
                    //end of logic for saving transactions


                    event(new FundWallet($sms));
                    //\LogUserActivity::addToLog(auth()->user()->name.'transferred '.$transactions->amount.' from '. $transactions->source->wallet_name.' to '.$transactions->beneficiary->name);
                    Session::flash('success', 'Transfer successful');
                    return redirect('admin/smswallet');
                } else {
                    Session::flash('error',$response['message']);
                    return back();
                }
        }

}