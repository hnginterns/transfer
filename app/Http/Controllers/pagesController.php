<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Wallet;
use Illuminate\Support\Facades\Auth;
use App\Beneficiary;
use App\User;
use App\Restriction;
use App\Http\Utilities\Wallet as UtilWallet;

class pagesController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __contruct()
    {
        $this->middleware('auth')->except('signin');
    }

    public function home()
    {
        return view('home-page');
    }

    public function signin(Request $request)
    {
        $data['ref'] = str_replace('http://', '', str_replace('https://', '', URL::previous()));
        $data['host'] = str_replace('http://', '', str_replace('https://', '', $request->server('HTTP_HOST')));

        return $this->showLoginForm(); // Does the same thing as above
    // return view ('sign-in');
    }

    public function userdashboard()
    {
        $wallets = Wallet::all();
        $transaction = \App\Http\Utilities\Wallet::all();
        $user_id = Auth::user()->id;
        return view('dashboard', compact('wallets', 'transaction', 'user_id'));
    }

    public function about()
    {
        return view('about');
    }

    public function forgot()
    {
        return view('forgot');
    }

    public function signout()
    {
        return view('signin');
    }


    public function success($response)
    {
        return view('success', compact('response'));
    }

    public function failed($response)
    {
        return view('failed', compact('response'));
    }

    public function balance()
    {
        return view('balance');
    }

    public function transfer()
    {
        return view('transfer');
    }

    public function bank_transfer()
    {
        $beneficiary = Beneficiary::all();
        $wallets = Wallet::where('uuid', '=', Auth::user()->id)->get();
        if (!empty($wallet)) {
            //$wallet = $wallet[0];
        }

        return view('transfer-to-bank', compact('beneficiary', 'wallets', 'data'));
    }

    public function wallet_transfer()
    {
        $wallets = Wallet::all();
        $user_id = Auth::user()->id;
        return view('transfer-to-wallet', compact('wallets'))->with('user_id', $user_id);
    }

    public function viewAccounts()
    {
        return view('view-accounts');
    }

    public function otp()
    {
        return view('otp');
    }

    public function walletdetail($id)
    {
        $permit = Restriction::where('wallet_id', $id)
          ->where('uuid', Auth::user()->id)
          ->get();

        $wallet = Wallet::find($id);
        return view('view-wallet', compact('wallet', 'permit'));
    }

    public function createWallet()
    {
        return view('create-wallet');
    }

    public function createBeneficiary()
    {
        return view('create-beneficiary');
    }

    public function addBeneficiary()
    {
        return view('createbeneficiary');
    }

    public function insertBeneficiary()
    {            
        $beneficiary = new Beneficiary;
        $beneficiary->name = request('name');
        $beneficiary->account_number = request('account_number'); //->account_number;
        //list($bank_id, $bank_name) = explode('||', request('bank_id'));
        $beneficiary->wallet_id = '000';
        $beneficiary->bank_id = '058';
        $beneficiary->bank_name = request('bank_id');
        $beneficiary->uuid = Auth::user()->id;
        if ($beneficiary->save()) {
            return redirect('wallet-view')->with('success', 'Beneficiary added');
        } else {
            return redirect()->back()->with('failure', 'Beneficiary could not be added');
        }
    }


    public function pagenotfound()
    {
        return view('404');
    }


    //all other page functions can be added

    public function mainWallet()
    {
        return view('to-main-wallet');
    }
}
