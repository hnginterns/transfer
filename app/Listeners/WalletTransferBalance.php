<?php

namespace App\Listeners;

use App\Wallet;
use App\Events\WalletToWallet;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WalletTransferBalance
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
        $api_key = env('API_KEY');
        $secret_key = env('API_SECRET');
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


    /**
     * Handle the event.
     *
     * @param  WalletToWallet  $event
     * @return void
     */
    public function handle(WalletToWallet $event)
    {
        $token = $this->getToken();
        $headers = array('content-type' => 'application/json', 'Authorization' => $token);
        $response = \Unirest\Request::get('https://moneywave.herokuapp.com/v1/wallet', $headers);
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
