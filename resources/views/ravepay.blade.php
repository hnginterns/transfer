@extends('layouts.user')

@section('title')
      Fund Wallet
@endsection
@section('content')

<link rel="stylesheet" href="/css/form.css">

      <div class="col-md-6 col-sm-6">
        <form  class="input-form" >
        <div class="">
              <svg class="pull-left" width="100" height="100" viewBox="0 0 194 194" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
              <title>Bank_Icon 2</title>
              <desc>Created using Figma</desc>
              <g id="Canvas" transform="translate(-11743 -8641)">
              <g id="Bank_Icon 2">
              <use xlink:href="#path0_fill" fill="url(#pattern0)" transform="translate(11743 8641)"/>
              </g>
              </g>
              <defs>
              <pattern id="pattern0" patternUnits="objectBoundingBox" patternContentUnits="objectBoundingBox" width="1" height="1">
              <use xlink:href="#image0" transform="matrix(0.00239808 0 0 0.00239808 0 0)"/>
              </pattern>
              <path id="path0_fill" d="M 0 0L 194 0L 194 194L 0 194L 0 0Z"/>
              <image id="image0" width="417" height="417" preserveAspectRatio="none" xlink:href="data:image/png;base64,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"/>
              </defs>
              </svg>
        </div>
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

              <div class="form-group"> 
                <label for="">Amount</label>
                <input type="text" name="amount" id="amount" class="form-control" placeholder="Please Enter Amount to fund"  >
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