<?php

namespace App\Http\Controllers\Admin;

use Auth;
use Validator;
use Session;
use Response;
use URL;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Beneficiary;
use Illuminate\Support\Facades\Hash;

class BeneficiaryController extends Controller
{


    public function __construct(){
        $this->middleware('cache');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Beneficiary::withTrashed()->get()->toArray();

        //dd($users);
        $name = Auth::user()->username;
        return view('users.index', compact('users'))->with("name", $name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = Auth::user()->username;
        return view('users.create')->with("name", $name);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'username' => 'bail|required',
            'first_name' => 'bail|required',
            'last_name' => 'bail|required',
            'email' => 'bail|email|required',
            'account_number' => 'bail|required|numeric',
            'password' => 'bail|required',
            'confirmpassword' => 'bail|required'
            ],
            [
                'required' => ':attribute is required',
                'numeric' => 'account number must be in numbers'
            ]
        );
        if ($validator->fails()) 
        {
            $messages = $validator->messages()->toArray();
            
            Session::flash('messages', $this->formatMessages($messages, 'error'));
            return redirect()->to(URL::previous())->withInput();
        }
        else
        {
            if($input['password'] !== $input['confirmpassword']){
                Session::flash('messages', $this->formatMessages("Please confirm password", 'error'));
                return redirect()->to(URL::previous())->withInput();
            }

            $password = $request->get('password'); // password is form field
            $hashedpassword = Hash::make($password);

            $dt = Carbon::now();
            $dateNow = $dt->toDateTimeString();

            User::insert([
              'username' => $request->get('username'),
              'first_name' => $request->get('first_name'),
              'last_name' => $request->get('last_name'),
              'email' => $request->get('email'),
              'password' => $hashedpassword,
              'is_admin' => 0,
              'bank_id' => "24",
              "account_number" => $input['account_number'],
              "created_by" => Auth::user()->id,
              "address" => "none",
              "role_id" => 0,
              "updated_by" => 0,
              "created_at" => $dateNow
            ]);
            return redirect()->to('/admin/users');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $name = Auth::user()->username;
        return view('users.edit', compact('user','id'))->with("name", $name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'username' => 'bail|required',
            'email' => 'bail|email|required',
            'first_name' => 'bail|required',
            'last_name' => 'bail|required',
            'account_number' => 'bail|required|numeric'
            ],
            [
                'required' => ':attribute is required',
                'numeric' => 'account number must be in numbers'
            ]
        );
        if ($validator->fails()) 
        {
            $messages = $validator->messages()->toArray();
            
            Session::flash('messages', $this->formatMessages($messages, 'error'));
            return redirect()->to(URL::previous())->withInput();
        }
        else
        {
            $user = User::find($id);
            $user->username = $input['username'];
            $user->email = $input['email'];
            $user->first_name = $input['first_name'];
            $user->last_name = $input['last_name'];

            $user->account_number = $input['account_number'];
            $user->save();
            $name = Auth::user()->username;
            return redirect('/admin/users')->with("name", $name);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        $name = Auth::user()->username;
        return redirect('/admin/users')->with("name", $name);
    }


    public function banUser(Request $request, $id){

        $dt = Carbon::now();
        $dateNow = $dt->toDateTimeString();

        $user = User::where('id', $id)->update(["deleted_at" => $dateNow]);
        
        return back();

    }

    public function unbanUser(Request $request, $id){

        $user = User::withTrashed()->where('id', $id);
        $user->restore();

        return back();

    }

    public function makeAdmin(Request $request, $id){

        $user = User::where('id', $id)->update(["is_admin" => 1]);

        return back();

    }

    public function removeAdmin(Request $request, $id){

        $user = User::where('id', $id)->update(["is_admin" => 0]);

        return back();

    }

}
