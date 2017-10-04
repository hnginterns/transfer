<?php
namespace App\Http\Controllers;

use DateTime;
use App\Wallet;
use App\WalletTransaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Restriction;
use App\Beneficiary;
use App\Rule;
use App\Transaction;
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

    //get token for new transaction
    public function getToken()
    {
        $api_key = 'ts_PQOAA7GKWFH3RKC9CP83';
        $secret_key = 'ts_LL1JQ7Y4S0MCOXBVGQWKAO4KRGDYXV';
        \Unirest\Request::verifyPeer(false);
        $headers = array('content-type' => 'application/json');
        $query = array('apiKey' => $api_key, 'secret' => $secret_key);
        $body = \Unirest\Request\Body::json($query);
        $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/merchant/verify', $headers, $body);
        $response = json_decode($response->raw_body, true);
        $status = $response['status'];
        if (!$status == 'success') {
            echo 'INVALID TOKEN';
        } else {
            $token = $response['token'];
            return $token;
        }
    }

    public function cardWallet(Request $request)
    {
        $token = $this->getToken();
        $headers = array('content-type' => 'application/json', 'Authorization' => $token);
        $query = array(
            "firstname" => $request->fname,
            "lastname" => $request->lname,
            "email" => $request->emailaddr,
            "phonenumber" => $request->phone,
            "recipient" => "wallet",
            "card_no" => $request->card_no,
            "cvv" => $request->cvv,
            "pin" => $request->pin, //optional required when using VERVE card
            "expiry_year" => $request->expiry_year,
            "expiry_month" => $request->expiry_month,
            "charge_auth" => "PIN", //optional required where card is a local Mastercard
            "apiKey" => "ts_PQOAA7GKWFH3RKC9CP83",
            "amount" => $request->amount,
            "fee" => 0,
            "medium" => "web",
            "redirecturl" => "https://google.com"
        );
        $body = \Unirest\Request\Body::json($query);

        $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/transfer', $headers, $body);
        var_dump($response);
    }

    public function createWallet()
    {
        $token = $this->getToken();
        $headers = array('content-type' => 'application/json', 'Authorization' => $token);
        $query = array(
            "sourceWallet" => "932405db53",
            "recipientWallet" => "aacafb2209",
            "amount" => "20000",
            "currency" => "NGN",
            "lock" => "12345"
        );
        $body = \Unirest\Request\Body::json($query);
        $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/wallet', $headers, $body);
        // var_dump($response);
        $response = json_decode($response->raw_body, true);
        var_dump($response);
    }

    //transfer from wallet to wallet
    public function transfer(Request $request, WalletTransaction $transaction)
    {
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
            $lock_code = Wallet::where('uuid', Auth::user()->id)->get();
            $restriction = Restriction::where('wallet_id', $lock_code[0]['id'])->get();
            $rules = Rule::where('id', $restriction[0]['rule_id'])->get();
            $amount = $request->input('amount');
            if ($rules[0]['can_transfer'] == 1) {
                $date = new DateTime();
                $date_string = date_format($date, "Y-m-d");
                $wallet_transactions = Transaction::count();
                $total_amount = Transaction::sum('amount_transfered');
                if ($wallet_transactions < $rules[0]['max_transactions_per_day'] && $total_amount < $rules[0]['max_amount_transfer_per_day']) {
                    if ($amount >= $rules[0]['min_amount'] && $amount <= $rules[0]['max_amount']) {
                        $token = $this->getToken();
                        $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                        $query = array(
                            "sourceWallet" => $request->input('sourceWallet'),
                            "recipientWallet" => $request->input('recipientWallet'),
                            "amount" => $request->input('amount'),
                            "currency" => "NGN",
                            "lock" => $lock_code[0]['lock_code']
                        );
                        $body = \Unirest\Request\Body::json($query);
                        $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/wallet/transfer', $headers, $body);
                        $response_arr = json_decode($response->raw_body, true);
                        $status = $response_arr['status'];
                        if ($status == 'success') {


                                 //$wallet = new Transaction;
                            //$wallet->sourceWallet = $request->input('sourceWallet');
                            //$wallet->transaction_status = 1;
                            //$wallet->recipientWallet = $request->input('recipientWallet');
                            //$wallet->amount = $request->input('amount');

                            //if($wallet->save()) {
                            //return response()->json(['status' => 'success']);
                            //'transactiondata' => $response_arr.data
                            //}

                            return redirect()->action('pagesController@success', $response);
                        } else {
                            //return response()->json(['status' => 'failed', 'msg' => $response_arr['message']]);
                            return redirect()->action('pagesController@failed', $response);
                        }
                    } else {
                        return redirect()->action('pagesController@failed', $response);
                        //return response()->json(['status' => 'failed', 'msg' => 'You can only transfer between ' . $rules[0]['min_amount'] . ' and ' . $rules[0]['max_amount']]);
                    }
                } else {
                    return redirect()->action('pagesController@failed', $response);
                    //return response()->json(['status' => 'failed', 'msg' => 'You have exceeded your transfer limit for the day.']);
                }
            } else {
                return redirect()->action('pagesController@failed', $response);
                //return response()->json(['status' => 'failed', 'msg' => 'You wallet cannot transfer. Contact the admin']);
            }
        }
    }

    //transfer from wallet to bank
    public function transferAccount(Request $request)
    {
        $validator = $this->validateBeneficiary($request->all());
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            Session::flash('messages', $this->formatMessages($messages, 'error'));
            return redirect()->to(URL::previous())->withInput();
        } else {
            $beneficiary = Beneficiary::where('id', '=', $request->beneficiary_id)
                ->get();
            // We need to get the loack code of a wallet in order to make the transfer.
            $walletdata = Wallet::where('wallet_name', $request->wallet_name)->get();
            //dd($wallet_data);
            if (!empty($beneficiary)) {
                $token = $this->getToken();
                $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                $query = array(
                    "lock" => $walletdata[0]->lock_code,
                    "amount" => $request->amount,
                    "bankcode" => $beneficiary[0]->bank_id,// Returns error
                    "accountNumber" => $beneficiary[0]->account_number,
                    "currency" => "NGN",
                    "senderName" => Auth::user()->username,
                    "narration" => $request->narration, //Optional
                    "ref" => $request->reference, // No Refrence from request
                    "walletUref" => $walletdata[0]->wallet_code
                ); // No Refrence from request
                $body = \Unirest\Request\Body::json($query);
                $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/disburse', $headers, $body);
                $response = json_decode($response->raw_body, true);
                $status = $response['status'];
                if ($status == 'success') {
                    $data = $response['data']['data'];
                    $data['narration'] = $request->narration;
                    $data['senderName'] = Auth::user()->username;
                    $data['receiverName'] = $beneficiary[0]->name;
                    $data['walletCodeSender'] = $walletdata[0]->wallet_code;
                    //return redirect()->action('pagesController@bank_transfer', $data);
                    dd($data);
                    return redirect('/success')->with(['status' => $data]);
                }
                else {
                    // dd($data);
                    return redirect('/failure')->with(['status' => $data]);
                }
            }
        }
    }

    //get wallet balance
    public function walletBalance()
    {
        $token = $this->getToken();
        $headers = array('content-type' => 'application/json', 'Authorization' => $token);
        $response = \Unirest\Request::get('https://moneywave.herokuapp.com/v1/wallet', $headers);
        $data = json_decode($response->raw_body, true);
        $walletBalance = $data['data'];

        var_dump($walletBalance);
        die();
        //return view('walletBalance', compact('walletBalance'));
    }

    //
    public function walletCharge()
    {
        $token = $this->getToken();
        $headers = array('content-type' => 'application/json', 'Authorization' => $token);
        $query = array('amount' => 10000, 'fee' => 45);
        $body = \Unirest\Request\Body::json($query);
        $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/get-charge', $headers, $body);
        $data = json_decode($response->raw_body, true);
        $walletCharge = var_dump($data['data']);
    }

    public function storeWalletDetailsToDB($wallet_data, $uuid, $lock_code, $rule_id, $wallet_name)
    {
        $restriction = new Restriction;
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
        $wallet->uuid = $uuid;
        $wallet->wallet_name = $wallet_name;
        $restriction->uuid = $uuid;
        $restriction->rule_id = $rule_id;
        $restriction->created_by = Auth::user()->id;
        $restriction->updated_by = Auth::user()->id;
        if ($wallet->save()) {
            $restriction->wallet_id = $wallet->id;
            $restriction->save();
            return back();
        } else {
            return back();
        }
    }



    public function createWalletAdmin($data)
    {
        $token = $this->getToken();
        $headers = array('content-type' => 'application/json', 'Authorization' => $token);
        $query = array(
            'name' => $data->wallet_name,
            'lock_code' => $data->lock_code,
            'user_ref' => $data->user_ref,
            'currency' => "NGN"
        );
        $body = \Unirest\Request\Body::json($query);
        $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/wallet', $headers, $body);
        $response = json_decode($response->raw_body, true);
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
            //'sender_name' => 'required|string',




            'wallet_name' => 'required|string',
            //'lock_code' => 'required|string|max:100',
            //'reference' => 'required|string',
            'amount' => 'required|numeric',
            'beneficiary_id' => 'required|numeric',
        ]);
    }
}
