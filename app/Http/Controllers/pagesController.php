<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class pagesController extends Controller
{
<<<<<<< HEAD

  public function home () {
    return view('home-page');
  }

  public function signin() 
  {
    return view ('sign-in');
  }

  public function userdashboard(){
    return view('dashboard');
  }

  public function balance () {
    return view ('balance');
  }

  public function transfer () {
    return view ('transfer');
  }

  //all other page functions can be added
  /*
  pubic function <function name> {
    {all the logic}
    return view('<blade name>');
  }*/
=======
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';



    public function home () {
      return view('home-page');
    }

    public function signin(Request $request) 
    {
      $data['ref'] = str_replace('http://', '', str_replace('https://', '', URL::previous()));
      $data['host'] = str_replace('http://', '', str_replace('https://', '', $request->server('HTTP_HOST')));

      return $this->showLoginForm($data);
      //return view ('sign-in', $data);
    }

    public function balance () {
      return view ('balance');
    }

    public function transfer () {
      return view ('transfer');
    }

    //all other page functions can be added
    /*
    pubic function <function name> {
      {all the logic}
      return view('<blade name>');
    }*/
>>>>>>> 69084c30af19a3c1728bb55664ad5e8a88f501a7
}
