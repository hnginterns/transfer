<?php
namespace App\Http\Controllers\Admin;
use Auth;
use URL;
use App\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RestrictionController as Restrict;
use App\User;
use App\Wallet;
use App\SmsWalletFund;
use App\CardWallet;
use App\Restriction;
use App\Rule;
use App\Bank;
use App\Beneficiary;
use App\Transaction;
use App\PhonetopupTransaction;
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
        $input = $request->all();
        
        $validator = Validator::make($input, 
            [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'phone' => 'required|numeric',
            'network' => 'required',
            'max_tops' => 'required'

            ],
                                     [
            'first_name.required' => 'First name is required',
            'last_name.required' => 'Last name is required',
            'phone.required' => 'Phone Number is required',
            'phone.numeric' => 'Phone Number must be in numbers',
            'network.required' => 'Please select a network',
            'max_tops.required' => 'Please enter Maximum Number of topups per week',
            ]
         ); 
        
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            return redirect()->to(URL::previous())->with('failed', $messages);
        } else {
            
            $phone = new TopupContact();
            $phone->firstName = $input['first_name'];
            $phone->lastName = $input['last_name'];
            $phone->phoneNumber = $input['phone'];
            $phone->phoneNumber = $input['title'];
            $phone->phoneNumber = $input['department'];
            $phone->phoneNumber = $input['email'];
            $phone->amount = 0;
            $phone->ref = $input['network'];
            $phone->max_tops = $input['max_tops'];

            $phone->save();
            
            return redirect()->to('admin/phonetopup');
        }
    }

    //get token for new transaction
    public function getToken()
    {
        $api_key = env('API_KEY');
        $secret_key = env('API_SECRET');
        \Unirest\Request::verifyPeer(false);
        $headers = array('content-type' => 'application/json');
        $query = array('apiKey' => $api_key, 'secret' => $secret_key);
        $body = \Unirest\Request\Body::json($query);
        $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/merchant/verify', $headers, $body);
        $response = json_decode($response->raw_body, true);
        $status = $response['status'];
        if (!$status == 'success') {
            echo 'INVALID TOKEN';
        } else {
            $token = $response['token'];
            return $token;
        }
    }


     //transfer from wallet to bank
    public function postTopup(Request $request)
    {
        
        $validator = $this->validateRequest($request->all());
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            Session::flash('error', $this->formatMessages($messages, 'error'));
            return back();
        } else {
                $token = $this->getToken();
                
                $headers = array('content-type' => 'application/json', 'Authorization' => $token);
                $wallet = Wallet::find($request->wallet_id);
                $bank = Bank::find($request->bank_id);
                $query = array(
                    "lock" => $wallet->lock_code,
                    "amount" => $request->amount,
                    "bankcode" => $bank->bank_code,
                    "accountNumber" => $request->account_number,
                    "currency" => "NGN",
                    "senderName" => Auth::user()->username,
                    "narration" => $request->narration, //Optional
                    "ref" => $request->reference, // No Refrence from request
                    "walletUref" => $wallet->wallet_code
                );

                //checks for permissions
                $permit = Restriction::where('wallet_id', $wallet->id)
                        ->where('uuid', Auth::user()->id)
                        ->first();
                
                if($permit == null){
                    Session::flash('error', 'You cannot make this transfer');
                    return redirect('/admin');

                }
                     $restrict = new Restrict($permit, $request);
                     $errors = $restrict->transferToBank();
                     $prepare = "";
                if(count($errors) != 0){
                    foreach($errors as $key => $error){
                        $prepare.="<p>$error</p>";
                    }
                     return back()->with('error', $prepare);
                }
                //end of permission checks

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
                    $data['receiverName'] = $request->account_name;
                    $data['beneficiaryAccount'] = $request->account_number;
                    $data['amount'] = $request->amount;
                    $data['narration'] = $request->narration;
                    //end of data prep

                    //logic to persist transaction details
                    $transaction = new PhonetopupTransaction;
                    $transaction->wallet_id = $wallet->id;
                    $transaction->amount = $request->amount;
                    $transaction->uuid =  Auth::user()->id;
                    $transaction->account_name = $request->account_name;
                    $transaction->bank_id = $request->bank_id;
                    $transaction->status = true;
                    $transaction->account_number = $request->account_number;
                    $transaction->save();
                    //end of logic for saving transactions
                    //fire off an sms notification
                    // $this->sendBankTransactionNotifications($transaction);

                    // event(new TransferToBank($bank));
                    // $transactions = BankTransaction::latest()->first();
                    Session::flash('success',"Transaction was successful");
                    return redirect('admin/phonetopup');
                } else {
                    Session::flash('error',$response['message']);
                    return back();
                }
        }
    }

    protected function validateRequest(array $data)
    {
        return Validator::make($data, [
            'account_name' => 'required|string|max:255',
            'wallet_id' => 'required|numeric',
            'bank_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'account_number' => 'required|string|max:10',
        ]);
    }
}

    
