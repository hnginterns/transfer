<?php

namespace App\Http\Controllers;


class BanksController extends Controller
{

    
    public function banks()
    {
      

        function _isCurl(){
    return function_exists('curl_version');
}

        var_dump(_isCurl());
        die();
        $headers = array('content-type' => 'application/json');
        $response = \Unirest\Request::post('https://moneywave.herokuapp.com/banks', $headers);
        $data = json_decode($response->raw_body, TRUE);
        $banks = $data['data'];
        var_dump($response);
        die();
        
        return view('banks', compact('banks'));
    }
}
