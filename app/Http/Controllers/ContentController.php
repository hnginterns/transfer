<?php

namespace App\Http\Controllers;

class ContentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function how()
    {
        return view('pages.how');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function features()
    {
        return view('pages.features');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function help()
    {
        return view('pages.help');
    }

}
