<?php

namespace App\Http\Controllers;

use URL;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SmsWallet;
use App\SmsWalletFund;
use App\CardWallet;
use Unirest;
use App\Wallet;
use App\Events\FundWallet;

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

    public function smsWalletTopup(Request $request)
    {
        // var token = getToken("ts_Q8PES8G6QJFI2RI1THN1","ts_AM2PIJ8VTPYLBK1K6EJDEXD9STLC6G");

        $header = array('content-type' => 'application/json');
        $query = array(
            'apiKey' => 'ts_Q8PES8G6QJFI2RI1THN1',
            'secret' => 'ts_AM2PIJ8VTPYLBK1K6EJDEXD9STLC6G'
        );
        $response = Unirest\Request::post('https://moneywave.herokuapp.com/v1/merchant/verify', $header, $query);
        
        // $user = SmsWallet::where('username', $request->email)->first();
        $url = "https://moneywave.herokuapp.com/v1/disburse";
        $headers = array(
            'content-type' => 'application/json',
            'Authorization' => $request->request_token,
        );
        $data = [
            "lock" => "abc12345",
            "amount" => $request->amount,
            "bankcode" => $request->bank_code,
            "accountNumber" => $request->account,
            "currency" => "NGN",
            "senderName" => "TransferRule",
            "narration" => 'Transfer for data', //Optional
            "ref" => $this->generate_ref(),
        ];
        $body = Unirest\Request\Body::form($data);
        $response = Unirest\Request::post($url, $headers, $data);
        
        return redirect()->to(URL::previous())->with('response', $response->body);
    }
    



    public function generate_ref()
    {
        return str_random(15);
    }

    public function getToken()
    {
        $api_key =env('API_KEY');
        $secret_key = env('API_SECRET');
        \Unirest\Request::verifyPeer(false);
        $headers = array('content-type' => 'application/json');
        $query = array('apiKey' => $api_key, 'secret' => $secret_key);
        $body = \Unirest\Request\Body::json($query);
        $response = \Unirest\Request::post(env('API_KEY_LIVE_URL').'/v1/merchant/verify', $headers, $body);
        $response = json_decode($response->raw_body, true);
        $status = $response['status'];
        if (!$status == 'success') {
            echo 'INVALID TOKEN';
        } else {
            $token = $response['token'];
            return $token;
        }
    }

    public function smsWallet(Request $request)
    {
        $token = $this->getToken();
        $headers = array('content-type' => 'application/json', 'Authorization' => $token);
        $query = array(
            "firstname" => $request->fname,
            "lastname" => $request->lname,
            "email" => $request->emailaddr,
            "phonenumber" => $request->phone,
            "recipient" => "wallet",
            "card_no" => $request->card_no,
            "cvv" => $request->cvv,
            "pin" => $request->pin, //optional required when using VERVE card
            "expiry_year" => $request->expiry_year,
            "expiry_month" => $request->expiry_month,
            "charge_auth" => "PIN", //optional required where card is a local Mastercard
            "apiKey" => "ts_Q8PES8G6QJFI2RI1THN1",
            "amount" => $request->amount,
            "fee" => 0,
            "medium" => "web",
            //"redirecturl" => "https://google.com"
        );
        $body = \Unirest\Request\Body::json($query);

        $response = \Unirest\Request::post(env('API_KEY_LIVE_URL').'/v1/transfer', $headers, $body);
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
            $response = \Unirest\Request::post(env('API_KEY_LIVE_URL').'/v1/transfer/charge/auth/card', $headers, $body);
            $response = json_decode($response->raw_body, true);
            if($response['status'] == 'success') {
                $response = $response['data']['flutterChargeResponseMessage'];
                Session::flash('success', $response);
                return redirect('admin/smswallet2');
            }
            return redirect('admin/smswallet2')->with('error', $response['message']);

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
    public function transferAccount(Request $request, Wallet $wallet, BankTransaction $bank)
    {
        $validator = $this->validateBeneficiary($request->all());
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            Session::flash('form-errors', $messages);
            return redirect()->to(URL::previous());
        } else {
                $token = $this->getToken();
                $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                $beneficiary = Beneficiary::find($request->beneficiary_id);
                $query = array(
                    "lock" => $wallet->lock_code,
                    "amount" => $request->amount,
                    "bankcode" => $beneficiary->bank->bank_code,
                    "accountNumber" => $beneficiary->account_number,
                    "currency" => "NGN",
                    "senderName" => Auth::user()->username,
                    "narration" => $request->narration, //Optional
                    "ref" => $request->reference, // No Refrence from request
                    "walletUref" => $wallet->wallet_code
                );

                //checks for permissions
                $permit = Restriction::where('wallet_id', $wallet->id)
                        ->where('uuid', Auth::user()->id)
                        ->first();
                
                if($permit == null){
                    Session::flash('error', 'You do not have access to this wallet');
                    return redirect('/dashboard');
                }    
                 $restrict = new Restrict($permit, $request);
                     $errors = $restrict->transferToBank();
                if(count($errors) != 0){
                    Session::flash('errors', $errors);
                    return back();
                }
                //end of permission checks

                //Api call to moneywave for transaction
                $body = \Unirest\Request\Body::json($query);
                $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/disburse', $headers, $body);
                $response = json_decode($response->raw_body, true);
                $status = $response['status'];
                //end of Api call

                if ($status == 'success') {

                    //data to be parsed to display transaction details
                    $data = $response['data']['data'];
                    $data['senderName'] = Auth::user()->username;
                    $data['walletCodeSender'] = $wallet->wallet_code;
                    $data['receiverName'] = $beneficiary->name;
                    $data['beneficiaryAccount'] = $beneficiary->account_number;
                    $data['amount'] = $request->amount;
                    $data['narration'] = $request->narration;
                    //end of data prep

                    //logic to persist transaction details
                    $transaction = new BankTransaction;
                    $transaction->wallet_id = $wallet->id;
                    $transaction->amount = $request->amount;
                    $transaction->uuid =  Auth::user()->id;
                    $transaction->beneficiary_id = $beneficiary->id;
                    $transaction->transaction_reference = $data['uniquereference'];
                    $transaction->transaction_status = true;
                    $transaction->narration = $request->narration;
                    $transaction->save();
                    //end of logic for saving transactions


                    event(new FundWallet($bank));
                    $this->sendBankTransactionNotifications($transaction);
                    $transactions = BankTransaction::latest()->first();
                    //\LogUserActivity::addToLog(auth()->user()->name.'transferred '.$transactions->amount.' from '. $transactions->source->wallet_name.' to '.$transactions->beneficiary->name);
                    
                    return redirect('success')->with('status',$data);
                } else {
                    Session::flash('error',$response['message']);
                    return back();
                }
        }
    }
    


}