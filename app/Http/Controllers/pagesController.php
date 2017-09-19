<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function home () {
      retun view('home-page');
    }

    public function balance () {
      //balance logic should go here
    }

    public function transfer () {
      //transfer logic should go here
    }

    //all other page functions can be added 
}
