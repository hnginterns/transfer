<?php

namespace App\Http\Controllers;
use Unirest;

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
    
    public function index(){
            return view('ravepay');
    }
    
   public function success($ref, $amount, $currency){
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
            return redirect('/success');
        } 
        else {
            //Dont Give Value and return to Failure page
            $report = "An Error Occured, you can try again";
            return redirect('/failure', compact('report'));
        }
    }
    }
    public function checkSum($txRef, $email){
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
        foreach($payload as $key => $value){
            $hashedPayload .= $value;
        }

        $hashString = $hashedPayload."FLWSECK-042b8afb8631685137d03d0d24fe13c9-X";
        $hash = hash('sha256', $hashString);

        return json_encode($hash);
    }
}
