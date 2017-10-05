<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;

use App\Wallet;
use App\Beneficiary;
use DB;

class WalletController  extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
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

        $beneficiaries  = DB::table('beneficiaries')->where('wallet_id', $id)->get();
        
        //pass wallets data to view and load list view
        return view('admin.wallets.details', compact('wallet', 'beneficiaries'));
    }
    
    public function add(){
        //load form view
        return view('admin.wallets.create');
    }
    
    public function insert(Request $request){
        //validate wallet data
        $this->validate($request, [
            'name' => 'required',
            'currency' => 'required',
            'rule_id' => 'required',
            'ref_code' => 'required',
            'status' => 'required'
        ]);
        
        //get wallet data
        $walletData = $request->all();
        
        //insert wallet data
        Wallet::create($walletData);
        
        //store status message
        //Session::flash('success_msg', 'wallet added successfully!');

        return redirect()->route('wallets.index')->with('success','wallet added successfully!');
    }
    
    public function edit($id){
        //get wallet data by id
        $wallet = Wallet::find($id);
        
        //load form view
        return view('admin.wallets.edit', ['wallet' => $wallet]);
    }
    
    public function update($id, Request $request){
        //validate wallet data
        $this->validate($request, [
            'name' => 'required',
            'currency' => 'required',
            'rule_id' => 'required',
            'ref_code' => 'required',
            'status' => 'required'
        ]);
        
        //get wallet data
        $walletData = $request->all();
        
        //update wallet data
        Wallet::find($id)->update($walletData);

        return redirect()->route('admin.wallets.index')->with('success','wallet update successfully!');
    }
    
    public function delete($id){
        //update wallet data
        Wallet::find($id)->delete();
        
        //store status message
        Session::flash('success_msg', 'wallet deleted successfully!');

        return redirect()->route('wallets.index');
    }


    public function manualfund($id){
        //get wallet data by id
        $wallet = Wallet::find($id);
        
        //load form view
        return view('admin.wallets.manualfund', ['wallet' => $wallet]);
    }


    public function manualfundstore($id, Request $request){

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

    
}