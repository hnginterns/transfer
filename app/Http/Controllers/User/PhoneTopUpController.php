<?php
namespace App\Http\Controllers\User;
use DateTime;
use App\Wallet;
use App\TopupContact;
use App\TopupHistory;
use App\WalletTransaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Restriction;
use App\CardWallet;
use App\Beneficiary;
use App\FundWalletInfo;
use Carbon\Carbon;
use App\Http\Requests\TopUpDataRequest;
use App\SmsWalletFund;
use App\Rule;
use App\Bank;
use App\Transaction;
use URL;
use App\User;
use App\BankTransaction;
use App\PhonetopupTransaction;
use RestrictionController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RestrictionController as Restrict;
use App\Notifications\PhonetopupTransaction as PhonetopupTransactionNotify;
use App\Events\TransferToBank;
use App\Events\FundWallet;
class PhoneTopUpController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        ini_set('max_execution_time' ,720);       
        ini_set('set_memory_limit', -1);
    }
    public function star(TopupContact $contact){
        $contact->starred = $contact->starred == 1 ? false : true;
        $contact->save();
        $phone = TopupContact::orderBy('starred', 'desc')->get();
        return response()->json($phone);
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
   public function phoneTopUp(Request $request, CardWallet $cardWallet)
    {
      
        $username       =     env('TOP_UP_USERNAME');
        $password       =     env('TOP_UP_PASSWORD');
        $phone          =     env('TOP_UP_PHONE');
        $bank_account   =     env('TOP_UP_BANK_ACCOUNT');
        $bank_code      =     env('TOP_UP_BANK_CODE');
        $bank = Bank::where('bank_code', $bank_code)->first();
        $validator = $this->validateRequest($request->all());
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
             Session::flash('form-errors', $messages);
            return back();
        } else {
                $wallet = Wallet::find($request->wallet_id);
                
                $token = $this->getToken();
                $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                $wallet = Wallet::find($request->wallet_id);
                $query = array(
                    "lock" => $wallet->lock_code,
                    "amount" => $request->amount,
                    "bankcode" => $bank_code,
                    "accountNumber" => $bank_account,
                    "currency" => "NGN",
                    "senderName" => $phone,
                    "narration" => $phone, //Optional
                    "ref" => $request->reference, // No Refrence from request
                    "walletUref" => $wallet->wallet_code
                );
                //Api call to moneywave for transaction
                $body = \Unirest\Request\Body::json($query);
                $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/disburse', $headers, $body);
                $response = json_decode($response->raw_body, true);
            try{
                $status = $response['status'];
                //end of Api call
                
                if ($status == 'success') {
                    //data to be parsed to display transaction details
                    $data = $response['data']['data'];
                    $data['senderName'] = Auth::user()->username;
                    $data['walletCodeSender'] = $wallet->wallet_code;
                    $data['receiverName'] = 'service Provider';
                    $data['beneficiaryAccount'] = $bank_account;
                    $data['amount'] = $request->amount;
                    $data['narration'] = $phone;
                    //end of data prep
                    //logic to persist transaction details
                    $transaction = new PhonetopupTransaction;
                    $transaction->wallet_id = $wallet->id;
                    $transaction->amount = $request->amount;
                    $transaction->uuid =  Auth::user()->id;
                    $transaction->account_name = 'Service Provider';
                    $transaction->bank_id = $bank->id;
                    $transaction->status = true;
                    $transaction->account_number = $bank_account;
                    $transaction->narration = $phone;
                    $transaction->save();
                    //end of logic for saving transactions
                    
                    //fire off an sms notification
                    $this->sendPhoneTopupTransactionNotifications($transaction);
                     event(new FundWallet($cardWallet));
                    Session::flash('status',$data);
                    return redirect('success');
                } else {
                    Session::flash('error',$response['message']);
                    return back();
                }
            }catch(\Exception $e){
                return back()->with('error', 'An unexpected error has occured');
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
    public function fundTopupWallet(Request $request, CardWallet $cardWallet)
    {   
        $validator = $this->validateWalletFunding($request->all());
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            Session::flash('form-errors', $messages);
            return redirect()->to(URL::previous());
        } else {
            if(Auth::user()->walletFundInfo == null){
                $wallet_fund_info = new FundWalletInfo;
                $wallet_fund_info->firstname = $request->fname;
                $wallet_fund_info->lastname = $request->lname;
                $wallet_fund_info->uuid = Auth::user()->id;
                $wallet_fund_info->email = $request->emailaddr;
                $wallet_fund_info->phonenumber = $request->phone;
                $wallet_fund_info->save();
            }else{
                $wallet_fund_info = Auth::user()->walletFundInfo;
                $wallet_fund_info->firstname = $request->fname;
                $wallet_fund_info->lastname = $request->lname;
                $wallet_fund_info->uuid = Auth::user()->id;
                $wallet_fund_info->email = $request->emailaddr;
                $wallet_fund_info->phonenumber = $request->phone;
                $wallet_fund_info->save();
            }
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
            $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/transfer', $headers, $body);
            
            $response = json_decode($response->raw_body, TRUE);
            $transaction = new CardWallet;
            $transaction->firstName = $request->fname;
            $transaction->lastName = $request->lname;
            $transaction->status = "started";
            $transaction->wallet_name = $request->wallet_name;
            $transaction->phoneNumber = $request->phone;
            $transaction->amount = $request->amount;
            $transaction->ref = "no ref";
        try{
            if($response['status'] == 'success') {
                $response = $response['data']['transfer'];
                $transMsg = $response['flutterChargeResponseMessage'];
                $transRef = $response['flutterChargeReference'];
            
                $transaction->ref = $transRef;
                $transaction->status = "pending OTP";
                $transaction->uuid = Auth::user()->id;
                $transaction->charge_response = $transMsg;
                $transaction->disburse_response = "pending";
                $transaction->pendingValidation = true;
                $transaction->save();

                return back()->with('otp', $transMsg);
            }
            else{
                $transaction->status = $response['message'];
                $transaction->uuid = Auth::user()->id;
                $transaction->charge_response = "failed";
                $transaction->disburse_response = "pending";
                $transaction->pendingValidation = false;
                $transaction->save();
                return back()->with('error', $response['message']);
            }
        }catch(\Exception $e){
            $transaction->status = "";
            $transaction->uuid = Auth::user()->id;
                $transaction->charge_response = "failed";
                $transaction->disburse_response = "pending";
                $transaction->pendingValidation = false;
            $transaction->save();
            return back()->with('error', 'Encountered error');
        }
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
                $card = CardWallet::latest()->first();
                $card->status = 'completed';
                $card->save();
                Session::flash('success','Wallet funding successful');
                return redirect('/phonetopup');
            }else{
                Session::flash('error',$response['message']);
                return redirect('/phonetopup');
            }
            
    }
    public function phoneshow($id)
    { 
        $phone = SmsWalletFund::find($id);
        return response()->json([
            'type' => 'success',
            'data' => $phone,
        ]);
    }

    public function ptopuphonesubmit(Request $request)
    { 
        $phone = SmsWalletFund::find($request->get('id'));
        return \Redirect::route('home')->with('success', 'Book favorited!');
            
    }
        public function getTopupWalletBalance() {
            $username = env('TOP_UP_USERNAME');
            $password = env('TOP_UP_PASSWORD');
            $url = "https://mobilenig.com/api/balance.php/?username=$username&password=$password";
            $headers = array('content-type' => 'application/json');
            $response = \Unirest\Request::get($url, $headers);
            $response = json_decode($response->raw_body, true);
            return $response;
    }
    
    public function hasReachedLimit($id, $amount, $max_limit){
        $sum = TopupHistory::where('contact_id', $id)
                             ->where('status','success')->get();
                $weekly_max = 0;
                foreach($sum as $key => $sums){
                    if($sums->created_at->diffInDays(Carbon::now()) < 7){
                        $weekly_max += $sums->amount;
                    }
                }
        return  ($max_limit - $weekly_max + $amount) < 0 ? true : false;
    }
    public function topuphonemultiple(Request $request){
        // dd($request);
        if($request->checked == null ){
            Session::flash('error', 'You must select a contact and enter amount to topup');
            return back();
        }
        $phones = $request->checked;
        $amount = $request->amount;
        $final_phones = [];
        $final_amount = [];
        $final_id = [];
        $errors = [];
        $total = 0;
        foreach($phones as $key => $phone){
            if($amount["$phone"] == null){               
                $contact = TopupContact::find($phone);
                Session::flash('error', 'Enter amount for all the selected contacts');
                return back();
            }else{
                
                $contact = TopupContact::find($phone);
                if($this->hasReachedLimit($phone, $amount["$phone"], $contact->weekly_max)){ 
                    //logs details of contacts who have exceeded weekly limits
                    $message = ['contact_id' => $phone, 
                                'ref'=>str_random(10), 
                                'amount'=>$amount["$phone"],
                                'status'=>'failed',
                                'txn_response'=> 'Weekly limit reached'
                                ];
                    $errors [] = $message;                  
                    //end of log detail of contacts who have exceeded weekly limits
                }else{
                    $total += $amount["$phone"];
                    $final_phones [] = $contact->phone;
                    $final_amount [] = $amount["$phone"];
                    $final_id [] = $phone;
                }  
            }     
        }
        $this->batchRechargeFailed($errors);
        
        if($total > $this->getTopupWalletBalance()){
            Session::flash('error', 'You do not have enough fund in your wallet for this topup');
            return back();
        }
        
        if(count($final_phones) > 0){
            $counter = $this->batchRecharge($final_id, $final_phones, $final_amount);
            return redirect('/phonetopup')->with('info', "$counter Contact(s) were topped up successfully. Check history");
   
        }else{
            Session::flash('error', 'No due Contact(s) to recharge');
            return back();
        }
        
    }
    public function batchRechargeFailed($errors){
        $user_id = Auth::user()->id;
        foreach($errors as $key => $error){
            $topuphistory = new TopupHistory;
            $topuphistory->contact_id = $error['contact_id'];
            $topuphistory->user_id = $user_id;
            $topuphistory->amount = $error['amount'];
            $topuphistory->ref = $error['ref'];
            $topuphistory->type = 'airtime';
            $topuphistory->txn_response = $error['txn_response'];
            $topuphistory->status = $error['status'];
            $topuphistory->save();
        }
    }
    public function batchRecharge($id, $phone, $amount){
        $number_topped_up = 0;
        $username = env('TOP_UP_USERNAME');
        $password = env('TOP_UP_PASSWORD');
        for($i = 0; $i < count($phone); $i++){
            $contact = TopupContact::find($id[$i]);
            $url = "https://mobilenig.com/api/airtime.php/?username=$username&password=$password&network=$contact->netw&phoneNumber=$contact->phone&amount=$amount[$i]";
            $headers = array('content-type' => 'application/json');
            $response = \Unirest\Request::get($url, $headers);
            $user_id = Auth::user()->id;
            $topuphistory = new TopupHistory;
            $topuphistory->contact_id = $contact->id;
            $topuphistory->user_id = $user_id;
            $topuphistory->amount = $amount[$i];
            $topuphistory->ref = str_random(10);
            $topuphistory->type = 'airtime';
            $topuphistory->txn_response = 00;
            $topuphistory->status = $response->body == '00' ? 'success' : 'failure';
            $number_topped_up = $response->body == '00'? $number_topped_up+1 : $number_topped_up;
            $topuphistory->save();
        }

        return $number_topped_up;
    }
    public function topuphonegroup(Request $request){
        $validator = $this->validateTag($request->all());
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            Session::flash('form-errors', $messages);
            return back();
        }
        $contacts = TopupContact::where('tags', $request->department)->get();
        if(count($contacts->toArray()) == 0){
            Session::flash('error', 'No contact belongs to the selected tag');
            return back();
        }
        $total = $request->amount;
		$amount = $total/count($contacts->toArray());
        $final_phones = [];
        $final_amount = [];
        $final_id = [];
        $total = 0;
        $errors = [];
        foreach($contacts as $key => $contact){
            if($this->hasReachedLimit($contact->id, $amount, $contact->weekly_max)){ 
                //logs details of contacts who have exceeded weekly limits
                $message = ['contact_id' => $contact->id, 
                            'ref'=>str_random(10), 
                            'amount'=>$amount,
                            'status'=>'failed',
                            'txn_response'=> 'Weekly limit reached'
                            ];
                $errors [] = $message;                  
                //end of log detail of contacts who have exceeded weekly limits
            }else{
                    $final_phones [] = $contact->phone;
                    $final_amount [] = $amount;
                    $final_id [] = $contact->id;
            }
        }
        $this->batchRechargeFailed($errors);
        if($total > $this->getTopupWalletBalance()){
            Session::flash('error', 'You do not have enough fund in your wallet for this topup');
            return back();
        }
        if(count($final_phones) > 0){
            $counter = $this->batchRecharge($final_id, $final_phones, $final_amount);
            return redirect('/phonetopup')->with('info', "$counter Contact(s) were topped up successfully. Check history");
   
        }else{
            Session::flash('error', 'No due Contact(s) to recharge');
            return back();
        }
        
    }
    public function topuphonesubmit(Request $request)
    {
        $phone = $request->phone;
        $network = $request->netw;
        $amount = $request->amount;
        $contact = TopupContact::find($request->current_id);
        $contacthistory = TopupHistory::where('user_id', $contact->id)->sum('amount');
        if ($contacthistory >= $contact->weekly_max) {
        
            return redirect('/phonetopup')->with('error', 'Weekly Maximum Exceeded');
        } 
        $url = 'https://mobilenig.com/api/airtime.php/?username=' .
            'jekayode&password=transfer' .
            '&network='. $contact->netw .'&phoneNumber='. $contact->phone .'&amount='. $amount;
        
        $headers = array('content-type' => 'application/json');
        $response = \Unirest\Request::get($url, $headers);
        
        $response = json_decode($response->raw_body, true);
        $user_id = Auth::user()->id;
        $topuphistory = new TopupHistory;
        $topuphistory->contact_id = $contact->id;
        $topuphistory->user_id = $user_id;
        $topuphistory->amount = $amount;
        $topuphistory->ref = str_random(10);
        $topuphistory->txn_response = 00;
        $topuphistory->status = 'Success';
        $topuphistory->save();
        return redirect('/phonetopup')->with('success', 'Phone topped up uccessfully.');
    }
    public function topdatasubmit(TopUpDataRequest $request)
    {
        $amount = $request->amount;
        $txn_ref = str_random(10);
        $return_url = 'https://finance.hotels.ng/phonetopup';
        $contact = TopupContact::find($request->current_id);
        $contacthistory = TopupHistory::where('user_id', $contact->id)->sum('amount');
        if ($contacthistory >= $contact->weekly_max) {
        
            return redirect('/phonetopup')->with('error', 'Weekly Maximum Exceeded');
        } 
        $url = 'https://mobilenig.com/api/data.php/?username=' .
            'jekayode&password=transfer' .
            '&network='. $contact->netw .'&phoneNumber='. $contact->phone .'&amount='. $amount.'&ref='. $txn_ref .'&return_url='. $return_url;
        
        $headers = array('content-type' => 'application/json');
        $response = \Unirest\Request::get($url, $headers);
        // $response = json_decode($response->raw_body, true);
        $user_id = Auth::user()->id;
        $topuphistory = new TopupHistory;
        $topuphistory->contact_id = $contact->id;
        $topuphistory->user_id = $user_id;
        $topuphistory->amount = $amount;
        $topuphistory->ref = str_random(10);
        $topuphistory->txn_response = 00;
        $topuphistory->type = 'data';
        $topuphistory->status = $response->body == '00' ? 'success' : 'failure';
        $topuphistory->save();
        return redirect('/phonetopup')->with('success', 'Data topped up successfully.');
    }
    protected function validateRequest(array $data) {
        return Validator::make($data, [
            'amount' => 'required|numeric',
        ]);
    }
    protected function validateTag(array $data) {
        return Validator::make($data, [
            'department' => 'required|string',
        ]);
    }
    protected function validateWalletFunding(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'amount' => 'required|numeric',
            'phone' => 'required|numeric',
            'emailaddr' => 'required|email',
            'card_no' => 'required|string',
            'expiry_year' => 'required|numeric',
            'cvv' => 'required|numeric',
            'pin' => 'required|numeric',
        ]);
    }
}
