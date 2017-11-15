<?php
namespace App\Http\Controllers\User;

use DateTime;
use App\Wallet;
use App\WalletTransaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Restriction;
use App\CardWallet;
use App\Beneficiary;
use App\Rule;
use App\Transaction;
use URL;
use App\BankTransaction;
use RestrictionController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RestrictionController as Restrict;
use App\Events\TransferToBank;
use App\Events\FundWallet;

class UserWalletController extends Controller
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

    //get token for new transaction
    public function getToken()
    {
        $api_key = "lv_I4EE93OHHDADBW7DVLNJ";
        $secret_key = "lv_HTCYZPYLQG7O12C0DC5PXMLWLZ02T2";
        \Unirest\Request::verifyPeer(false);
        $headers = array('content-type' => 'application/json');
        $query = array('apiKey' => $api_key, 'secret' => $secret_key);
        $body = \Unirest\Request\Body::json($query);
        $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/merchant/verify', $headers, $body);
        $response = json_decode($response->raw_body, true);
        $status = $response['status'];
        if (!$status == 'success') {
            echo 'INVALID TOKEN';
        } else {
            $token = $response['token'];
            return $token;
        }
    }

    public function userWallet(Request $request, CardWallet $cardWallet)
    {
        $token = $this->getToken();
        $headers = array('content-type' => 'application/json', 'Authorization' => $token);
        $query = array(
            "firstname" => $request->fname,
            "lastname" => $request->lname,
            "email" => $request->emailaddr,
            "phonenumber" => $request->phone,
            "recipient" => "wallet",
            "recipient_id" => $request->wallet_code,
            "card_no" => $request->card_no,
            "cvv" => $request->cvv,
            "pin" => $request->pin, //optional required when using VERVE card
            "expiry_year" => $request->expiry_year,
            "expiry_month" => $request->expiry_month,
            "charge_auth" => "PIN", //optional required where card is a local Mastercard
            "apiKey" => env('APP_KEY'),
            "amount" => $request->amount,
            "fee" => 0,
            "medium" => "web",
            //"redirecturl" => "https://google.com"
        );
        $body = \Unirest\Request\Body::json($query);

        $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/transfer', $headers, $body);
        $response = json_decode($response->raw_body, TRUE);
        //var_dump($response);
        //die();
        if($response['status'] == 'success') {
            $response = $response['data']['transfer'];
            //$meta = $response['meta'];
            //$meta = json_decode($meta, TRUE);
            $transMsg = $response['flutterChargeResponseMessage'];
            $transRef = $response['flutterChargeReference'];
            
            $transaction = new CardWallet;
            $transaction->firstName = $response['firstName'];
            $transaction->lastName = $response['lastName'];
            $transaction->phoneNumber = $response['phoneNumber'];
            $transaction->amount = $response['amountToSend'];
            $transaction->ref = $transRef;

            $transaction->save();

            return back()->with('status', $transMsg);

        }

    }

    public function otp(Request $request, CardWallet $cardWallet)
    {
        \Unirest\Request::verifyPeer(false);

            $headers = array('content-type' => 'application/json');
            $query = array(
                'transactionRef'=>$request->ref,
                'otp' => $request->otp
            );
            $body = \Unirest\Request\Body::json($query);

            $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/transfer/charge/auth/card', $headers, $body);
            $response = json_decode($response->raw_body, true);
            if($response['status'] == 'success') {
                event(new FundWallet($cardWallet));
                $response = $response['data']['flutterChargeResponseMessage'];
                return redirect('admin')->with('status', $response);

            }
            
    }

   
    //transfer from wallet to wallet
    public function transfer(Request $request, WalletTransaction $transaction) {
        $input = $request->all();
        $validator = Validator::make(
            $input,
            [
                'sourceWallet' => 'bail|required',
                'recipientWallet' => 'bail|required',
                'amount' => 'bail|required|numeric'
            ],
            [
                'required' => ':attribute is required',
                'numeric' => ':attribute must be in numbers'
            ]
        );

        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            return response()->json(['status' => 'failed', 'msg' => 'All fields are required']);
        } else {
            $lock_code = Wallet::where('uuid', Auth::user()->id)
                ->where('wallet_code', $request->sourceWallet)->get()->toArray();
            
            $restriction = Restriction::where('wallet_id', $lock_code[0]['id'])->get()->toArray();
            
            $amount = $request->input('amount');
            $data = [];
            
            $data['transaction_status'] = false;
            $data['wallet_code'] = $request->sourceWallet;
            $data['amount_transfered'] = $request->amount;
            $data['payer_uuid'] = 0;
            $data['payee_uuid'] = 0;
            $data['payee_account_number'] = " ";
            $data['bank_id'] = 0;
            $data['payee_wallet_code'] = $request->recipientWallet;

            if ($restriction[0]['can_transfer_from_wallet'] == true) {
                $date = new DateTime();
                $date_string = date_format($date, "Y-m-d");
                $wallet_transactions = Transaction::count();
                $total_amount = Transaction::sum('amount_transfered');

                    if ($amount >= $restriction[0]['min_amount'] && $amount <= $restriction[0]['max_amount']) {
                        $token = $this->getToken();
                        $headers = array('content-type' => 'application/json', 'Authorization' => $token);

                        $query = array(
                            "sourceWallet" => $request->sourceWallet,
                            "recipientWallet" => $request->recipientWallet,
                            "amount" => $request->amount,
                            "currency" => "NGN",
                            "lock" => $lock_code[0]['lock_code']
                        );

                        $body = \Unirest\Request\Body::json($query);
                        $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/wallet/transfer', $headers, $body);
                        $response_arr = json_decode($response->raw_body, true);
                        $status = $response_arr['status'];
                        $r_data = $response['data']['data'];                             
                        $data['transaction_reference'] = $r_data['uniquereference'];
                        if ($status == 'success') {
                            $data['transaction_status'] = true;
                            $this->logTransaction($data);
                            return redirect()->action('pagesController@success');
                        } else {
                            $this->logTransaction($data);
                            $response = 'Transaction was not successful';
                            return redirect()->action('pagesController@failed', $response);
                        }
                    } else {
                        $response = 'Invalid amount entered for this account';
                        return redirect()->action('pagesController@failed', $response);
                    }
            } else {
                $response = 'Wallet can not tranfer to another wallet';
                return redirect()->action('pagesController@failed', $response);
            }
        }
    }

    //transfer from wallet to bank
    public function transferAccount(Request $request, Wallet $wallet, BankTransaction $bank)
    {
        $validator = $this->validateBeneficiary($request->all());
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            Session::flash('messages', $this->formatMessages($messages, 'error'));
            return redirect()->to(URL::previous())->withInput();
        } else {
                $token = $this->getToken();
                $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                $beneficiary = Beneficiary::find($request->beneficiary_id);
                $query = array(
                    "lock" => $wallet->lock_code,
                    "amount" => $request->amount,
                    "bankcode" => $beneficiary->bank->bank_code,
                    "accountNumber" => $beneficiary->account_number,
                    "currency" => "NGN",
                    "senderName" => Auth::user()->username,
                    "narration" => $request->narration, //Optional
                    "ref" => $request->reference, // No Refrence from request
                    "walletUref" => $wallet->wallet_code
                );

                //checks for permissions
                $permit = Restriction::where('wallet_id', $wallet->id)
                        ->where('uuid', Auth::user()->id)
                        ->first();
                if($permit == null) return redirect('/dashboard');
                     $restrict = new Restrict($permit, $request);
                     $errors = $restrict->transferToBank();
                if(count($errors) != 0){
                     return back()->with('multiple-error', $errors);
                }
                //end of permission checks

                //Api call to moneywave for transaction
                $body = \Unirest\Request\Body::json($query);
                $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/disburse', $headers, $body);
                $response = json_decode($response->raw_body, true);
                $status = $response['status'];
                //end of Api call

                if ($status == 'success') {

                    //data to be parsed to display transaction details
                    $data = $response['data']['data'];
                    $data['senderName'] = Auth::user()->username;
                    $data['walletCodeSender'] = $wallet->wallet_code;
                    $data['receiverName'] = $beneficiary->name;
                    $data['beneficiaryAccount'] = $beneficiary->account_number;
                    $data['amount'] = $request->amount;
                    $data['narration'] = $request->narration;
                    //end of data prep

                    //logic to persist transaction details
                    $transaction = new BankTransaction;
                    $transaction->wallet_id = $wallet->id;
                    $transaction->amount = $request->amount;
                    $transaction->uuid =  Auth::user()->id;
                    $transaction->beneficiary_id = $beneficiary->id;
                    $transaction->transaction_reference = $data['uniquereference'];
                    $transaction->transaction_status = true;
                    $transaction->narration = $request->narration;
                    $transaction->save();
                    //end of logic for saving transactions

                    event(new TransferToBank($bank));


                    return redirect('success')->with('status',$data);
                } else {
                    return redirect()->with('failed',$data);
                }
        }
    }

    //get wallet balance
    public function walletBalance(Wallet $wallet)
    {
        $token = $this->getToken();
        $headers = array('content-type' => 'application/json', 'Authorization' => $token);
        $response = \Unirest\Request::get('https://live.moneywaveapi.co/v1/wallet', $headers);
        $data = json_decode($response->raw_body, true);
        $walletBalance = $data['data'];
        var_dump($walletBalance);
        die();
        foreach($walletBalance as $wallets)
                        {
            
                        Wallet::where('wallet_code', $wallets['uref'])
                        ->update(['balance'=> $wallets['balance']]);
    
                        //return view('walletBalance', compact('walletBalance'));
                        }
        
    
    }

    //
    public function walletCharge()
    {
        $token = $this->getToken();
        $headers = array('content-type' => 'application/json', 'Authorization' => $token);
        $query = array('amount' => 10000, 'fee' => 45);
        $body = \Unirest\Request\Body::json($query);
        $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/get-charge', $headers, $body);
        $data = json_decode($response->raw_body, true);
        $walletCharge = var_dump($data['data']);
    }

    public function storeWalletDetailsToDB($wallet_data, $lock_code, $wallet_name)
    {
        $wallet = new Wallet;
        $moneywave_wallet_id = $wallet_data['id'];
        $balance_one = $wallet_data['balance_1'];
        $enabled = $wallet_data['enabled'];
        $wallet_code = $wallet_data['uref'];
        $merchant_id = $wallet_data['merchantId'];
        $currency_id = $wallet_data['currencyId'];
        $balance = $wallet_data['balance'];
        $updatedAt = $wallet_data['updatedAt'];
        $createdAt = $wallet_data['createdAt'];
        $wallet->moneywave_wallet_id = $moneywave_wallet_id;
        $wallet->balance_one = $balance_one;
        $wallet->balance = $balance;
        $wallet->merchant_id = $merchant_id;
        $wallet->currency_id = $currency_id;
        $wallet->enabled = $enabled;
        $wallet->lock_code = $lock_code;
        $wallet->wallet_code = $wallet_code;
        $wallet->uuid = Auth::user()->id;
        $wallet->wallet_name = $wallet_name;;

        if ($wallet->save()) {
            return back()->with('success', 'Wallet creation successful');
        } else {
            return back()->with('error', 'Could not create wallet');
        }
    }

    public function createWalletAdmin($data) {
        $token = $this->getToken();
        $headers = array('content-type' => 'application/json', 'Authorization' => $token);

        $query = array(
            'name' => $data->wallet_name,
            'lock_code' => $data->lock_code,
            'user_ref' => $data->user_ref,
            'currency' => "NGN"
        );

        $body = \Unirest\Request\Body::json($query);
        $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/wallet', $headers, $body);
        $response = json_decode($response->raw_body, true);
        $status = $response['status'];
        $data = $response['data'];
        return (!is_array($data)) ? true : $data;
    }
    
    public function logTransaction($data){
        $transaction = new Transaction;
        $transaction->wallet_code = $data['wallet_code'];
        $transaction->amount_transfered = $data['amount_transfered'];
        $transaction->transaction_status = $data['transaction_status'];
        $transaction->payer_uuid = $data['payer_uuid'];
        $transaction->payee_uuid = $data['payee_uuid'];
        $transaction->payee_account_number = $data['payee_account_number'];
        $transaction->bank_id = $data['bank_id'];
        $transaction->payee_wallet_code = $data['payee_wallet_code'];
        $transaction->transaction_reference = $data['transaction_reference'];
        $transaction->created_at = new DateTime();
        
        $transaction->save();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    protected function validateWallet(array $data) {
        return Validator::make($data, [
            'wallet_name' => 'required|string|max:255',
            'lock_code' => 'required|string|max:100',
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
            'wallet_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'beneficiary_id' => 'required|numeric',
        ]);
    }
}
