<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class transactionController extends Controller
{
    public function toBankSuccess()
    {
        return view('/transactionsuccess');
    }

    public function toBankFailed()
    {
        return view('/transfer-to-bank');
    }
}
