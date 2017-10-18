<?php
namespace App\Http\Controllers\User;
use DateTime;
use App\Wallet;
use App\WalletTransaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Restriction;
use App\CardWallet;
use App\Beneficiary;

use App\SmsWalletFund;
use App\Rule;
use App\Transaction;
use URL;
use App\BankTransaction;
use RestrictionController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RestrictionController as Restrict;
use App\Events\TransferToBank;
use App\Events\FundWallet;
class PhoneTopUpController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
   public function phoneTopUp()
    {
        



    }

    public function phoneshow($id)
    { 
        $phone = SmsWalletFund::find($id);

        return response()->json([
            'type' => 'success',
            'data' => $phone,
        ]);

    }

    public function ptopuphonesubmit(Request $request)

    { 

        



        
        $phone = SmsWalletFund::find($id);

        $book = Book::find($request->get('id'));

        \Auth::user()->favorites()->save($book);

        return \Redirect::route('home')->with('success', 'Book favorited!');
            

    }
}
