@extends('layouts.user')

@section('title')
      Fund Wallet
@endsection
@section('content')

<link rel="stylesheet" href="/css/form.css">

      <div class="col-md-6 col-sm-6">

         <h4 class="intro text-left">Funding {{$wallet->wallet_name}} Wallet with Rave</h4>

        <form action="/admin/{{$wallet->wallet_code}}/fund" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
            <input type="hidden" name="method" value="Manual Funding">
            <input type="hidden" name="status" value="Completed">

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
                <button class="btn btn-primary pull-right" id="submit" type="button">Pay Now</button>
              </div>
      </form>

  </div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="http://flw-pms-dev.eu-west-1.elasticbeanstalk.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
<script type="text/javascript">
    
    document.addEventListener("DOMContentLoaded", function(event) {
      document.getElementById("submit").addEventListener("click", function(e) {
        var email = document.getElementById('email').value;
        var hashedValue = ""; // this is a variable to hold the hashed value
        var txRef = "MO-" + Date.now(); // this is variable to hold the unique transaction reference
        $.ajax({
          url: "/integrity/"+txRef+"/"+email, // this is an endpoint that sends the hashed values and transaction reference to the client.
          headers: { contentType: "application/json" },
          dataType: "json",
          type: "GET",
          cache: false,
          success: function(response) {
            console.log(response);
            hashedValue = response.hash;
            txRef = response.txref;
          },
          error: function(err) {
            console.log(err);
          }
        });
        var PBFKey = "FLWPUBK-47d14cd9504c1b0c54b439e1be251fcf-X";
        var amount = document.getElementById('amount').value;
    
        // getpaidSetup is Rave's inline script function. it holds the payment data to pass to Rave.
        getpaidSetup({
          PBFPubKey: PBFKey,
          customer_email: email,
          customer_firstname: "Mofope",
          customer_lastname: "Ojosh",
          amount: amount,
          customer_phone: "2348116631381",
          country: "NG",
          currency: "NGN",
          txref: txRef, // Pass your UNIQUE TRANSACTION REFERENCE HERE.
          integrity_hash: hashedValue, // pass the sha256 hashed value here.
          onclose: function() {},
          callback: function(response) {
             flw_ref = response.tx.flwRef;// collect flwRef returned and pass to a                  server page to complete status check.
          console.log("This is the response returned after a charge", response);
          if(response.tx.chargeResponse =='00' || response.tx.chargeResponse == '0') {
            console.log("This is the response returned after a charge", response);
            //window.location = "http://transfer.hng.fun/ravepaysuccess/"+flw_ref+"/"+amount+"/NGN"; 
            // redirect to a success page
          } else {
            console.log(response);
            //window.location = "http://transfer.hng.fun/failed/"+response+; 
            // redirect to a failure page.
          }
          }
        });
      });
    });

</script>

@endsection