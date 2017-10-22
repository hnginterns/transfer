<?php
namespace App\Http\Controllers\User;
use DateTime;
use App\Wallet;
use App\TopupContact;
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
        $phone = SmsWalletFund::find($request->get('id'));

        return \Redirect::route('home')->with('success', 'Book favorited!');
            

    }

    public function topuphonesubmit(Request $request)
    {
        // dd($request);
        // $contact = TopupContact::all();
        $contact = TopupContact::find($request->user_id);
        // $contact = TopupContact::find($request->current_id);
        // dd($contact);
        $headers = array('content-type' => 'application/json');
        $response = \Unirest\Request::get(
            'https://mobileairtimeng.com/httpapi/?userid=' .
            '08189115870&pass=dbcc49ee2fba9f150c5e82' .
            '&network='. $contact->network .'&phone='. $contact->phone .'&amt=5', 
            // '&network='. $contact->network .'&phone='. $contact->phone .'&amt='. $request->amount, 
            $headers
        );
        var_dump($response);
        $response = json_decode($response->raw_body, true);
        $status = $response['status'];
        dd($response);
        //end of Api call
    }


    

    

}
