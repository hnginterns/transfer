<?php
namespace App\Http\Controllers\User;
use DateTime;
use App\Wallet;
use App\TopupContact;
use App\TopupHistory;
use App\WalletTransaction;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Restriction;
use App\CardWallet;
use App\Beneficiary;

use Carbon\Carbon;

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
        $phone = SmsWalletFund::find($request->get('id'));

        return \Redirect::route('home')->with('success', 'Book favorited!');
            

    }

    public function topuphonesubmit(Request $request)
    {
        $phone = $request->phone;
        $network = $request->netw;
        $amount = $request->amount;

        // dd($request);
        // $contact = TopupContact::all();
        //$contact = TopupContact::find($request->user_id);
        $contact = TopupContact::find($request->current_id);
        //dd($contact);

        $contacthistory = TopupHistory::where('user_id', $contact->id)->sum('amount');

        //dd($contacthistory);

        if ($contacthistory >= $contact->weekly_max) {
        
            return redirect('/phonetopup')->with('error', 'Weekly Maximum Exceede');

        } 

        $url = 'https://mobilenig.com/api/airtime.php/?username=' .
            'jekayode&password=transfer' .
            '&network='. $contact->netw .'&phoneNumber='. $contact->phone .'&amount='. $amount;
        
        $headers = array('content-type' => 'application/json');
        $response = \Unirest\Request::get($url, $headers);
        //var_dump($response);
        $response = json_decode($response->raw_body, true);

        //dd($response);
        
        /*
        if ($response === null) {
            $status = 'Success';
        } else {
           return redirect('/phonetopup')->with('error', 'An Error Occured');
        }
        //end of Api call

        */

        $topuphistory = new TopupHistory;

        $topuphistory->user_id = $contact->id;
        $topuphistory->amount = $amount;
        //$topuphistory->type = $request->type;
        $topuphistory->ref = str_random(10);
        //$topuphistory->txn_response = $response;
        $topuphistory->txn_response = 00;
        $topuphistory->status = 'Success';

        $topuphistory->save();

        //Session::flash('success',' Phone topped up uccessfully.');
        return redirect('/phonetopup')->with('success', 'Phone topped up uccessfully.');

    }



}
