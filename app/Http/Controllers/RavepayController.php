<?php

namespace App\Http\Controllers;

use Unirest;
use App\Restriction;
use Illuminate\Http\Request;
use App\Events\FundWallet;
use Auth;
use App\Http\Controllers\RestrictionController as Restrict;

use App\CardWallet;
use App\Wallet;

class RavepayController extends Controller
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


    public function index($id)
    {
        $user = Auth::user();

        $permit = Restriction::where('wallet_id', $id)
          ->where('uuid', $user->id)
          ->first();
        if($permit == null) return back()->with('error', 'You do not have the permission to fund wallet');;
            $restrict = new Restrict($permit);
        if(count($restrict->canFundWallet()) != 0) return back()->with('error', 'You do not have the permission to fund wallet');;

        $wallet = Wallet::where('id', $id)->first();

        $cardWallet = CardWallet::latest()->first();

        return view('ravepay', compact('permit', 'wallet', 'cardWallet', 'user'));
    }

    public function success($ref, $amount, $currency)
    {
        if (isset($ref)) {
            $query = array(
            "SECKEY" => "FLWPUBK-47d14cd9504c1b0c54b439e1be251fcf-X",
            "flw_ref" => $ref,
            "normalize" => "1"
        );

            $data_string = json_encode($query, true);

            $ch = curl_init('http://flw-pms-dev.eu-west-1.elasticbeanstalk.com/flwv3-pug/getpaidx/api/verify');
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

            $response = curl_exec($ch);

            $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $header = substr($response, 0, $header_size);
            $body = substr($response, $header_size);

            curl_close($ch);

            $resp = json_decode($response, true);

            $chargeResponse = $resp['data']['flwMeta']['charge$Response'];
            $chargeAmount = $resp['data']['amount'];
            $chargeCurrency = $resp['data']['transaction_currency'];

            if (($chargeResponse == "00" || $chargeResponse == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {
                //Give Value and return to Success page

                dd($chargeResponse);


                return redirect('/success');
            } else {
                //Dont Give Value and return to Failure page
                $report = "An Error Occured, you can try again";
                return redirect('/failed', compact('report'));
            }
        }
    }
    public function checkSum($txRef, $email)
    {
        $hashedPayload = '';
        $payload = array(
        'PBFPubKey' => 'FLWPUBK-47d14cd9504c1b0c54b439e1be251fcf-X',
        'customer_email' => $email,
        'customer_firstname' => 'Mofope',
        'customer_lastname' => 'josh',
        'amount' => 10,
        'customer_phone' => '2348116631381',
        'country' => 'NG',
        'currency' => 'NGN',
        "txref" => $txRef
        );

        ksort($payload, SORT_REGULAR);
        foreach ($payload as $key => $value) {
            $hashedPayload .= $value;
        }

        $hashString = $hashedPayload."FLWSECK-042b8afb8631685137d03d0d24fe13c9-X";
        $hash = hash('sha256', $hashString);

        return json_encode($hash);
    }

    public function cardWallet(Request $request, CardWallet $cardWallet)
    {
        $token = $this->getToken();
        $headers = array('content-type' => 'application/json', 'Authorization' => $token);
        $query = array(
            "firstname" => $request->fname,
            "lastname" => $request->lname,
            "email" => $request->emailaddr,
            "phonenumber" => $request->phone,
            "recipient" => "wallet",
            "recipient_id" => $request->wallet_code,
            "card_no" => $request->card_no,
            "cvv" => $request->cvv,
            "pin" => $request->pin, //optional required when using VERVE card
            "expiry_year" => $request->expiry_year,
            "expiry_month" => $request->expiry_month,
            "charge_auth" => "PIN", //optional required where card is a local Mastercard
            "apiKey" => env('APP_KEY'),
            "amount" => $request->amount,
            "fee" => 0,
            "medium" => "web",
            //"redirecturl" => "https://google.com"
        );
        $body = \Unirest\Request\Body::json($query);

        $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/transfer', $headers, $body);
        $response = json_decode($response->raw_body, TRUE);
        //var_dump($response);
        //die();
        if($response['status'] == 'success') {
            $response = $response['data']['transfer'];
            //$meta = $response['meta'];
            //$meta = json_decode($meta, TRUE);
            $transMsg = $response['flutterChargeResponseMessage'];
            $transRef = $response['flutterChargeReference'];
            
            $transaction = new CardWallet;
            $transaction->firstName = $response['firstName'];
            $transaction->lastName = $response['lastName'];
            $transaction->wallet_name = $request->wallet_name;
            $transaction->status = $response['status'];
            $transaction->phoneNumber = $response['phoneNumber'];
            $transaction->amount = $response['amountToSend'];
            $transaction->ref = $transRef;

            $transaction->save();

            return back()->with('status', $transMsg);

        }
        var_dump($response);
    }

    public function otp(Request $request, CardWallet $cardWallet)
    {

         \Unirest\Request::verifyPeer(false);

            $headers = array('content-type' => 'application/json');
            $query = array(
                'transactionRef'=>$request->ref,
                'otp' => $request->otp
            );
            $body = \Unirest\Request\Body::json($query);

            $response = \Unirest\Request::post('https://moneywave.herokuapp.com/v1/transfer/charge/auth/card', $headers, $body);
            $response = json_decode($response->raw_body, true);
            if($response['status'] == 'success') {
                event(new FundWallet($cardWallet));
                $response = $response['data']['flutterChargeResponseMessage'];
                //return redirect('dashboard')->with('status', $response);
                return redirect('dashboard')->with('status', $response);

            }
            
    }
}
