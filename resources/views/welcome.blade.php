<?php

function getToken()
{
    $api_key = 'ts_PQOAA7GKWFH3RKC9CP83';
    $secret_key = 'ts_LL1JQ7Y4S0MCOXBVGQWKAO4KRGDYXV';
    \Unirest\Request::verifyPeer(false);
    $headers = array('content-type' => 'application/json');
    $query = array('apiKey' => $api_key, 'secret' => $secret_key);
    $body = \Unirest\Request\Body::json($query);
    $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/merchant/verify', $headers, $body);
    $response = json_decode($response->raw_body, TRUE);
    $status = $response['status'];
    if (!$status == 'success') {
        echo 'INVALID TOKEN';
    }
    else {
        $token = $response['token'];
        return $token;
    }
}

function transferAccount()
{
    $token = getToken();
    $headers = array('content-type' => 'application/json', 'Authorization' => $token);
    $query = array(
        "lock" => '12345',
        "amount" => 200,
        "bankcode" => '058',// Returns error
        "accountNumber" => '0921318712',
        "currency" => "NGN",
        "senderName" => 'Stephen',
        "narration" => '', //Optional
        "ref" => '1222',
        "walletUref" => "20d24cb8c7"
    ); // No Refrence from request
    $body = \Unirest\Request\Body::json($query);
    $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/disburse', $headers, $body);
    $response = json_decode($response->raw_body, TRUE);
    $status = $response['status'];
    if ($status == 'success') {
        //$data = $response;
        dd($response);
    }
    else {
        dd($response);
    }
}

function walletBalance() {
    $token = getToken();
    $headers = array('content-type' => 'application/json','Authorization'=> $token);
    $response = \Unirest\Request::get('https://moneywave.herokuapp.com/v1/wallet', $headers);
    $data = json_decode($response->raw_body, true);
    $walletBalance = $data['data'];
    //$walletBalance = array_pluck($walletBalance, 'id', 'id');
    dd($walletBalance);
    die();
    //return view('walletBalance', compact('walletBalance'));
}

function toWallet(){

    $token = getToken();
    $headers = array('content-type' => 'application/json', 'Authorization' => $token);

    $query = array(
        "sourceWallet" => '0',
        "recipientWallet" => 'c6e1e5d10e',
        "amount" => '50000',
        "currency" => "NGN",
        "lock" =>'123456'
    );

    $body = \Unirest\Request\Body::json($query);
    $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/wallet/transfer', $headers, $body);
    $response_arr = json_decode($response->raw_body, TRUE);
    $status = $response_arr['status'];
    // dd($response_arr);a few chan
    //return redirect()->action('pagesController@failed', ['response'=> $response_arr]);
    dd($response_arr);
}

//echo walletBalance().'<br>';
echo toWallet().'<br>';
//echo $res = transferAccount();

?>
