<?php

namespace App\Http\Controllers;
use App\Wallet;
use Illuminate\Http\Request;
class WalletController extends Controller
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

    public function getToken(){
        $api_key = 'ts_VZJ5K36HYKSVE4VRS5VC';
        $secret_key = 'ts_09443SHY1WRF56TZBYRK0Z55OOO68C';

        \Unirest\Request::verifyPeer(false);

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

    public function createWallet(){
                $token = $this->getToken();
                $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                $query = array(
                'name' => "James Okoh",
                'lock_code' => "felicia",
                'user_ref' => "576",
                'currency' => "NGN");

                $body = \Unirest\Request\Body::json($query);

                $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/wallet', $headers, $body);

                $response = json_decode($response->raw_body,TRUE);
                $status = $response['status'];
                $data = $response['data'];
                $createWallet = var_dump($data);

                $this->storeWalletDetailsToDB($data, 1, "felicia");
    }

    public function transfer(){ 
                $token = $this->getToken();
                $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                $query = array(
                "sourceWallet"=> 0,
                "recipientWallet"=> 102,
                "amount"=> "10",
                "currency"=> "NGN",
                "lock_code"=>"0lanrewaJU"

                ); 

                $body = \Unirest\Request\Body::json($query);

                $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/wallet/transfer', $headers, $body);

                $response = json_decode($response->raw_body,TRUE);
                $status = $response['status'];
                if ($status == 'success') {
                    $data = $response['data'];
                } else {
                    if (array_key_exists('code', $response)) {

                        $data = $response['message'];
                    }
                }
                var_dump($response);
            }

                public function transferAccount(Request $request){
                $token = $this->getToken();
                $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                $method = $request->method();

            if ($request->isMethod('post')) {
                     $query = array(
                "lock_code"=>$method('lock_code'),
                 "amount"=>$method('amount'),
                 "bankcode"=>$method('bank_code'),
                 "accountNumber"=>$method('accountNumber'),
                 "currency"=>"NGN",
                 "senderName"=>$method('senderName'),
                 "narration"=>$method('naration'), //Optional
                 "ref"=>$method('reference'));

                return $query;

                }

                    $body = \Unirest\Request\Body::json($query);

                $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/disburse', $headers, $body);

                $response = json_decode($response->raw_body,TRUE);
                var_dump($response);
                die();
                $status = $response['status'];

                if ($status == 'success') {
                    $data = $response['data'];
                } else {
                    if (array_key_exists('code', $response)) {
                        $data = $response['message'];
                    }
                    
                

                    var_dump($response);
                }

                

            }

            public function walletBalance() {
                $token = $this->getToken();
                $headers = array('content-type' => 'application/json','Authorization'=> $token);

                $response = \Unirest\Request::get('https://moneywave.herokuapp.com/v1/wallet', $headers);

                $data = json_decode($response->raw_body, true);
                $walletBalance = $data['data'];
                
                //$walletBalance = array_pluck($walletBalance, 'id', 'id');
                var_dump($walletBalance);
                die();
                //return view('walletBalance', compact('walletBalance'));

    }

    public function walletCharge() {
        $token = $this->getToken();
        $headers = array('content-type' => 'application/json','Authorization'=> $token);
        $query = array('amount'=> 10000,'fee' => 45);

        $body = \Unirest\Request\Body::json($query);

        $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/get-charge', $headers, $body);
        $data = json_decode($response->raw_body, TRUE);
        $walletCharge = var_dump($data['data']);
    }


    private function storeWalletDetailsToDB($wallet_data, $uuid, $lock_code){

            $wallet                 =      new Wallet;
            $moneywave_wallet_id    =      $wallet_data['id'];
            $balance_one            =      $wallet_data['balance_1'];
            $enabled                =      $wallet_data['enabled'];
            $wallet_code            =      $wallet_data['uref'];
            $merchant_id            =      $wallet_data['merchantId'];
            $currency_id            =      $wallet_data['currencyId'];
            $balance                =      $wallet_data['balance'];
            $updatedAt              =      $wallet_data['updatedAt'];
            $createdAt              =      $wallet_data['createdAt'];

            $wallet->moneywave_wallet_id        =        $moneywave_wallet_id;
            $wallet->balance_one                =        $balance_one;
            $wallet->balance                    =        $balance;
            $wallet->merchant_id                =        $merchant_id;
            $wallet->currency_id                =        $currency_id;
            $wallet->enabled                    =        $enabled;
            $wallet->lock_code                  =        $lock_code;
            $wallet->wallet_code                =        $wallet_code;
            $wallet->uuid                       =        $uuid;
            if($wallet->save()){
                return back();
            }else{
                return back();
            }

    }
}
