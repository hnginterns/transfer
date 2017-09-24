<?php

namespace App\Http\Controllers;

use Auth;
use URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Wallet;
use App\Rule;
class AdminController extends Controller
{


    public  function __construct(){

        $this->middleware('admin')->except('logout');

    }

	public function index() {
        $name = Auth::user()->username;
		return view('admin.admindashboard')->with("name", $name);
	}

    public function setRule() {
    	// Basically display a paage on which rules are set
        $name = Auth::user()->username;
    	return view('admin.set-rules')->with("name", $name);
    }

    public function saveRule(Request $request) {
    	// logic for saving the rules Lies Here
    }

    public function createRule() {
    	// Basically display a page on which rules are created e.g A form
        $name = Auth::user()->username;
    	return view('admin.create-rules')->with("name", $name);
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
      return view ('admin.managewallet');
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

    public function wallet() {
      return view ('admin/createwallet');
    }

    public function ViewWallet() {
      return view ('admin/walletdetails');
    }

}
