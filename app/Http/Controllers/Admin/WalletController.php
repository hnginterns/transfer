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
use DB;
use URL;
use App\Restriction;
use App\User;

class WalletController  extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addPermission(){
        $user = User::all();
        $wallet = Wallet::all(); 
        
        return view('admin.permission', compact('user','wallet'));
    }


    public function editPermission(Restriction $restriction){
        
        $wallet = Wallet::all();
        $transferables = json_decode($restriction->can_transfer_to_wallets);
        return view('admin.editpermission', compact('restriction', 'wallet', 'transferables'));
    }


    public function PostAddPermission(Request $request){
        
        $validator = $this->validatePermission($request->all());
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            Session::flash('messages', $this->formatMessages($messages, 'error'));
            return redirect()->to(URL::previous())->withInput();
        } else {
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
                return redirect('admin/managePermission');
            }else{
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
            Session::flash('messages', $this->formatMessages($messages, 'error'));
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
                return redirect('admin/managePermission');
            }else{
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


    public function manualfundstore($id, Request $request){

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

    
}