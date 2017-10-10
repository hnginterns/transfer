<?php

namespace App\Http\Utilities;

use Unirest;

class Wallet {

	public static function getToken(){
        $api_key = 'ts_VZJ5K36HYKSVE4VRS5VC';
        $secret_key = 'ts_09443SHY1WRF56TZBYRK0Z55OOO68C';

        \Unirest\Request::verifyPeer(true);

        $headers = array('content-type' => 'application/json'); 
        $query =  array('apiKey' => $api_key, 'secret' => $secret_key);

        $body = \Unirest\Request\Body::json($query);

        $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/merchant/verify', $headers, $body);

        $response = json_decode($response->raw_body, TRUE);

        $status = $response['status'];

            if (! $status == 'success') {
                echo 'INVALID TOKEN';
            } else {

                $token = $response['token'];

                return $token;
            }
        }


	public static function all() {
		$token = self::getToken();
                $headers = array('content-type' => 'application/json','Authorization'=> $token);

                $response = \Unirest\Request::get('https://moneywave.herokuapp.com/v1/wallet', $headers);

                $data = json_decode($response->raw_body, true);
                $walletBalance = $data['data'];

                return $walletBalance;
	}
}