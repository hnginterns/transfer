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
use App\Bank;
use App\CardWallet;
use App\Restriction;
use App\Rule;
use App\SmsWalletFund;
use DB;

use App\TopupHistory;
use App\TopupContact;
use App\Tag;

use App\Beneficiary;
use App\Transaction;
use Carbon\Carbon;
use Trs;
use Illuminate\Database\SQLiteConnection;

class AdminController extends WalletController
{
    public function __construct()
    {
        $this->middleware('cache');
        $this->middleware('admin')->except('logout');
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

        $contacts = TopupContact::with('groups')->get();
        $topupbalance = (integer) $this->getTopupWalletBalance();
        $bank = Bank::all();
        $tags = Tag::all();
        //$wallet = Wallet::where('type', 'topup')->get();

         $wallet = Wallet::where('type', 'topup')->first();
         //DB::table('wallets')->where('type', '=','topup')->first();
         $wallet_name = ($wallet == null) ? null : $wallet->wallet_name;
         $history = CardWallet::where('wallet_name', $wallet_name)->paginate(10);

         $cardWallet = CardWallet::latest()->first();
        //dd($cardWallet);

         $topuphistory = DB::table('topup_histories')
            ->join('topup_contacts', 'topup_histories.contact_id', '=', 'topup_contacts.id')
            ->join('users', 'topup_histories.user_id', '=', 'users.id')
            ->select('topup_histories.*', 'topup_contacts.phone', 'topup_contacts.firstname', 'users.username', 'topup_contacts.lastname', 'topup_contacts.netw')
            ->latest()
            ->get();
        
        return view('admin.phonetopup.index', compact('cardWallet', 'phones', 'wallet', 'bank', 'topupbalance', 'contacts', 'history', 'tags', 'topuphistory'));
    }

    public function index()
    {
        $wallets = Wallet::all();
        $users = User::all();
        $beneficiaries = Beneficiary::all();
        $contacts = TopupContact::all();

        $topupPerMonth = $this->countOfNewPerMonth(
            Carbon::now()->startOfYear(),
            Carbon::now()
        );


        return view('admin.dashboard', compact('wallets', 'users', 'contacts', 'beneficiaries', 'topupPerMonth'));
    }


    public function managePermission()
    {
        $restriction = Restriction::paginate(8);

        return view('admin.permit.managepermission', compact('restriction'));
    }

    public function managewallet()
    {
        //$wallets = Wallet::where('type',' ')->get();
        $wallets = Wallet::all();

        return view('admin.managewallet', compact('wallets'));
    }

    public function addWallet(Request $request)
    {
        $validator = $this->validateWallet($request->all());

        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
             Session::flash('form-errors', $messages);
            return redirect()->to(URL::previous())->withInput();
        } else {
            $wallet_data = $this->createWalletAdmin($request);
            if (!is_bool($wallet_data)) {
				
				$checkWallet =  DB::table('wallets')->where('wallet_name', $request->wallet_name)->first();//check if wallet name exist
				if($checkWallet == null || $checkWallet == false){//if it does not exist
					
					$this->storeWalletDetailsToDB(//add to wallet
                    $wallet_data,
                    $request->lock_code,
                    $request->wallet_name,
                    $request->type
                );
					
				}
				
               
            }

            Session::flash('messages','Wallet Create successfully');
            return redirect()->to('admin/managewallet');
        }
    }

    public function wallet()
    {
        $user = User::all();
        $user_ref = substr(md5(Carbon::now()), 0, 10);
        return view('admin.createwallet', compact('user', 'user_ref'));
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
        return redirect('/admin/viewwallet/'.$id);
    }

    public function activateWallet($id)
    {
        $wallet = Wallet::findOrFail($id);

        Wallet::where('id', $id)->update(['archived' => 0]);

        Session::flash('messages','Wallet Activated successfully.');

        return redirect('/admin/viewwallet/'.$id);
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
            'bank_id' => 'required|string',
            'account_number' => 'required|string|max:10',
        ]);
    }

    /**
    *   Log User activities to db
    *
    *@return \Illuminate\Http\response
    */
    public function logActivity()
    {
        $logs = \LogUserActivity::logUserActivityLists();
        return view('admin/logActivity', compact('logs'));
    }


    public function countOfNewPerMonth($from, $to)
    {
        $perMonthQuery = $this->getPerMonthQuery();

        $result = TopupHistory::select([
            DB::raw("{$perMonthQuery} as month"),
            DB::raw('count(id) as count')
        ])
            ->whereBetween('created_at', [$from, $to])
            ->groupBy('month')
            ->orderBy('month', 'ASC')
            ->pluck('count', 'month');

        $counts = [];

        foreach(range(1, 12) as $m) {
            $month = date('F', mktime(0, 0, 0, $m, 1));

            $month = trans("app.months.{$month}");

            $counts[$month] = isset($result[$m])
                ? $result[$m]
                : 0;
        }

        return $counts;
    }


    private function getPerMonthQuery()
    {
        $connection = DB::connection();

        if ($connection instanceof SQLiteConnection) {
            return 'CAST(strftime(\'%m\', created_at) AS INTEGER)';
        }

        return 'MONTH(created_at)';
    }
    


}
