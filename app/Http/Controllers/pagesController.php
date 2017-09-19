<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function home () {
      retun view('home-page');
    }

    public function balance () {
      return view ('balance');
    }

    public function transfer () {
      return view ('transfer');
    }

    //all other page functions can be added
}
