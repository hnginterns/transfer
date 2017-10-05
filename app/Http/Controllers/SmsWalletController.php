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
                    'username' => $wallet['username'],
                    'balance' => $response->raw_body
                ];

            array_push($smswalletdetails, $detail);
        }

        return view('admin.smswallet', compact('smswalletdetails'));
    }
}
