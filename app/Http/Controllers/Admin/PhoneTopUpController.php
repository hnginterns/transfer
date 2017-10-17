<?php
namespace App\Http\Controllers\Admin;
use Auth;
use URL;
use App\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\User;
use App\Wallet;
use App\SmsWalletFund;
use App\CardWallet;
use App\Restriction;
use App\Rule;
use App\Beneficiary;
use App\Transaction;
use Carbon\Carbon;
use Trs;
class PhoneTopUpController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('logout');
    }
    public function topup()
    {
        return view('phonetopup');
    }
    
    public function addPhone(Request $request){
       
    }
}

    
