<?php

namespace App\Http\Controllers\Admin;

use App\TopupContact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        
        $validator = Validator::make($input, 
            [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'phone' => 'required|numeric',
            'network' => 'required',
            'weekly_max' => 'required|numeric',
            'title' => 'required',
            'department' => 'required',
            'email' => 'required'

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
            
            $contact = new TopupContact();
            $contact->firstname = $input['firstname'];
            $contact->lastname = $input['lastname'];
            $contact->phone = $input['phone'];
            $contact->network = $input['network'];
            $contact->email = $input['email'];
            $contact->max_tops = $input['max_tops'];
            $contact->department = $input['department'];
            $contact->title = $input['title'];

            $contact->save();

            Session::flash('success', 'Contact Added successfully.');
            
            return redirect()->to('admin/phonetopup');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
