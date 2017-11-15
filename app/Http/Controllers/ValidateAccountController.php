<?php

namespace App\Http\Controllers;

class ValidateAccountController extends Controller
{
    /**
     * Create a new controller instance.
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
        $query =  array('apiKey' => $api_key, 'secret' => $secret_key);

        $body = \Unirest\Request\Body::json($query);

        $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/merchant/verify', $headers, $body);

        $response = json_decode($response->raw_body, true);

        $status = $response['status'];

        if (! $status == 'success') {
            echo 'INVALID TOKEN';
        } else {
            $token = $response['token'];

            return $token;
        }
    }

    public function accountResolve()
    {
        $token = $this->getToken();
        $headers = array('content-type' => 'application/json','Authorization'=> $token);
        $query = array('account_number'=> "0921318712",'bank_code' => "058");
        $body = \Unirest\Request\Body::json($query);
        $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/resolve/account', $headers, $body);

        $data=json_decode($response->raw_body, true);
        var_dump($data);
        die();
    }
}
