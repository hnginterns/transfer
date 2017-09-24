<?php

namespace App\Http\Controllers;
use App\Wallet;
use App\WalletTransaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Restriction;
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
                'user_ref' => "ab4gFhj",
                'currency' => "NGN");

                $body = \Unirest\Request\Body::json($query);

                $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/wallet', $headers, $body);
                // var_dump($response);
                $response = json_decode($response->raw_body,TRUE);
                $status = $response['status'];
                $data = $response['data'];
                $createWallet = var_dump($data);
    }

    public function transfer(Request $request, WalletTransaction $transaction){ 
                $token = $this->getToken();
                $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                $query = array(
                "sourceWallet"=> $request->input('sourceWallet'),
                "recipientWallet"=> $request->input('recipientWallet'),
                "amount"=> $request->input('amount'),
                "currency"=> "NGN",
                "lock"=> $request->input('lock')

                ); 

                $body = \Unirest\Request\Body::json($query);

                $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/wallet/transfer', $headers, $body);

                $response = json_decode($response->raw_body,TRUE);
                $status = $response['status'];
                if ($status == 'success') {
                    $wallet = new WalletTransaction;
                    $wallet->sourceWallet = $request->input('sourceWallet');
                    $wallet->recipientWallet = $request->input('recipientWallet');
                    $wallet->amount = $request->input('amount');
                    if($wallet->save()) {
                        return redirect('success');
   
                    }

               } 

                var_dump($response);
                
        
            }

                public function transferAccount(Request $request){
                $token = $this->getToken();
                $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                $query = array(
                "lock"=>$request->input('lock_code'),
                 "amount"=>$request->input('amount'),
                 "bankcode"=>$request->input('bank_code'),
                 "accountNumber"=>$request->input('accountNumber'),
                 "currency"=>"NGN",
                 "senderName"=>$request->input('senderName'),
                 "narration"=>$request->input('naration'), //Optional
                 "ref"=>$request->input('reference'));

                $body = \Unirest\Request\Body::json($query);

                $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/disburse', $headers, $body);

                $response = json_decode($response->raw_body,TRUE);
                $status = $response['status'];
                
                if ($status == 'success') {
                    return redirect()->action('pagesController@success');
                }
                         
                         $data = $response;   

                    return redirect('failed');
                    
        

                
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


    public function storeWalletDetailsToDB($wallet_data, $uuid, $lock_code, $rule_id, $wallet_name){
            $restriction            =      new Restriction;
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
            $wallet->wallet_name                =        $wallet_name;
            $restriction->uuid                  =        $uuid;
            $restriction->rule_id               =        $rule_id;
            $restriction->created_by            =        Auth::user()->id;
            $restriction->updated_by            =        Auth::user()->id;
            if($wallet->save()){
               $restriction->wallet_id          =        $wallet->id;
               $restriction->save();
                return back();
            }else{
                return back();
            }

    }

    public function createWalletAdmin($data){
                $token = $this->getToken();
                $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                $query = array(
                'name' => $data->wallet_name,
                'lock_code' => $data->lock_code,
                'user_ref' => $data->user_ref,
                'currency' => "NGN");

                $body = \Unirest\Request\Body::json($query);

                $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/wallet', $headers, $body);

                $response = json_decode($response->raw_body,TRUE);
                $status = $response['status'];
                $data = $response['data'];
                return (!is_array($data)) ? true : $data;
    }



         /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateWallet(array $data)
    {
        return Validator::make($data, [
            'wallet_name' => 'required|string|max:255',
            'user_ref' => 'required|string|max:10',
            'lock_code' => 'required|string|max:100',
            'rule_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'currency_id' => 'required|numeric',
        ]);

    }


}
