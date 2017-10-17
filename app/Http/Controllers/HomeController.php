<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['randomFunc']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    // This is for Testing
    public function randomFunc(\App\Wallet $wallet)
    {
        $wal = $wallet->find(1);

        // return $wal->archive() ? "Wallet was Archived" : "Archiving Failed!";
        return $wal->canTransfer() ? "Transaction can Proceed" : "Transaction Failed! You have reached your Transaction Limit for the day";
    }

    public function pdf()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }

}
