<?php

namespace App\Listeners;

use App\Wallet;
use App\Events\FundWallet;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FundWalletBalance
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
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

    /**
     * Handle the event.
     *
     * @param  FundWallet  $event
     * @return void
     */
    public function handle(FundWallet $event)
    {
          
       $token = $this->getToken();
        $headers = array('content-type' => 'application/json', 'Authorization' => $token);
        $response = \Unirest\Request::get('https://live.moneywaveapi.co/v1/wallet', $headers);
        $data = json_decode($response->raw_body, true);
        $walletBalance = $data['data'];
        //var_dump($walletBalance);
        //die();
        foreach($walletBalance as $wallets)
                        {
            
                        Wallet::where('wallet_code', $wallets['uref'])
                        ->update(['balance'=> $wallets['balance']]);
    
                        //return view('walletBalance', compact('walletBalance'));
                        }
    }
}
