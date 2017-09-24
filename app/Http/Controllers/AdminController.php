<?php

namespace App\Http\Controllers;

use Auth;
use URL;
use App\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Wallet;
use App\Rule;
use Carbon\Carbon;
class AdminController extends WalletController
{


    public  function __construct(){
        $this->middleware('admin')->except('logout');

    }

	public function index() {
        $name = Auth::user()->username;
        $wallets = Wallet::all();
        $users = User::all();
		return view('admin.admindashboard', compact('wallets','users'));
	}

    public function setRule() {
    	// Basically display a paage on which rules are set
        $name = Auth::user()->username;
    	return view('admin.set-rules')->with("name", $name);
    }

    public function saveRule(Request $request) {
    	// logic for saving the rules Lies Here
		}
		
		public function viewRules() {
    	$name = Auth::user()->username;
			
			$rules = Rule::all();
    	return view('admin.viewrules', compact('rules'))->with("name", $name);
    }

    public function createRule() {
    	// Basically display a page on which rules are created e.g A form
        $name = Auth::user()->username;
    	return view('admin.create-rules')->with("name", $name);
		}
		
		public function editRules($ruleId) {
    	
			$rule = Rule::find($ruleId);

			return view('admin.editrules', compact('rule'));
		}
		
		public function updateRule(Request $request) {
			$rule = Rule::find($request->rule_id);

			if ($rule) {

				$rule->rule_name = $request->rule_name;
				$rule->max_amount = $request->max_amount;
				$rule->min_amount = $request->min_amount;
				$rule->max_transactions_per_day = $request->max_transactions_per_day;
				$rule->max_amount_transfer_per_day = $request->max_amount_transfer_per_day;
				$rule->can_transfer = $request->can_transfer;
				$rule->can_transfer_external = $request->can_transfer_external;

				if ($rule->save()) {
					return redirect('admin/view-rules');
				} else {
						return redirect()->back()->with('status', 'Rule update Failed!');
				}
			}
		}

    public function saveNewRule(Request $request) {
        // logic for saving new rules Lies Here
        $validator = $this->validateRule($request->all());

        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            Session::flash('messages', $this->formatMessages($messages, 'error'));
            return redirect()->to(URL::previous())->withInput();
        } else {

            $rule = new Rule;
            $rule->rule_name = $request->rule_name;
            $rule->max_amount = $request->max_amount;
            $rule->min_amount = $request->min_amount;
            $rule->max_transactions_per_day = $request->max_transactions_per_day;
            $rule->max_amount_transfer_per_day = $request->max_amount_transfer_per_day;
            $rule->can_transfer = $request->can_transfer;
            $rule->can_transfer_external = $request->can_transfer_external;
            $rule->created_by = Auth::user()->id;
            $rule->updated_by = Auth::user()->id;
            if ($rule->save()) {
                // Session::flash('messages', $this->formatMessages("Rule Could not be created", 'error'));
                return redirect()->to(URL::previous());

            } else {
                Session::flash('messages', $this->formatMessages("Rule Could not be created", 'error'));
                return redirect()->to(URL::previous());
            }
        }

    }


    public function settings() {
    	// Basically display a paage on which the company can edit settings
    	return view('admin.setting');
    }

    public function managewallet() {

			$wallets = Wallet::all();

      return view ('admin.managewallet', compact('wallets'));
    }

    public function addWallet(Request $request) {

       $validator = $this->validateWallet($request->all());

        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            Session::flash('messages', $this->formatMessages($messages, 'error'));
            return redirect()->to(URL::previous())->withInput();
        } else {
                    $wallet_data = $this->createWalletAdmin($request);
                    // dd($wallet_data);
                if(!is_bool($wallet_data)){
                    $this->storeWalletDetailsToDB($wallet_data,
                                                 $request->user_id,
                                                 $request->lock_code,
                                                 $request->rule_id,
                                                 $request->wallet_name);
                }


        }
	$data['wallets'] = Wallet::all(); 
      return view ('admin.managewallet', $data);
    }

    public function saveSettings(){

    }

    public function addaccount(){
       $name = Auth::user()->username;
       return view('addaccount')->with("name", $name);
    }

    public function usermanagement(){
        $name = Auth::user()->username;
        return view('usermanagement')->with("name", $name);
    }

     public function wallet() {
        $rule = Rule::all();
        $user = User::all();
        $user_ref = substr(md5(Carbon::now()),0,10);
        return view ('admin/createwallet', compact('rule','user','user_ref'));
    }

    public function show($walletId) {

			$wallet = Wallet::find($walletId);
            $transaction = \App\Http\Utilities\Wallet::all();

            $transact = array_column($transaction, 'balance', 'uref');

            foreach($transact as $key => $value) {
                
                var_dump($key);
                die();
                }
            
			$user = $wallet->users()->get()->toArray();

			$userRef = substr(md5(Carbon::now()),0,10);

			

      return view ('admin/walletdetails', compact('wallet', 'user', 'bal'));
		}
		
		public function walletdetails() {
			$token = $this->getToken();
			$headers = array('content-type' => 'application/json','Authorization'=> $token);

			$response = \Unirest\Request::get('https://moneywave.herokuapp.com/v1/wallet', $headers);

			$data = json_decode($response->raw_body, true);
			$walletBalance = $data['data'];
			
			//$walletBalance = array_pluck($walletBalance, 'id', 'id');
			dd($walletBalance);

}


    public function ViewBeneficiary() {
      return view ('admin/managebeneficiary');
    }

     public function BeneficiaryDetails() {
      return view ('admin/beneficiarydetails');
    }

     public function addBeneficiary() {
      return view ('admin/createbeneficiary');
    }

       /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateRule(array $data)
    {
        return Validator::make($data, [
            'rule_name' => 'required|string|max:255',
            'max_amount' => 'required|numeric',
            'min_amount' => 'required|numeric',
            'max_transactions_per_day' => 'required|numeric',
            'max_amount_transfer_per_day' => 'required|numeric',
        ]);

    }




}
