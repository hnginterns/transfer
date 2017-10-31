<?php

namespace App\Http\Controllers;

use Unirest;
use App\Bank;

class BanksController extends Controller
{
    public static function banks()
    {
        Unirest\Request::verifyPeer(false);
        $headers = array('content-type' => 'application/json');
        $response = Unirest\Request::post(env('API_KEY_LIVE_URL').'/banks', $headers);
        $data = json_decode($response->raw_body, true);
        $banks = $data['data'];
        // dd($banks);
        return $banks;
        // return view('banks', compact('banks'));
    }

    public function populateBanks()
    {
        $lists = $this->banks();
        if (count($lists) != 0) {
            foreach ($lists as $key=> $value) {
                $bank = new Bank;
                $bank->bank_code = '058';
                $bank->bank_name = $value;
                $bank->save();
            }
        } else {
            dd("error");
        }
        $banks = $lists;
        return view('banks', compact('banks'));
    }

    public static function getAllBanks()
    {
        $banks = Bank::orderBy('bank_name', 'asc')->get();

        return $banks;
    }
}
