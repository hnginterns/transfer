<?php

namespace App\Http\Controllers;
use Unirest;
use App\Bank;

class BanksController extends Controller
{
      public function banks()
    {

        Unirest\Request::verifyPeer(false);
        $headers = array('content-type' => 'application/json');
        $response = Unirest\Request::post('https://moneywave.herokuapp.com/banks', $headers);
        $data = json_decode($response->raw_body, TRUE);
        $banks = $data['data'];
        return $banks;
        // return view('banks', compact('banks'));
    }

    public function populateBanks(){
        $lists = $this->banks();
        if(count($lists) != 0){
            foreach($lists as $key=> $value){
            $bank = new Bank;
            $bank->bank_code = $key;
            $bank->bank_name = $value;
            $bank->save();
            }
        }else{
            dd("error");
        }
        
    }
}
