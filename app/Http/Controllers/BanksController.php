<?php

namespace App\Http\Controllers;


class BanksController extends Controller
{
      public function banks()
    {

        function is_curl() {
            return function_exists('curl_version');
        }

        //var_dump(is_curl());

        //die();
        \Unirest\Request::verifyPeer(false);
        $headers = array('content-type' => 'application/json');
        $response = \Unirest\Request::post('https://moneywave.herokuapp.com/banks', $headers);
        $data = json_decode($response->raw_body, TRUE);
        $banks = $data['data'];

        return view('banks', compact('banks'));
    }
}
