@extends('layouts.user')

@section('title')
      Transfer to Bank
@endsection
@section('content')

<link rel="stylesheet" href="/css/form.css">

            <div class="col-md-6 col-sm-6">
                  <div class="center-block">
                      <svg class="center-block" width="200" height="106" viewBox="0 0 270 176" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                      <title>bank_finance_cash_dollar_purchase_money_transfer_buy_v2_euro_euro2pean-512 2</title>
                      <desc></desc>
                      <g id="Canvas" transform="translate(-34176 3631)">
                      <g id="bank_finance_cash_dollar_purchase_money_transfer_buy_v2_euro_euro2pean-512 2">
                      <use xlink:href="#path0_fill" fill="url(#pattern0)" transform="translate(34176 -3631)"/>
                      </g>
                      </g>
                      <defs>
                      <pattern id="pattern0" patternUnits="objectBoundingBox" patternContentUnits="objectBoundingBox" width="1" height="1">
                      <use xlink:href="#image0" transform="matrix(0.00195312 0 0 0.00301205 0 0)"/>
                      </pattern>
                      <path id="path0_fill" d="M 0 0L 270 0L 270 175.078L 0 175.078L 0 0Z"/>
                      <image id="image0" width="512" height="332" preserveAspectRatio="none" xlink:href="data:image/png;base64,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"/>
                      </defs>
                      </svg>

                  </div>
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
                          <button id="" type="submit" class="btn btn-primary pull-right">Transfer</button>
                        </div>


                  </form>
            </div>

  @endsection
