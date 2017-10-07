<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SmsWallet;
use Unirest;

class SmsWalletController extends Controller
{
    public function index()
    {
        return $wallets = SmsWallet::all();
    }



    public function smsWalletBalance()
    {
        $smswalletdetails = array();

        $wallet = $this->index();

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

        return view('admin.smswallet2', compact('smswalletdetails'));
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
        echo json_encode($response->body);
    }

    public function generate_ref()
    {
        return str_random(15);
    }
}
