@extends('layouts.user')

@section('title')
      Transfer to Bank
@endsection
@section('content')

<link rel="stylesheet" href="/css/form.css">

            <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                  <img src="/svg/naira.svg" alt="no preview" class="transfer-icon">
                  <h4 class="intro text-center">Transfer To Beneficiary </h4>
                  <form class="input-form" action="" method="POST">
                  {{csrf_field()}}

                    <div class="form-group">
                      <label>Beneficiary</label>
                        <select class="form-control cus-input" name="beneficiary_id">
                          <option>Select Beneficiary</option>
                            @foreach($wallet->beneficiary as $key => $beneficiaries)
                              <option value="{{$beneficiaries->id}}">{{$beneficiaries->name}}</option>
                            @endforeach
                        </select>
                    </div>
                      
                 
                          <div class="form-group">
                              <input type="number" class="form-control cus-input" name="amount" id="amount" placeholder="Amount">
                          </div>

                            <div class="form-group">
                              <select class="form-control cus-input" name="wallet_id" id="wallet_id">
                                  <option value="{{ $wallet->id }}">{{ $wallet->wallet_name }}</option>
                                
                              </select>
                            </div>

                            <div class="form-group">
                              <input type="text" class="form-control cus-input" name="narration" id="narration" placeholder="Narration">
                            </div>
                            
                        <div class="form-group center-block">    
                          <button id="" type="submit" class="btn btn-primary center-block">Transfer</button>
                        </div>


                  </form>
            </div>

  @endsection
