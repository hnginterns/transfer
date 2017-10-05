<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;

use App\Wallet;
use App\Beneficiary;

class BeneficiaryController  extends Controller
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
        //fetch all beneficiaries data
        $beneficiaries = Beneficiary::orderBy('created_at','desc')->get();

        //dd($beneficiaries);
        
        //pass beneficiaries data to view and load list view
        return view('admin.beneficiaries.index', ['beneficiaries' => $beneficiaries]);
    }
    
    public function details($id){
        //fetch beneficiary data
        $beneficiary = Beneficiary::find($id);
        
        //pass beneficiaries data to view and load list view
        return view('admin.beneficiaries.details', ['beneficiary' => $beneficiary]);
    }
    
    public function add(){
        //load form view
        $wallets = Wallet::all();
        return view('admin.beneficiaries.create', compact('wallets'));
    }
    
    public function insert(Request $request){
        //validate beneficiary data
        $this->validate($request, [
            'name' => 'required',
            'wallet_id' => 'required',
            'bank_id' => 'required',
            'account_number' => 'required',
            'status' => 'required'
        ]);
        
        //get beneficiary data
        $beneficiaryData = $request->all();
        
        //insert beneficiary data
        Beneficiary::create($beneficiaryData);
        
        //store status message
        //Session::flash('success_msg', 'beneficiary added successfully!');

        return redirect()->route('beneficiaries.index')->with('success','beneficiary added successfully!');
    }
    
    public function edit($id){
        //get beneficiary data by id
        $beneficiary = Beneficiary::find($id);
        
        //load form view
        return view('admin.beneficiaries.edit', ['beneficiary' => $beneficiary]);
    }
    
    public function update($id, Request $request){
        //validate beneficiary data
        $this->validate($request, [
            'name' => 'required',
            'wallet_id' => 'required',
            'bank_id' => 'required',
            'account_number' => 'required',
            'status' => 'required'
        ]);
        
        //get beneficiary data
        $beneficiaryData = $request->all();
        
        //update beneficiary data
        Beneficiary::find($id)->update($beneficiaryData);

        return redirect()->route('admin.beneficiaries.index')->with('success','beneficiary update successfully!');
    }
    
    public function delete($id){
        //update beneficiary data
        Beneficiary::find($id)->delete();

        return redirect()->route('beneficiaries.index')->with('success','beneficiary deleted successfully!');
    }
    
}