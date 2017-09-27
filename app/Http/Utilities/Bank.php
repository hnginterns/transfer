<?php

namespace App\Http\Utilities;

use Unirest;

class Bank {

	public static function all() 
	{

		Unirest\Request::verifyPeer(false);
        
        $headers = array('content-type' => 'application/json');
        $response = Unirest\Request::post('https://moneywave.herokuapp.com/banks', $headers);
        $data = json_decode($response->raw_body, TRUE);
        $banks = $data['data'];

        return $banks;

	}
}