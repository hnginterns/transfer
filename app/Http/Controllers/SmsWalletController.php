<?php

namespace App\Http\Controllers;

use URL;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SmsWallet;
use App\SmsWalletFund;
use Unirest;
use App\Wallet;

class SmsWalletController extends Controller
{
    public function index()
    {
        return $wallets = SmsWallet::all();
    }



    public function smsWalletBalance(SmsWalletFund $sms)
    {
        $smswalletdetails = array();

        $sms = SmsWalletFund::latest()->first();

        $wallet = $this->index();

        $smsWallet = Wallet::where('type', 'sms')->first();

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

        return view('admin.smswallet2', compact('smsWallet', 'smswalletdetails', 'sms'));
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
        var_dump($response);
        exit();

        $user = SmsWallet::where('username', $request->email)->first();
        $url = "https://moneywave.herokuapp.com/v1/disburse";
        $headers = array(
            'content-type' => 'application/json',
            'Authorization' => $request->request_token,
        );
        $data = [
            "lock" => "abc12345",
            "amount" => $request->amount,
            "bankcode" => $user->bank_code,
            "accountNumber" => $user->account,
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
        $api_key = "ts_Q8PES8G6QJFI2RI1THN1";
        $secret_key = "ts_AM2PIJ8VTPYLBK1K6EJDEXD9STLC6G";
        \Unirest\Request::verifyPeer(false);
        $headers = array('content-type' => 'application/json');
        $query = array('apiKey' => $api_key, 'secret' => $secret_key);
        $body = \Unirest\Request\Body::json($query);
        $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/merchant/verify', $headers, $body);
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

        $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/transfer', $headers, $body);
        $response = json_decode($response->raw_body, TRUE);
        var_dump($response);
        die();
        if($response['status'] == 'success') {
            $response = $response['data']['transfer'];
            $transMsg = $response['flutterChargeResponseMessage'];
            $transRef = $response['flutterChargeReference'];
            
            $transaction = new SmsWalletFund;
            $transaction->firstName = $response['firstName'];
            $transaction->lastName = $response['lastName'];
            $transaction->phoneNumber = $response['phoneNumber'];
            $transaction->amount = $response['amountToSend'];
            $transaction->ref = $transRef;

            $transaction->save();

            return back()->with('status', $transMsg);
        }else{
            return back()->with('status', 'Transaction Failed');
        }
    }

    public function Otp(Request $request)
    {
        \Unirest\Request::verifyPeer(false);

            $headers = array('content-type' => 'application/json');
            $query = array(
                'transactionRef'=>$request->ref,
                'otp' => $request->otp
            );
            $body = \Unirest\Request\Body::json($query);

            $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/transfer/charge/auth/card', $headers, $body);
            $response = json_decode($response->raw_body, true);
            $response = $response['data']['flutterChargeResponseMessage'];
            return redirect('admin/smswallet')->with('status', $response);
    }
    

}
