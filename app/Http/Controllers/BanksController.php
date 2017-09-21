<?php

namespace App\Http\Controllers;


class BanksController extends Controller
{

    
    public function banks()
    {
      

        \Unirest\Request::verifyPeer(false);
        

        $headers = array('content-type' => 'application/json', 'Authorization' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MTQwLCJuYW1lIjoic2F2YW5hIHNtYXJ0c2F2ZSIsImFjY291bnROdW1iZXIiOiIiLCJiYW5rQ29kZSI6Ijk5OSIsImlzQWN0aXZlIjp0cnVlLCJjcmVhdGVkQXQiOiIyMDE2LTEyLTA4VDEwOjM4OjE5LjAwMFoiLCJ1cGRhdGVkQXQiOiIyMDE3LTA2LTE0VDEzOjAxOjQ5LjAwMFoiLCJkZWxldGVkQXQiOm51bGwsImlhdCI6MTQ5ODMzNTE2NSwiZXhwIjoxNDk4MzQyMzY1fQ.WojvkYOC2j6XTUfg_E4WQkxQChPUyCgYUCIKaW83YXA');
        $response = \Unirest\Request::post('https://moneywave.herokuapp.com/banks', $headers);
        $data = json_decode($response->raw_body, TRUE);
        $banks = $data['data'];
        //die();
        
        return view('banks', compact('banks'));
    }
}
