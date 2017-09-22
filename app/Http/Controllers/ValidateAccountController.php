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

    public function confirm()
    {

        $api_key = 'ts_JUBPJL85J00GNA1GXYO9';
        $secret_key = 'ts_8AO05U4I1HR4J5X5TIPQNQRA6F1QZF';

         \Unirest\Request::verifyPeer(false);

        $headers = array('content-type' => 'application/json');
        $query = array('apiKey' => $api_key, 'secret' => $secret_key);
        $body = \Unirest\Request\Body::json($query);

        $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/merchant/verify', $headers, $body);
        $response = json_decode($response->raw_body, TRUE);

        $status = $response['status'];

            if (! $status == 'success'){

                    echo 'invalid token';
                    
            } else {

                    $token = $response['token'];

                    $headers = array('content-type' => 'application/json','Authorization'=> $token);

                    $query = array('account_number'=> "0921318712",'bank_code' => "058");
                    $body = \Unirest\Request\Body::json($query);
                    $result = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/resolve/account', $headers, $body);

                    $result = json_decode($result->raw_body, TRUE);
                     $result = $result['status'];

                     return view('validate', compact('result'));
            }
    }
}

