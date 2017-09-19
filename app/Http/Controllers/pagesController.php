<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function home () {
      return view('home-page');
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
    }
}
