<?php
namespace App\Http\Controllers\Admin;
use Auth;
use URL;
use App\WalletTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use App\User;
use App\Wallet;
use App\SmsWalletFund;
use App\CardWallet;
use App\Restriction;
use App\Rule;
use DB;
use App\Beneficiary;
use App\Transaction;
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
        
        $validator = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric|unique',
            'network' => 'required'
            ],
            [
                'first_name.required' => 'First Name is required',
                'last_name.required' => 'Last Name is required',
                'phone.required' => 'Phone Number is required',
                'phone.numeric' => 'Phone Number must be in numbers',
                'network.required' => 'Please select a network'
            ]
         );
        
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            return redirect()->to(URL::previous())->with('failed', $messages);
        } else {
            $phone = new SmsWalletFund();
            $phone->firstName = $input['first_name'];
            $phone->lastName = $input['first_name'];
            $phone->phone = $input['phone'];
            $phone->amount = 0;
            $phone->ref = $input['network'];
            
            return redirect()->to(URL::previous())->with('success', "Phone number added successfully");
        }
    }
}

    
