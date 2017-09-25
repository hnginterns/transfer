<?php

namespace App\Http\Controllers;
use App\Wallet;
use App\WalletTransaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Restriction;
use App\Beneficiary;
use URL;
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
        $api_key = 'ts_PQOAA7GKWFH3RKC9CP83';
        $secret_key = 'ts_LL1JQ7Y4S0MCOXBVGQWKAO4KRGDYXV';

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

                $response_arr = json_decode($response->raw_body,TRUE);
                $status = $response_arr['status'];
                if ($status == 'success') {
                   // $wallet = new WalletTransaction;
                    //$wallet->sourceWallet = $request->input('sourceWallet');
                    //$wallet->recipientWallet = $request->input('recipientWallet');
                    //$wallet->amount = $request->input('amount');
                    //if($wallet->save()) {
                    return $response;
                        return back('transfer-to-wallet');
                        echo '<script>$("#smodal").modal(options);</script>';
                    //}

               }
                return ['status' => 'failed'];
                return redirect('transfer-to-wallet');
                echo '<script>$("#smodal").modal(options);</script>';

            }

            public function transferAccount(Request $request){

                $validator = $this->validateBeneficiary($request->all());

                if ($validator->fails()) {
                    $messages = $validator->messages()->toArray();
                    Session::flash('messages', $this->formatMessages($messages, 'error'));
                    return redirect()->to(URL::previous())->withInput();
                }else {

                        $beneficiary = Beneficiary::where('id', '=', $request->beneficiary_id)
                                                    ->get();                     
                        if(!empty($beneficiary)){
                            $token = $this->getToken();
                            $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                            $query = array(
                            "lock"=>$request->lock_code,
                            "amount"=>$request->amount,
                            "bankcode"=>$beneficiary[0]->bank_id,
                            "accountNumber"=>$beneficiary[0]->account_number,
                            "currency"=>"NGN",
                            "senderName"=>$request->sender_name,
                            "narration"=>$request->narration, //Optional
                            "ref"=>$request->reference);

                            $body = \Unirest\Request\Body::json($query);

                            $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/disburse', $headers, $body);

                            $response = json_decode($response->raw_body,TRUE);
                            $status = $response['status'];

                        if ($status == 'success') {
                            $data = $response;
                            return redirect()->action('pagesController@success');
                        }else{
                            return redirect()->action('pagesController@failed');
                        }

                        }
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

            /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validatebeneficiary(array $data)
    {
        return Validator::make($data, [
            'sender_name' => 'required|string',
            'lock_code' => 'required|string|max:100',
            'reference' => 'required|string',
            'amount' => 'required|numeric',
            'beneficiary_id' => 'required|numeric',
        ]);

    }


}
