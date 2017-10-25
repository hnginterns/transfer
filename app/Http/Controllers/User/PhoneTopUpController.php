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
        
        $username       =     env('TOP_UP_USERNAME');
        $password       =     env('TOP_UP_PASSWORD');
        $phone          =     env('TOP_UP_PHONE');
        $bank_account   =     env('TOP_UP_BANK_ACCOUNT');
        $bank_code      =     env('TOP_UP_BANK_CODE');
        $bank = Bank::where('bank_code', $bank_code)->first();
        $validator = $this->validateRequest($request->all());
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
             Session::flash('form-errors', $messages);
            return back();
        } else {
                $wallet = Wallet::find($request->wallet_id);
                
                $token = $this->getToken();
                $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                $wallet = Wallet::find($request->wallet_id);
                $query = array(
                    "lock" => $wallet->lock_code,
                    "amount" => $request->amount,
                    "bankcode" => $bank_code,
                    "accountNumber" => $bank_account,
                    "currency" => "NGN",
                    "senderName" => $phone,
                    "narration" => $request->narration, //Optional
                    "ref" => $request->reference, // No Refrence from request
                    "walletUref" => $wallet->wallet_code
                );

                //Api call to moneywave for transaction
                $body = \Unirest\Request\Body::json($query);
                $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/disburse', $headers, $body);
                $response = json_decode($response->raw_body, true);
                $status = $response['status'];
                //end of Api call
                
                if ($status == 'success') {

                    //data to be parsed to display transaction details
                    $data = $response['data']['data'];
                    $data['senderName'] = Auth::user()->username;
                    $data['walletCodeSender'] = $wallet->wallet_code;
                    $data['receiverName'] = 'service Provider';
                    $data['beneficiaryAccount'] = $bank_account;
                    $data['amount'] = $request->amount;
                    $data['narration'] = $request->narration;

                    //end of data prep

                    //logic to persist transaction details
                    $transaction = new PhonetopupTransaction;
                    $transaction->wallet_id = $wallet->id;
                    $transaction->amount = $request->amount;
                    $transaction->uuid =  Auth::user()->id;
                    $transaction->account_name = 'Service Provider';
                    $transaction->bank_id = $bank->id;
                    $transaction->status = true;
                    $transaction->account_number = $bank_account;
                    $transaction->narration = $request->narration;
                    $transaction->save();
                    //end of logic for saving transactions
                    
                    //fire off an sms notification
                    $this->sendPhoneTopupTransactionNotifications($transaction);

                     event(new FundWallet($topup));
                    // Session::flash('success',"Transaction was successful");
                    return redirect('success')->with('status',$data);
                } else {
                    Session::flash('error',$response['message']);
                    return back();
                }
        }
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
    public function topuphonemultiple(Request $request){
        $datas = $request->all();
      //  $datas =  json_encode($datas);
        foreach($datas as $id => $amount){
           if($id =="_token"){continue;}
           $contact = TopupContact::find($id);
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
            
                    $user_id = Auth::user()->id;
            
                    $topuphistory = new TopupHistory;
            
                    $topuphistory->contact_id = $contact->id;
                    $topuphistory->user_id = $user_id;
                    $topuphistory->amount = $amount;
                  
                    $topuphistory->ref = str_random(10);
                    //$topuphistory->txn_response = $response;
                    $topuphistory->txn_response = 00;
                    $topuphistory->status = 'Success';
            
                 //   $topuphistory->save();
            
                    //Session::flash('success',' Phone topped up uccessfully.');
                    
        }
        redirect('/phonetopup')->with('success', 'Phone topped up uccessfully.');
       // dd($input);
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

        $user_id = Auth::user()->id;

        $topuphistory = new TopupHistory;

        $topuphistory->contact_id = $contact->id;
        $topuphistory->user_id = $user_id;
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

    public function topdatasubmit(Request $request)
    {
        $phone = $request->phone;
        $network = $request->netw;
        $amount = $request->amount;

        $txn_ref = str_random(10);

        $return_url = 'https://finance.hotels.ng/phonetopup';


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

        $url = 'https://mobilenig.com/api/data.php/?username=' .
            'jekayode&password=transfer' .
            '&network='. $contact->netw .'&phoneNumber='. $contact->phone .'&amount='. $amount.'&ref='. $txn_ref .'&return_url='. $return_url;
        
        $headers = array('content-type' => 'application/json');
        $response = \Unirest\Request::get($url, $headers);
        //dd($response);
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

        $user_id = Auth::user()->id;

        $topuphistory = new TopupHistory;

        $topuphistory->contact_id = $contact->id;
        $topuphistory->user_id = $user_id;
        $topuphistory->amount = $amount;
        //$topuphistory->type = $request->type;
        $topuphistory->ref = str_random(10);
        //$topuphistory->txn_response = $response;
        $topuphistory->txn_response = 00;
        $topuphistory->status = 'Success';

        $topuphistory->save();

        //Session::flash('success',' Phone topped up uccessfully.');
        return redirect('/phonetopup')->with('success', 'Data topped up uccessfully.');

    }



}
