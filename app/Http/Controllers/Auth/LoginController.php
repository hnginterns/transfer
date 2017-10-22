<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {   
        
        $this->datta['ref'] = str_replace('http://', '', str_replace('https://', '', URL::previous()));
        $this->datta['host'] = str_replace('http://', '', str_replace('https://', '', $request->server('HTTP_HOST')));
        $this->middleware('guest')->except('logout');
        
    }

    protected function authenticated(Request $request, $user)
    {
        //\LogUserActivity::addToLog(auth()->user()->username.' signed in successfully');
        $this->redirectTo = '/dashboard';
    }
}
