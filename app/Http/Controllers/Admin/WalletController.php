<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;
use App\CardWallet;
use App\Wallet;
use App\Beneficiary;
use App\Events\FundWallet;
use DB;
use URL;
use App\Restriction;
use App\User;
use App\Notifications\PermissionNotify;
use App\InternetBanking;

class WalletController  extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('cache');
        $this->middleware('auth');
        $this->middleware('admin')
             ->only(
                ['addPermission', 'editPermission', 
                 'deletePermission', 'PostAddPermission', 
                 'PostEditPermission'
                 ]
            );
        
    }

    public function addPermission(){
        $user = User::all();
        $wallet = Wallet::all(); 
        
        return view('admin.permit.permission', compact('user','wallet'));
    }


    public function editPermission(Restriction $restriction){
        
        $wallet = Wallet::all();
        $transferables = json_decode($restriction->can_transfer_to_wallets);
        return view('admin.permit.editpermission', compact('restriction', 'wallet', 'transferables'));
    }

    public function deletePermission(Request $request, Restriction $restriction){
        
        if($restriction->forceDelete()){
            Session::flash('success', 'Permission deleted');
            return redirect('admin/managePermission'); 
        }else{
            Session::flash('error', 'Permission not deleted');
            return redirect('admin/managePermission');
        }
    }


    public function PostAddPermission(Request $request){
        
        $validator = $this->validatePermission($request->all());
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            Session::flash('form-errors', $messages);
            return redirect()->to(URL::previous());
        } else {
            
            $duplicate = Restriction::where('uuid',$request->uuid)
                                    ->where('wallet_id', $request->wallet_id)
                                    ->first();

            if($duplicate != null){
                Session::flash('error', 'Permission already exists'); 
                return back();
            }

            $restriction = new Restriction;
            $restriction->uuid = $request->uuid;
            $restriction->wallet_id = $request->wallet_id;
            $restriction->can_transfer_from_wallet = $request->has('can_transfer_from_wallet') ? true: false;
            $restriction->can_add_beneficiary = $request->has('can_add_beneficiary') ? true: false;
            $restriction->min_amount = $request->min_amount;
            $restriction->max_amount = $request->max_amount;
            $restriction->can_fund_wallet = $request->has('can_fund_wallet') ? true: false;
            $restriction->created_by = Auth::user()->id;
            $restriction->updated_by = Auth::user()->id;
            $restriction->can_transfer_to_wallets = json_encode($request->can_transfer_to_wallets);
            if($restriction->save()){
                Session::flash('success', 'Permission created');
                $user = $restriction->user->email;
                $users = User::where('email', $user)->first();
                $users->notify(new PermissionNotify($restriction));
                return redirect('admin/managePermission');
            }else{
                Session::flash('error', 'Permission not created');
                return back();
            }

        }
        
        
    }

    /**Creates permission which is bound to user and a wallet
    *  
    * @params $request, $restriction 
    */
    public function PostEditPermission(Request $request, Restriction $restriction){
        
        $validator = $this->validatePermission($request->all());
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
             Session::flash('form-errors', $messages);
            return redirect()->to(URL::previous())->withInput();
        } else {

            $restriction->wallet_id = $request->wallet_id;
            $restriction->can_transfer_from_wallet = $request->has('can_transfer_from_wallet') ? true: false;
            $restriction->can_add_beneficiary = $request->has('can_add_beneficiary') ? true: false;
            $restriction->min_amount = $request->min_amount;
            $restriction->max_amount = $request->max_amount;
            $restriction->can_fund_wallet = $request->has('can_fund_wallet') ? true: false;
            $restriction->updated_by = Auth::user()->id;
            $restriction->can_transfer_to_wallets = json_encode($request->can_transfer_to_wallets);
            if($restriction->save()){
                Session::flash('success', 'Permission updated');
                return redirect('admin/managePermission');
            }else{
                Session::flash('error', 'Permission not updated');
                return back();
            }

        }
    }
    
    public function index(){
        //fetch all wallets data
        $wallets = Wallet::orderBy('created_at','desc')->get();

        //dd($wallets);
        
        //pass wallets data to view and load list view
        return view('admin.wallets.index', ['wallets' => $wallets]);
    }
    
    public function details($id){
        //fetch wallet data
        $wallet = Wallet::find($id);

        //$beneficiaries  = DB::table('beneficiaries')->where('wallet_id', $id)->get();
        
        //pass wallets data to view and load list view
        return view('admin.wallets.details', compact('wallet'));
    }

    public function manualfund($id, CardWallet $cardWallet){
        //get wallet data by id
        $wallet = Wallet::find($id);

        $cardWallet = CardWallet::latest()->first();

        $user = Auth::user();
        
        //load form view
        return view('admin.wallets.manualfund', compact('wallet', 'cardWallet','user'));
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

    public function manualfundstore(Request $request, CardWallet $cardWallet)
    {
        $token = $this->getToken();
        // dd($request);
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
        // dd($response);
        if($response['status'] == 'success') {
            $response = $response['data']['transfer'];
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
    
        var_dump($response);
        die();
            return back()->with('error', $response['message']);
    }


    public function otpForWalletFunding(Request $request, CardWallet $cardWallet)
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
                event(new FundWallet($cardWallet));
                Session::flash('success',$response);
                return redirect('admin/managewallet');

            }
            
    }
    

    public function manualfundint($id){
        //get wallet data by id
        $wallet = Wallet::find($id)->first();

        $intBanking = InternetBanking::latest()->first();

        $user = Auth::user();
        
        //load form view
        return view('admin.wallets.internetbanking', compact('wallet', 'intBanking','user'));
    }

    public function manualfundstoreint($id, Request $request){
        
                //validate wallet data
                /**$this->validate($request, [
                    'name' => 'required',
                    'amount' => 'required',
                    'user_id' => 'required',
                    'wallet_id' => 'required',
                    'method' => 'required',
                    'status' => 'required'
                ]);
                
                //get wallet data
                $fundingData = $request->all();
                
                //update wallet data
                Wallet::find($id)->update($fundingData);
        
                return redirect()->route('admin.wallets.index')->with('success','wallet funded successfully!');
            }
        
            public function ravefund($id){
                //get wallet data by id
                $wallet = Wallet::find($id);
                
                //load form view
                return view('admin.wallets.ravefund', ['wallet' => $wallet]);*/
            }


    public function ravefundstore($id, Request $request){

        //validate wallet data
        $this->validate($request, [
            'name' => 'required',
            'amount' => 'required',
            'user_id' => 'required',
            'wallet_id' => 'required',
            'method' => 'required',
            'status' => 'required'
        ]);
        
        //get wallet data
        $fundingData = $request->all();
        
        //update wallet data
        Wallet::find($id)->update($fundingData);

        return redirect()->route('admin.wallets.index')->with('success','wallet funded successfully!');
    }

    protected function validatePermission(array $data) {
        return Validator::make($data, [
            'uuid' => 'required|numeric',
            'wallet_id' => 'required|numeric',
            'max_amount' => 'required|numeric',
            'min_amount' => 'required|numeric',
        ]);
    }

    protected function validateWalletFunding(array $data) {
        return Validator::make($data, [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'emailaddr' => 'required|email',
            'amount' => 'required|numeric',
            'phone' => 'required|string'
        ]);
    }


    
}