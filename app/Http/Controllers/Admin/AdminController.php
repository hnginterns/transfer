<?php
namespace App\Http\Controllers\Admin;

use Auth;
use URL;
use App\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\WalletController;
use App\User;
use App\Wallet;
use App\CardWallet;
use App\Restriction;
use App\Rule;
use DB;
use App\Beneficiary;
use App\Transaction;
use Carbon\Carbon;
use Trs;

class AdminController extends WalletController
{
    public function __construct()
    {
        $this->middleware('admin')->except('logout');
    }

    public function index()
    {
        $wallets = Wallet::all();
        $users = User::all();
        return view('admin.dashboard', compact('wallets', 'users'));
    }


    public function managePermission()
    {
        $restriction = Restriction::all();

        return view('admin.managepermission', compact('restriction'));
    }

    public function managewallet()
    {
        $wallets = Wallet::all();
        return view('admin.managewallet', compact('wallets'));
    }

    public function addWallet(Request $request)
    {
        $validator = $this->validateWallet($request->all());

        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            Session::flash('messages', $this->formatMessages($messages, 'error'));
            return redirect()->to(URL::previous())->withInput();
        } else {
            $wallet_data = $this->createWalletAdmin($request);
            if (!is_bool($wallet_data)) {
                $this->storeWalletDetailsToDB(
                    $wallet_data,
                    $request->lock_code,
                    $request->wallet_name
                );
            }

            return redirect()->to('admin/managewallet');
        }
    }

    public function usermanagement()
    {
        $name = Auth::user()->username;
        return view('usermanagement')->with("name", $name);
    }

    public function wallet()
    {
        $user = User::all();
        $user_ref = substr(md5(Carbon::now()), 0, 10);
        return view('admin/createwallet', compact('user', 'user_ref'));
    }

    public function show($walletId, CardWallet $cardWallet)
    {
        $wallet = Wallet::find($walletId);

        $cardWallet = CardWallet::where('wallet_name', $wallet->wallet_name)->get();

        $status = $wallet->archived == 0 ? 'Active' : 'Archived';

        //$data['users'] = $wallet->users()->get()->toArray();

        //$data['users'] = Restriction::where('wallet_id', $walletId)->get()->toArray();

          $data['users'] =  DB::table('restrictions')
                            ->join('users', 'restrictions.uuid', '=', 'users.id')
                            ->where('restrictions.wallet_id', '=', $walletId)
                            ->select('users.username', 'users.first_name', 'users.last_name', 'users.email')
                            ->get()->toArray();
        
        //dd($data['users']);

        $data['transactions'] = $cardWallet;

        //dd($data['transactions']);

        $data['userRef'] = substr(md5(Carbon::now()), 0, 10);

        $data['beneficiaries'] = Beneficiary::where('wallet_id', $walletId)->get();

        //$data['wt'] = WalletTransaction::where('source_wallet', $walletId)->orWhere('recipient_wallet', $walletId)->get();

        $data['wallet'] = $wallet;

        //dd($data['transactions']);

        return view('admin/walletdetails', $data); //compact('wallet', 'user', 'transaction'));
    }

    public function walletdetails()
    {
        $token = $this->getToken();
        $headers = array('content-type' => 'application/json', 'Authorization' => $token);

        $response = \Unirest\Request::get('https://moneywave.herokuapp.com/v1/wallet', $headers);

        $data = json_decode($response->raw_body, true);
        $walletBalance = $data['data'];
        dd($walletBalance);
    }

    // There's already a method in wallet.php for archiving.
    // You could use route model binding to inject the wallet
    public function archiveWallet($id)
    {
        $wallet = Wallet::findOrFail($id);

        Wallet::where('id', $id)->update(['archived' => 1]);

        return redirect('/admin/viewwallet/'.$id)->with('message', 'Wallet Archived successfully.');
    }

    public function activateWallet($id)
    {
        $wallet = Wallet::findOrFail($id);

        Wallet::where('id', $id)->update(['archived' => 0]);

        return redirect('/admin/viewwallet/'.$id)->with('message', 'Wallet Activated successfully.');
    }

    public function fundWallet(CardWallet $cardWallet)
    {
        $cardWallet = CardWallet::latest()->first();
        return View('admin/fundwallet', compact('cardWallet'));
    }

    public function webAnalytics()
    {
        return view('admin/analytics');
    }

    public function cardTransaction(CardWallet $cardWallet)
    {
        $cardWallets = CardWallet::paginate(10);
        return view('admin/fundhistory', compact('cardWallets'));
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateRule(array $data)
    {
        return Validator::make($data, [
            'rule_name' => 'required|string|max:255',
            'max_amount' => 'required|numeric',
            'min_amount' => 'required|numeric',
            'max_transactions_per_day' => 'required|numeric',
            'max_amount_transfer_per_day' => 'required|numeric',
        ]);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateBeneficiary(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            //'bank_id' => 'required|string',
            'account_number' => 'required|string|max:10',
        ]);
    }
}
