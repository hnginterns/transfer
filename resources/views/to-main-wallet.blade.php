@extends('layouts.user')

@section('title')
      Transfer to Bank
@endsection
@section('content')

<link rel="stylesheet" href="/css/form.css">

            <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                  <img src="/svg/naira.svg" alt="no preview" class="transfer-icon">
                  <h4 class="intro text-center">Transfer To Beneficiary </h4>
                  <form class="input-form" action="/transferAccount" method="POST">
                  {{csrf_field()}}

                    <div class="form-group">
                      <label>Beneficiary</label>
                        <select class="form-control cus-input" name="beneficiary_id">
                          <option>Select Beneficiary</option>
                            @foreach($beneficiary as $key => $beneficiaries)
                              <option value="{{$beneficiaries->id}}">{{$beneficiaries->name}}</option>
                            @endforeach
                        </select>
                    </div>
                      
                 
                          <div class="form-group">
                              <input type="number" class="form-control cus-input" name="amount" id="amount" placeholder="Amount">
                          </div>

                            <div class="form-group">
                              <select class="form-control cus-input" name="wallet_name" id="wallet_name">
                                <option value=""> Select Wallet</option>
                                @forelse($wallets as $wallet)
                                  <option value="{{ $wallet->wallet_name }}">{{ $wallet->wallet_name }}</option>
                                @empty
                                @endforelse
                              </select>
                            </div>
                            
                        <div class="form-group center-block">    
                          <button id="" type="submit" class="btn btn-primary center-block">Transfer</button>
                        </div>


                  </form>
            </div>
    
  @endsection
