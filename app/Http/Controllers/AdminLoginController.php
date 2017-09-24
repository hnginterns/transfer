<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct() {
    	$this->middleware('guestAdmin')->except('admin.login');
    }

    public function showLoginForm() {
    	$data['title'] = 'Admin login';
    	return view('admin.ad-sign-in', $data);
    }

}
