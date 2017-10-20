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
use App\CardWallet;
use App\Transaction;
use App\BankTransaction;
use App\WalletTransaction;
use App\SmsWalletFund;
use App\TopupContact;

use App\Bank;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\RestrictionController as Restrict;
use App\Http\Controllers\transactionController as Trans;
use App\Http\Utilities\Wallet as UtilWallet;

class pagesController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    public function __contruct()
    {
        $this->middleware('cache');
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
        //$wallet = Wallet::all();
        // $permission = Restriction::where('uuid',Auth::user()->id)->get();
        $wallet = DB::table('wallets')->where('type', '=', '')->get();
        
        return view('dashboard', compact('wallet'));
    }

    public function about()
    {
        return view('about');
    }


    public function signout()
    {
        return view('signin');
    }


    public function success()
    {
        return view('success');
    }

    public function walletSuccess()
    {
        return view('successWallet');
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

    public function bank_transfer(Wallet $wallet)
    {
        $permit = Restriction::where('wallet_id', $wallet->id)
          ->where('uuid', Auth::user()->id)
          ->first();
        if($permit == null) return back()->with('error', 'You do not have the permission to transfer to bank');;
        $restrict = new Restrict($permit);

        if(count($restrict->canTransferFromWallet()) != 0) return redirect('/dashboard');

        if(count($restrict->canTransferFromWallet()) != 0) return back()->with('error', 'You do not have the permission to transfer to bank');;

        return view('transfer-to-bank', compact('wallet'));
    }

    public function wallet_transfer(Wallet $wallet)
    {
        $wallets = Wallet::all();
        return view('transfer-to-wallet', compact('wallet', 'wallets', 'wallet'));
    }


    public function otp()
    {
        return view('otp');
    }

    public function walletdetail(Wallet $wallet)
    {
        $permit = Restriction::where('wallet_id', $wallet->id)
          ->where('uuid', Auth::user()->id)
          ->first();
        if($permit == null) return redirect('/dashboard')->with('error', 'You do not have access to this wallet');

        $cardWallet = CardWallet::latest()->first();
        
        $beneficiaries = Beneficiary::where('wallet_id', $wallet->id)->paginate(15);

        // get all wallet to wallet transactions, both sent and received
        $walletTransfer = WalletTransaction::where('source_wallet', $wallet->wallet_code)->get();
        $walletTransactions = CardWallet::where('wallet_name', $wallet->wallet_name)->get();
        $bankTransactions = BankTransaction::where('wallet_id', $wallet->id)->get();

        $history = Trans::getTransactionsHistory($walletTransactions, $bankTransactions, $wallet->wallet_code, $wallet->id, $walletTransfer);

        return view('view-wallet', compact('wallet','permit','rules','beneficiaries', 'history', 'cardWallet'));
    }

    public function createBeneficiary()

    {
        $banks = Bank::all();
        return view('create-beneficiary', compact('banks'));
    }

    public function addBeneficiary(Wallet $wallet)
    {
        $permit = Restriction::where('wallet_id', $wallet->id)
          ->where('uuid', Auth::user()->id)
          ->first();
        if($permit == null) return back()->with('error', 'You do not have the permission to add beneficiary');
        $restrict = new Restrict($permit);
        if(count($restrict->canAddBeneficiary()) > 0) return back()->with('error', 'You do not have the permission to add beneficiary');
        
        $banks = Bank::all();

        return view('createbeneficiary', compact('wallet','banks'));
    }

    public function insertBeneficiary(Wallet $wallet)
    {    
          
        $permit = Restriction::where('wallet_id', $wallet->id)
          ->where('uuid', Auth::user()->id)
          ->first();
        if($permit == null) return redirect('/dashboard')->with('error', 'You do not have the permission to add beneficiary');
        $restrict = new Restrict($permit);
        
        if(count($restrict->canAddBeneficiary()) > 0) return redirect('/dashboard')->with('error', 'You do not have the permission to add beneficiary');

        $beneficiary = new Beneficiary;
        $beneficiary->name = request('name');
        $beneficiary->account_number = request('account_number'); //->account_number;
        $bank_detail = explode('||', request('bank_id'));
        $beneficiary->wallet_id = $wallet->id;
        $beneficiary->bank_id = $bank_detail[0];
        $beneficiary->bank_name = $bank_detail[1];
        $beneficiary->uuid = Auth::user()->id;
        if ($beneficiary->save()) {
            return redirect("wallet/$wallet->id")->with('success', 'Beneficiary added');
        } else {
            return redirect()->back()->with('error', 'Beneficiary could not be added');
        }
    }




    public function pagenotfound()
    {
        return view('404');
    }

    public function getTopupWalletBalance() {

        $username = '08189115870';
        $pass =  'dbcc49ee2fba9f150c5e82';

        $curl = curl_init();
          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://mobileairtimeng.com/httpapi/balance.php?userid=%2008189115870&pass=dbcc49ee2fba9f150c5e82",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
              "cache-control: no-cache",
              "postman-token: 28c061c4-a48c-629f-3aa2-3e4cad0641ff"
            ),
          ));
          $response = curl_exec($curl);
          $err = curl_error($curl);
          curl_close($curl);
          if ($err) {
            return "cURL Error #:" . $err;
          } else {
            return $response;
          }

    }


 public function phoneTopupView()
    {
        $phones = SmsWalletFund::all();
        $topupbanlance = $this->getTopupWalletBalance();

        return view('phonetopup', compact('phones', 'topupbanlance'));
    }

    //all other page functions can be added

    public function mainWallet()
    {
        return view('to-main-wallet');
    }

    public function topuptest()
    {
        return view('topuptest');
    }
}
