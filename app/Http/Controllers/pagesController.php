<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class pagesController extends Controller
{
  use AuthenticatesUsers;

<<<<<<< HEAD
  protected $redirectTo = '/dashboard';

=======
  protected $redirectTo = '/usermanagement';
  
>>>>>>> 48215a154d692a1ea04a37e1e7819227fbad1e5d
  public function __contruct(){
    $this->middleware('auth')->except('signin');

  }

  public function home () {
    return view('home-page');
  }

  public function signin(Request $request)
  {
    $data['ref'] = str_replace('http://', '', str_replace('https://', '', URL::previous()));
    $data['host'] = str_replace('http://', '', str_replace('https://', '', $request->server('HTTP_HOST')));

    return $this->showLoginForm(); // Does the same thing as above
    // return view ('sign-in');
  }

  public function userdashboard(){
    return view('dashboard');
  }

  public function about(){
    return view('about');
  }

  public function forgot(){
    return view('forgot');
  }

  public function signout(){
    return view('signin');
  }


  public function success(){
    return view('success');
  }

  public function failed(){
    return view('failed');
  }

  public function balance () {
    return view ('balance');
  }

  public function transfer () {
    return view ('transfer');
  }

  public function bank_transfer (){
    return view ('transfer-to-bank');
  }

  public function wallet_transfer(){
    return view ('transfer-to-wallet');
  }

  public function viewAccounts(){
      return view('view-accounts');
  }

  public function webAnalytics() {
    return view ('web-analytics');
  }

  public function viewWallet() {
    return view ('wallet-view');
  }
  public function createWallet() {
    return view ('create-wallet');
  }
  public function manageUsers() {
    return view ('manage-users');
  }
  public function createUser() {
    return view ('create-user');
  }
  public function walletArchive() {
    return view ('wallet-archive');
  }

  //all other page functions can be added
  /*
  pubic function <function name> {
    {all the logic}
    return view('<blade name>');
  }*/
}
