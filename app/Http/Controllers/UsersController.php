<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function transfer() {
    	return view('dashboard.transfer');
    }

    public function processTransfer(Request $request) {

    }

    public function history() {
    	return view('dashboard.history');
    }

    public function fundWallet() {
    	return view('dashboard.fund-wallet');
    }

    public function processFundWallet(Request $request) {

    }
}
