@extends('layouts.user')

@section('title')
      Transfer to Bank
@endsection
@section('content')

<link rel="stylesheet" href="/css/form.css">
            <div class="col-md-6 col-sm-6">
              @if (session('data'))
            <img src="https://ferpay.com/fpmedia/panel/svg/ewallet-transfer-bank.svg" width="300" height="300">
                 
                  <h4 class="intro text-center">Transfer To Beneficiary </h4>
                  <form class="input-form" action="" method="POST">
                  {{csrf_field()}}

                     <form class="input-form" action="/transfer/beneficiary/{{$wallet->id}}" method="POST">
                  {{csrf_field()}}
                  @foreach(Session::get('data') as $data)
                    <div class="form-group">
                        <input type="text" class="form-control cus-input" name="beneficiary_id" value="{{$data['beneficiary_id']}}">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control cus-input" name="beneficiary_name" value="{{$data['beneficiary_name']}}" readonly>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control cus-input" name="account_number" value="{{$data['account_number']}}" readonly>
                    </div>
                          
                          <div class="form-group">
                              <input type="number" class="form-control cus-input" name="amount" id="amount" placeholder="Amount">
                          </div>

                            <div class="form-group">
                              <input type="hidden" class="form-control cus-input" name="wallet_id" value="{{$wallet->id}}">
                            </div>

                            <div class="form-group">
                              <input type="hidden" class="form-control cus-input" name="wallet_name" value="{{$wallet->wallet_name}}">
                            </div>

                            <div class="form-group">
                              <input type="text" class="form-control cus-input" name="narration" id="narration" placeholder="Narration">
                            </div>
                            @endforeach
                            <div class="form-group center-block">    
                          <button id="" type="submit" class="btn btn-primary pull-right">Transfer</button>
                        </div>

                  </form>
            </div>
            @else
            <p>Please Validate Transfer</p>
            @endif

  @endsection
