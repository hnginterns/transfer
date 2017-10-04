@extends('layouts.user')

@section('title')
      Transfer to Clearing Wallet
@endsection
@section('content')

<link rel="stylesheet" href="/css/form.css">

            <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                  <img src="/svg/naira.svg" alt="no preview" class="transfer-icon">
                  <h4 class="intro text-center">Transfer To Main Wallet (Clearing Account) </h4>
                  <form class="input-form" action="/transferAccount" method="POST">
                  {{csrf_field()}}

                    <div class="form-group">
                      
                    </div>
                      
                 
                          <div class="form-group">
                          </div>

                            <div class="form-group">
                              
                            </div>
                            
                        <div class="form-group center-block">    
                          <button id="" type="submit" class="btn btn-primary center-block">Transfer</button>
                        </div>


                  </form>
            </div>
    
  @endsection
