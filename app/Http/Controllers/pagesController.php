<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use App\Wallet;
use Session;
use Illuminate\Support\Facades\Auth;
use App\Beneficiary;
use App\User;
use App\Restriction;
use App\CardWallet;
use App\Events\FundWallet;
use App\Transaction;
use App\BankTransaction;
use App\WalletTransaction;
use App\SmsWalletFund;
use App\TopupContact;
use App\TopupHistory;
use App\Validation;

use App\Bank;
use App\Tag;
use Illuminate\Support\Facades\Input;

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
        //event(new FundWallet(new CardWallet));
    }

    public function signin(Request $request)
    {
        $data['ref'] = str_replace('http://', '', str_replace('https://', '', URL::previous()));
        $data['host'] = str_replace('http://', '', str_replace('https://', '', $request->server('HTTP_HOST')));

        return $this->showLoginForm(); // Does the same thing as above
    // return view ('sign-in');
    }

    //get token for new transaction
    public function getToken()
    {
        $api_key = "lv_I4EE93OHHDADBW7DVLNJ";
        $secret_key = "lv_HTCYZPYLQG7O12C0DC5PXMLWLZ02T2";
        \Unirest\Request::verifyPeer(false);
        $headers = array('content-type' => 'application/json');
        $query = array('apiKey' => $api_key, 'secret' => $secret_key);
        $body = \Unirest\Request\Body::json($query);
        $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/merchant/verify', $headers, $body);
        $response = json_decode($response->raw_body, true);
        $status = $response['status'];
        if (!$status == 'success') {
            echo 'INVALID TOKEN';
        } else {
            $token = $response['token'];
            return $token;
        }
    }

    public function userdashboard()
    {
        //$wallet = Wallet::all();
        // $permission = Restriction::where('uuid',Auth::user()->id)->get();
        $wallet = DB::table('wallets')->where('type', '=', 'regular')->get();
        event(new FundWallet(new CardWallet));
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
        if(count($restrict->canTransferFromWallet()) != 0) return back()->with('error', 'You do not have the permission to transfer to bank');;

        return view('transfer-to-bank', compact('wallet'));
    }

    public function validation(Wallet $wallet)
    {
        $permit = Restriction::where('wallet_id', $wallet->id)
          ->where('uuid', Auth::user()->id)
          ->first();
        if($permit == null) return back()->with('error', 'You do not have the permission to transfer to bank');;
        $restrict = new Restrict($permit);
        if(count($restrict->canTransferFromWallet()) != 0) return back()->with('error', 'You do not have the permission to transfer to bank');;

        return view('validateTransferToBank', compact('wallet'));
    }

    public function wallet_transfer(Wallet $wallet)
    {
        $wallets = Wallet::all();
        return view('transfer-to-wallet', compact('wallet', 'wallets', 'wallet'));
    }


    public function walletdetail(Wallet $wallet)
    {
        $permit = Restriction::where('wallet_id', $wallet->id)
          ->where('uuid', Auth::user()->id)
          ->first();
        if($permit == null) return redirect('/dashboard')->with('error', 'You do not have access to this wallet');

        $cardWallet = CardWallet::latest()->first();
        //$validate = Validation::latest()->first();
        $beneficiaries = Beneficiary::where('wallet_id', $wallet->id)->latest()->paginate(15);

        // get all wallet to wallet transactions, both sent and received
        $walletTransfer = WalletTransaction::where('source_wallet', $wallet->wallet_code)->get();
        //var_dump($walletTransfer);
        //die();
        $walletTransactions = CardWallet::where('wallet_name', $wallet->wallet_name)->get();
        $bankTransactions = BankTransaction::where('wallet_id', $wallet->id)->get();

        $history = Trans::getTransactionsHistory($walletTransfer, $walletTransactions, $bankTransactions, $wallet->wallet_code, $wallet->id);

        event(new FundWallet($wallet));
        return view('view-wallet', compact('wallet','permit','rules','beneficiaries', 'history', 'cardWallet', 'validate', 'bankTransactions', 'walletTransactions', 'walletTransfer'));
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

    public function insertBeneficiary(Request $request, Wallet $wallet)
    {    
         $validator = $this->validateBeneficiary($request->all());
        //  dd($validator);
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
             Session::flash('form-errors', $messages);
            return redirect()->to(URL::previous())->withInput();
        } else { 
            
            $permit = Restriction::where('wallet_id', $wallet->id)
            ->where('uuid', Auth::user()->id)
            ->first();
            if($permit == null){
                return redirect('/dashboard')
                        ->with('error', 'You do not have the permission to add beneficiary');
            }
            $restrict = new Restrict($permit);
            
            if(count($restrict->canAddBeneficiary()) > 0){
                return redirect('/dashboard')
                ->with('error', 'You do not have the permission to add beneficiary');
            }

                $token = $this->getToken();
            
                $bank_code = explode('||', request('bank_id'));
                $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                
                $account_number = $request->account_number;
                $bank_code = $bank_code[0];
                //$url = "https://api.paystack.co/bank/resolve?account_number=$account_number&bank_code=$bank_code";
                //$response = \Unirest\Request::get($url, $headers);
                $query = array('account_number'=> $account_number,'bank_code' => $bank_code);
                $body = \Unirest\Request\Body::json($query);
                $response = \Unirest\Request::post('https://live.moneywaveapi.co/v1/resolve/account', $headers, $body);
                $response = json_decode($response->raw_body, true);
                if($response['status'] == 'success')
                {
                    /**$beneficiary = new Validation;
                    //$beneficiary->name = request('name');
                    $beneficiary->account_number = request('account_number'); //->account_number;
                    $bank_detail = explode('||', request('bank_id'));
                    //$beneficiary->wallet_id = $wallet->id;
                    $beneficiary->bank_id = $bank_detail[0];
                    $beneficiary->bank_name = $bank_detail[1];
                    $beneficiary->uuid = Auth::user()->id; 
                    
                    if ($beneficiary->save()) {**/
                    $bank_code = explode('||', request('bank_id'));
                    $responses = [];
                    $responses['name'] = $response['data']['account_name'];
                    $responses['bank_code'] = $bank_code[0];
                    $responses['bank_name'] = $bank_code[1];
                    $responses['account_number'] = $request->account_number;
                    return back()->with('responses', array($responses));
                //return redirect("wallet/$wallet->id")->with('success', 'Beneficiary added');
                    } 
                    return redirect()->back()->with('error', $response['msg']);
                

        }
    }

    public function addAccount(Request $request, Wallet $wallet)
    {
        $beneficiary = Beneficiary::where('name', $request->name)
                                    ->where('wallet_id', $wallet->id)
                                    ->first();
    
        if(is_null($beneficiary)) {
            $beneficiary = Beneficiary::firstOrCreate([

            'name' => $request->name,
            'wallet_id' => $wallet->id,
            'bank_code' => $request->bank_id, 
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'uuid' => Auth::user()->id,
            ]);
            
            
            if($beneficiary->wasRecentlyCreated){
                return redirect("wallet/$wallet->id")->with('success', 'Beneficiary added');
            }    
        }
         
            return redirect("wallet/$wallet->id")->with('error', 'Beneficiary already exists');
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
            CURLOPT_URL => "https://mobilenig.com/api/balance.php/?username=jekayode&password=transfer",
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
        //phones = TopupContact::all();

        $phones = TopupContact::orderBy('starred','desc')->get(); //$this->paginate(Input::get('search'), Input::get('department'));
        $tags = Tag::all();
        $topupbalance = $this->getTopupWalletBalance();
        $cardWallet = CardWallet::latest()->first();
        $user = Auth::user();
        $wallet = Wallet::where('type', 'topup')->first();
        $fundhistory = CardWallet::where('wallet_name', $wallet->wallet_name)->get();
        $walletfundhistory = \App\PhonetopupTransaction::where('wallet_id', $wallet->id)
                            ->orderBy('created_at', 'desc')
                            ->get();

        // $topuphistory = DB::table('topup_histories')
        //     ->join('topup_contacts', 'topup_histories.contact_id', '=', 'topup_contacts.id')
        //     ->join('users', 'topup_histories.user_id', '=', 'users.id')
        //     ->select('topup_histories.*', 'topup_contacts.phone', 'topup_contacts.firstname', 'users.username', 'topup_contacts.lastname', 'topup_contacts.netw')
        //     ->orderBy('created_at', 'desc')
        //     ->get();

        $topuphistory = TopupHistory::orderBy('created_at', 'desc')->get();
            // dd($topuphistory);
            if(strlen($topupbalance) > 16){
                $topupbalance = null;
                Session::flash('error', 'Could not retrieve balance');
            }
        return view('phonetopup', compact('cardWallet','wallet', 'phones', 'topupbalance', 'topuphistory', 'walletfundhistory', 'depts','tags','fundhistory'));
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
    
    protected function validateBeneficiary(array $data) {
        return Validator::make($data, [
            //'name' => 'required|string',
            'bank_id' => 'required|string|min:4',
            'account_number' => 'required|numeric',
        ]);
    }

    public function paginate($search = null, $department = null)
    {
        $query = TopupContact::query();

        if ($department) {
            $query->where('department', $department);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('tags', "like", "%{$search}%");
                $q->orWhere('phone', 'like', "%{$search}%");
                $q->orWhere('firstname', 'like', "%{$search}%");
                $q->orWhere('lastname', 'like', "%{$search}%");
            });
        }

        $result = $query->with('groups')->orderBy('starred', 'desc')
            ->get();

        if ($search) {
            $result->appends(['search' => $search]);
        }

        return $result;
    }



}
