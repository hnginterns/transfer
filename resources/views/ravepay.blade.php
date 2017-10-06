<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RavePay Integration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
  <div class="container" id="ravepay">
    <row>
      <div class="col-md-6 col-md-offset-4">
        <form>
          <input type="hidden" name="wallet_id" value="{{$wallet->id}}">
          <div class="row">
            <div class="col-md-8">
                <br>
                <h1>Pay with Rave</h1>
                <br>
              <label for="">Email address</label>
              <input type="text" name="email" id="email" class="form-control border-input" value="user@example.com" placeholder="Enter email address" style="margin-bottom: 30px;">

              <label for="">Wallet</label>
              <input type="text" name="wallet" id="wallet" class="form-control border-input" value="{{$wallet->wallet_name}}"  style="margin-bottom: 30px;">

              <label for="">Amount</label>
              <input type="text" name="amount" id="amount" class="form-control border-input" placeholder="Please Enter Amount to fund"  style="margin-bottom: 30px;">
            </div>
          </div>

          <button class="btn btn-primary" id="submit" type="button">Pay Now</button>
          <div class="clearfix"></div>
      </div>
      </form>

  </div>
  </row>
  </div>
 
</body>
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
          type: "POST",
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
        var amount = 10;
    
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
            window.location = "http://hng.transfer.fun/ravepaysuccess/"+flw_ref+"/"+amount+"/NGN"; 
            // redirect to a success page
          } else {
            window.location = "http://transfer.hng.fun/failure"; 
            // redirect to a failure page.
          }
          }
        });
      });
    });
</script>
</html>
