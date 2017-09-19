<?php

namespace App\Http\Controllers;
use Mashape/Unirest;

class GetWalletController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    
    public function getBalance(){
    	$headers_auth = array('content-type' => 'application/json');
        $query_auth = array('apiKey' => 'ts_RFT193Z91HXEP94ZGIO3', 'secret' => 'ts_JFOW3J6Y4BHDX9VRIPWXLGURWM2GX2');
        $body = Unirest\Request\Body::json($query_auth);
        $response_auth = Unirest\Request::post('https://moneywave.herokuapp.com/v1/merchant/verify', $headers_auth, $body);
        $headers = array('content-type' => 'application/json','Authorization'=>$response_auth->body->token);
        $response = Unirest\Request::get('https://moneywave.herokuapp.com/v1/wallet', $headers);
        print_r($response->body->data);
    }
}
