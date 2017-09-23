<?php

namespace App\Http\Controllers;


class BanksController extends Controller
{


    public function banks()
    {


        //$headers = array('content-type' => 'application/json');
        //$response = \Unirest\Request::post('https://moneywave.herokuapp.com/banks', $headers);
        //$data = json_decode($response->raw_body, TRUE);
        //$banks = $data['data'];
        //, compact('banks')
        //@foreach($banks as $bankCode => $bankName)
        //{{$bankCode}}<br>
        //@endforeach
        //@foreach($banks as $bankCode => $bankName)
        //{{$bankName}}<br>
      //  @endforeach
        return view('banks');
    }
}
