<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public  function __construct(){
        $this->middleware('admin')->except('logout');
    }

	public function index() {
		return view('admin.home');
	}

    public function setRule() {
    	// Basically display a paage on which rules are set
    	return view('admin.set-rules');
    }

    public function saveRule(Request $request) {
    	// logic for saving the rules Lies Here
    }

    public function createRule() {
    	// Basically display a page on which rules are created e.g A form
    	return view('admin.create-rules');
    }

    public function saveNewRule(Request $request) {
    	// logic for saving new rules Lies Here
    }


    public function settings() {
    	// Basically display a paage on which the company can edit settings
    	return view('admin.setting');
    }

    public function saveSettings() 
    {

    }

    public function viewDashbard(){
        return view('admin.admindashboard');
    }


}
