<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guestAdmin')->except('admin.logout');
    }

    public function showLoginForm()
    {
        if (Auth::check() && Auth::user()->is_admin == 1) {
            return redirect('/admin');
        }
        
        $data['title'] = 'Admin login';
        return view('admin.ad-sign-in', $data);
    }


    protected function attemptLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'is_admin' => 1])) {
            //\LogUserActivity::addToLog(Auth::user()->username.' signed in successfully');
            return true;
        }

        return false;
    }
}
