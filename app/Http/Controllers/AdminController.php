<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;
use App\User;
use App\Wallet;

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
    }


    public function settings() {
    	// Basically display a paage on which the company can edit settings
    	return view('admin.setting');
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

    public function banUser(Request $request, User $user){

        if($user->delete()){
            return back()->with(["alert" => "user with id $user has been banned"]);
        }else{
            return back()->with(["alert" => "user with id $user could not be banned"]);
        }

    }

    public function unbanUser(Request $request, $user_id){

        $state = User::withTrashed()
                    ->where('id', $user_id)
                    ->restore();
        if($state){
            return back()->with(["alert" => "user with id $user has been restored"]);
        }else{
            return back()->with(["alert" => "user with id $user could not be restored"]);
        }

    }


}
