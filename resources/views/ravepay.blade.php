@extends('layouts.user')

@section('title')
      Fund Wallet
@endsection
@section('content')

<link rel="stylesheet" href="/css/form.css">

      <div class="col-md-6 col-sm-6">
<<<<<<< HEAD
        <form  class="input-form" >
        
              <h4 class="intro text-left">Fund Wallet with Rave</h4>
              <input type="hidden" name="wallet_id" value="{{$wallet->id}}">
              <div class="form-group">  
                <label for="">Email address</label>
                <input type="text" name="email" id="email" class="form-control" value="{{$user->email}}" >
              </div>
 
              <div class="form-group"> 
                <label for="">Wallet</label>
                <input type="text" name="wallet" id="wallet" class="form-control" value="{{$wallet->wallet_name}}"  >
              </div>
=======

         <h4 class="intro text-left">Funding {{$wallet->wallet_name}} Wallet with Rave</h4>

        <form action="/wallet/{{$wallet->wallet_code}}/fund" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
            <input type="hidden" name="method" value="Manual Funding">
            <input type="hidden" name="status" value="Completed">
>>>>>>> a9e1e76b942741aa3490fa78867df4a436a16408

            <input type="hidden" name="fname" value="{{$user->first_name}}">
            <input type="hidden" name="lname" value="{{$user->last_name}}">
            <input type="hidden" name="emailaddr" value="{{$user->email}}">
            <input type="hidden" name="phone" value="+23470370383333">

          <div class="form-group"> 
                <label for="">Amount</label>
                <input type="text" name="amount" id="amount" class="form-control input-lg" placeholder="Please Enter Amount to fund"  >
              </div>

            <div class="form-group">
                        <label class="control-label col-sm-2" >Card Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="card_no" id="card_no" class="form-control" v>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >CVV</label>
                        <div class="col-sm-10">
                            <input type="text" name="cvv" id="cvv" class="form-control" v>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Expiry Month</label>
                        <div class="col-sm-10">
                            <input type="text" name="expiry_month" id="expiry_month" class="form-control" v>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Expiry Year</label>
                        <div class="col-sm-10">
                            <input type="text" name="expiry_year" id="expiry_year" class="form-control" v>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Pin</label>
                        <div class="col-sm-10">
                            <input type="text" name="pin" id="pin" class="form-control" v>

                        </div>
                    </div>
              
              <div class="form-group">
                <input type="submit" class="btn btn-primary pull-right" value="Fund Wallet" />
              </div>
      </form>

  </div>
 
@if (session('status'))
   <script type="text/javascript">
        $(document).ready(function() {
            $('#myModal').modal();
        });
    </script>

    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Otp</h4>
          </div>
          <div class="modal-body">
            <p>{{session('status')}}</p>
            <div class="row">
            <div class="col-md-6 col-md-offset-2">
              <form action="/admin/otp" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="ref" value="{{$cardWallet->ref}}">
                <div class="form-group">
                    <input type="password" class="form-control" name="otp" placeholder="Enter OTP">
                </div>
                <button type="submit" class="btn btn-default btn-block">Submit</button>
              </form>
            </div>
          </div>
      </div>
      
    </div>
  </div>

</div>
@endif

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>