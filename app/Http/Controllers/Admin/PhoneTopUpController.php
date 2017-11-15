<?php
namespace App\Http\Controllers\Admin;
use Auth;
use URL;
use App\WalletTransaction;
use Illuminate\Http\Request;
use App\Http\Requests\PhoneNumberAddRequest;
use App\Http\Requests\PhoneNumberEditRequest;
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
use App\Tag;
use App\PhonetopupTransaction;
use App\Notifications\PhonetopupTransaction as PhonetopupTransactionNotify;
use Carbon\Carbon;
use App\Events\FundWallet;
use Trs;
use App\FundWalletInfo;
use App\Http\Requests\PhoneNumberDeleteRequest;

class PhoneTopUpController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('logout');
    }
    public function topup()
    {
        $wallet = Wallet::where('type', 'topup')->first();
        return view('phonetopup', compact('wallet'));
    }

    public function addTag(Request $request){
        $input = $request->all();
        
        $validator = Validator::make($input, 
            [
                'tagname' => 'required|string|unique:tags,name'
            ],
            [
                'tagname.required' => 'Group name is required',
                'tagname.unique' => 'Group name is already taken'
            ]
         ); 
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json(['error' => true, 'msg' => $messages]);
        } else {
            $tag = new Tag();
            $tag->name = $input['tagname'];
            
            $tag->save();
            
            return response()->json(['error' => false, 'msg' => "Group added successfully"]);
        }
    }

    public function editTag(Request $request, $id){
        $input = $request->all();
        
        $validator = Validator::make($input, 
            [
                'tagname' => 'required|string'
            ],
            [
                'tagname.required' => 'Group name is required',
            ]
         ); 
        if ($validator->fails()) {
            $messages = $validator->messages();
            return response()->json(['error' => true, 'msg' => $messages]);
        } else {
            $tag = Tag::find($id);
            $tag->name = $input['tagname'];

            $tag->save();
            
            return response()->json(['error' => false, 'msg' => "Group updated successfully"]);
        }
    }

    public function deleteTag(Request $request, $id){

        $tag = Tag::find($id);
        $tag->delete();
        
        return response()->json(['error' => false, 'msg' => "Group deleted successfully"]);
    }
    
    public function addPhone(PhoneNumberAddRequest $request){
        $input = $request->all();
        
        $validator = Validator::make($input, 
            [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|numeric|unique:topup_contacts',
            'network' => 'required',
            'max_tops' => 'required'
            ],
                                     [
            'firstname.required' => 'First name is required',
            'lastname.required' => 'Last name is required',
            'phone.required' => 'Phone Number is required',
            'phone.unique' => 'Phone Number is already registered',
            'phone.numeric' => 'Phone Number must be in numbers',
            'network.required' => 'Please select a network',
            'max_tops.required' => 'Please enter Maximum Number of topups per week',
            ]
         ); 
        
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            return redirect()->to(URL::previous())->with('form-errors', $messages);
        } else {
            $phone = new TopupContact();
            $phone->firstname = $input['firstname'];
            $phone->lastname = $input['lastname'];
            $phone->phone = $input['phone'];
            $phone->title = $input['title'];
            $phone->department = $input['department'];
            $phone->email = $input['email'];
            $phone->network = 0;
            $phone->netw = $input['network'];
            $phone->weekly_max = $input['max_tops'];
            if ($phone->save()) {
                if ($request->has('tags') && count($request->has('tags'))) {
                    $phone->groups()->syncWithoutDetaching($request->tags);
                }
                return redirect()->to('admin/phonetopup')->with('success', 'Contact Added successfully.');
            }
            return redirect()->to('admin/phonetopup')->with('error', 'Error Adding Contact');
        }
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


     //transfer from wallet to bank
    public function postTopup(Request $request, FundWallet $topup)
    {
        
        $validator = $this->validateRequest($request->all());
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
             Session::flash('form-errors', $messages);
            return back();
        } else {

                //checks for permissions
                $permit = Restriction::where('wallet_id', $wallet->id)
                        ->where('uuid', Auth::user()->id)
                        ->first();
                
                if($permit == null){
                    Session::flash('error', 'You do not have access to this wallet');
                    return redirect('/dashboard');
                }    
                 $restrict = new Restrict($permit, $request);
                     $errors = $restrict->transferToBank();
                if(count($errors) != 0){
                    Session::flash('errors', $errors);
                    return back();
                }
                //end of permission checks

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
                $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/disburse', $headers, $body);
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
            return back()->with('error', 'An error occured');
        }
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

            $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/transfer/charge/auth/card', $headers, $body);
            $response = json_decode($response->raw_body, true);
            
            if($response['status'] == 'success') {
                event(new FundWallet($topup));
                $response = $response['data']['flutterChargeResponseMessage'];
                CardWallet::where('id', $wallet->id)
                    ->update(['status' => $response]);
                return redirect('admin/phonetopup')->with('success', $response);

            }
            $response = $response['data']['flutterChargeResponseMessage'];
            CardWallet::where('id', $wallet->id)
                    ->update(['status' => $response['status']]);
            return redirect('admin/phonetopup')->with('error', $response);
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

    public function editphone(PhoneNumberEditRequest $request) 
    {
        $phone = TopupContact::find($request->number_id);

        $phone->groups()->syncWithoutDetaching($request->tags);

        $phone->firstname = $request->firstname;
        $phone->lastname = $request->lastname;
        $phone->phone = $request->phone;
        $phone->title = $request->title;
        $phone->department = $request->department;
        $phone->email = $request->email;
        $phone->network = 0;
        $phone->netw = $request->network;
        $phone->weekly_max = $request->max_tops;
        if ($phone->save()) {
            return redirect()->to('admin/phonetopup')->with('success', 'Contact Updated successfully.');
        } else {
            return redirect()->to('admin/phonetopup')->with('error', 'Error updating contact.');
        }
    }

    public function delete_phone(PhoneNumberDeleteRequest $request)
    {
        if (TopupContact::destroy($request->delete_phone)) {
            return redirect()->back()->with('success', 'Phone Number Deleted');
        }
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


    
