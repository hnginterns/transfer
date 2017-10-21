<?php
namespace App\Http\Controllers\Admin;
use Auth;
use URL;
use App\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RestrictionController as Restrict;
use App\User;
use App\Wallet;
use App\SmsWalletFund;
use App\CardWallet;
use App\Restriction;

use App\TopupContact;
use App\Rule;
use App\Bank;
use App\Beneficiary;
use App\Transaction;
use App\PhonetopupTransaction;
use App\Notifications\PhonetopupTransaction as PhonetopupTransactionNotify;
use Carbon\Carbon;
use App\Events\FundWallet;
use Trs;
class PhoneTopUpController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('logout');
    }
    public function topup()
    {
        return view('phonetopup');
    }
    
    public function addPhone(Request $request){
        $input = $request->all();
        
        $validator = Validator::make($input, 
            [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|numeric',
            'network' => 'required',
            'max_tops' => 'required'

            ],
                                     [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'phone.required' => 'Phone Number is required',
            'phone.numeric' => 'Phone Number must be in numbers',
            'network.required' => 'Please select a network',
            'max_tops.required' => 'Please enter Maximum Number of topups per week',
            ]
         ); 
        
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            Session::flash('error', $messages);
            return redirect()->to(URL::previous())->with('failed', $messages);
        } else {
            
            $phone = new TopupContact();
            $phone->firstname = $input['firstname'];
            $phone->lastname = $input['lastname'];
            $phone->phone = $input['phone'];
            $phone->title = $input['title'];
            $phone->department = $input['department'];
            $phone->email = $input['email'];
            $phone->newtork = $input['network'];
            $phone->max_tops = $input['max_tops'];

            $phone->save();

            Session::flash('success', 'Contact Added successfully.');
            
            return redirect()->to('admin/phonetopup');
        }
    }

    //get token for new transaction
    public function getToken()
    {
        $api_key = env('API_KEY');
        $secret_key = env('API_SECRET');
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


     //transfer from wallet to bank
    public function postTopup(Request $request, FundWallet $topup)
    {
        
        $validator = $this->validateRequest($request->all());
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            Session::flash('error', $this->formatMessages($messages, 'error'));
            return back();
        } else {
                $token = $this->getToken();
                
                $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                $wallet = Wallet::find($request->wallet_id);
                $bank = Bank::find($request->bank_id);
                $query = array(
                    "lock" => $wallet->lock_code,
                    "amount" => $request->amount,
                    "bankcode" => $bank->bank_code,
                    "accountNumber" => $request->account_number,
                    "currency" => "NGN",
                    "senderName" => Auth::user()->username,
                    "narration" => $request->narration, //Optional
                    "ref" => $request->reference, // No Refrence from request
                    "walletUref" => $wallet->wallet_code
                );

                //Api call to moneywave for transaction
                $body = \Unirest\Request\Body::json($query);
                $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/disburse', $headers, $body);
                $response = json_decode($response->raw_body, true);
                $status = $response['status'];
                //end of Api call
                
                if ($status == 'success') {

                    //data to be parsed to display transaction details
                    $data = $response['data']['data'];
                    $data['senderName'] = Auth::user()->username;
                    $data['walletCodeSender'] = $wallet->wallet_code;
                    $data['receiverName'] = $request->account_name;
                    $data['beneficiaryAccount'] = $request->account_number;
                    $data['amount'] = $request->amount;
                    $data['narration'] = $request->narration;
                    //end of data prep

                    //logic to persist transaction details
                    $transaction = new PhonetopupTransaction;
                    $transaction->wallet_id = $wallet->id;
                    $transaction->amount = $request->amount;
                    $transaction->uuid =  Auth::user()->id;
                    $transaction->account_name = $request->account_name;
                    $transaction->bank_id = $request->bank_id;
                    $transaction->status = true;
                    $transaction->account_number = $request->account_number;
                    $transaction->save();
                    //end of logic for saving transactions
                    
                    //fire off an sms notification
                    $this->sendPhoneTopupTransactionNotifications($transaction);

                     event(new FundWallet($topup));
                    // $transactions = BankTransaction::latest()->first();
                    Session::flash('success',"Transaction was successful");
                    return redirect('admin/phonetopup');
                } else {
                    Session::flash('error',$response['message']);
                    return back();
                }
        }
    }

    public function sendPhoneTopupTransactionNotifications($transaction){
        Auth::user()->notify(new PhonetopupTransactionNotify($transaction));
        $admins = User::where('is_admin', true)->get();
        foreach($admins as $key => $admin){
            $admin->notify(new PhonetopupTransactionNotify($transaction));
        }
    }

    public function fundTopup(Request $request, CardWallet $topup)
    {
        
        //$validator = $this->validateFund($request->all());
        /**if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            Session::flash('error', $this->formatMessages($messages, 'error'));
            return back();
        } else {**/

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
                "apiKey" => env('API_KEY'),
                "amount" => $request->amount,
                "fee" => 0,
                "medium" => "web",
                //"redirecturl" => "https://google.com"
            );
            $body = \Unirest\Request\Body::json($query);

            $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/transfer', $headers, $body);
            $response = json_decode($response->raw_body, TRUE);
            if($response['status'] == 'success') {
                $response = $response['data']['transfer'];
                //$meta = $response['meta'];
                //$meta = json_decode($meta, TRUE);
                $transMsg = $response['flutterChargeResponseMessage'];
                $transRef = $response['flutterChargeReference'];
                
                $transaction = new CardWallet;
                $transaction->firstName = $response['firstName'];
                $transaction->lastName = $response['lastName'];
                $transaction->status = $response['status'];
                $transaction->wallet_name = $request->wallet_name;
                $transaction->phoneNumber = $response['phoneNumber'];
                $transaction->amount = $response['amountToSend'];
                $transaction->ref = $transRef;

                $transaction->save();

                return back()->with('status', $transMsg);
            }
            else{
                return back()->with('error', $response['message']);
            }

            
        }

    public function otp(Request $request, CardWallet $topup, Wallet $wallet)
    {
        \Unirest\Request::verifyPeer(false);

            $headers = array('content-type' => 'application/json');
            $query = array(
                'transactionRef'=>$request->ref,
                'otp' => $request->otp
            );
            $body = \Unirest\Request\Body::json($query);

            $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/transfer/charge/auth/card', $headers, $body);
            $response = json_decode($response->raw_body, true);
            
            if($response['status'] == 'success') {
                event(new FundWallet($topup));
                $response = $response['data']['flutterChargeResponseMessage'];
                //return redirect('dashboard')->with('status', $response);
                Wallet::where('id', $wallet->id)
                    ->update('status', $response['status']);
                return redirect('admin/phonetopup')->with('details', $response);

            }
            Wallet::where('id', $wallet->id)
                    ->update('status', $response['status']);
            return redirect('admin/phonetopup')->with('details', $response);
    }

    protected function validateRequest(array $data)
    {
        return Validator::make($data, [
            'account_name' => 'required|string|max:255',
            'wallet_id' => 'required|numeric',
            'bank_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'account_number' => 'required|string|max:10',
        ]);
    }


    protected function validateFund(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'address' => 'required',
            'phone' => 'required',
            'card_no'=> 'required|numeric',
            'cvv' => 'required|numeric|max:3',
            'pin' => 'required|numeric|max:4',
            'expiry_year' => 'required|string',
            'amount' => 'required|numeric',
            'expiry_month' => 'required|string',
        ]);
    }
}

    
