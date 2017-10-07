@extends('layouts.admin')

@section('added_css')
<style type="text/css">
  .units {
  background:#222d32;
  color: #fff;
  margin:1%;
  padding:2%;

  } 
</style>
@endsection

@section('content')

<div class="container top-up" style="padding-left:30px;">

  <div class="row">
    <h3>Balance: 1200</h3>
    <a class="flwpug_getpaid " data-PBFPubKey="FLWPUBK-5bfc6d310982b2de8fbf0c98843a8a63-X" data-txref="rave-checkout-1506688603" data-amount="" data-customer_email="user@example.com" data-currency = "NGN" data-pay_button_text = "Top Up" data-country="NG" data-custom_title = "SmS Wallet" data-custom_description = "" data-redirect_url = "" data-custom_logo = "" data-payment_method = "card" data-exclude_banks="">Top Up</a>

  </div>

</div>
<section class="content">

      <div class="row">

          @foreach ($smswalletdetails as $smswalletdetail)

          <div class="col-md-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
              <div class="inner">
                <h3>SMS Wallet</h3>
                <p>{{ $smswalletdetail['username'] }}</p>
                <p>Balance: {{ $smswalletdetail['balance'] }}</p>
              </div>
              <div class="icon">
                <i class="fa fa-envelope"></i>
              </div>
              <a href="#topup{{ $smswalletdetail['id'] }}" data-toggle="modal" data-target="#topup{{ $smswalletdetail['id'] }}"
              <a href="" data-toggle="" class="small-box-footer">Top up <i class="fa fa-arrow-circle-right"></i></a>

            </div>
          </div>
          @include('layouts.modal')



          @endforeach

<!-- REQUIRED JS SCRIPTS -->

</section>


       <!--Rave Pay integration-->
       <script type="text/javascript" src="http://flw-pms-dev.eu-west-1.elasticbeanstalk.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
  <script>
     document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("topup").addEventListener("click", function(e) {
      var PBFKey = "FLWPUBK-aa82cac8ee08f5bb206f937db274081a-X";
       var myAmount =document.getElementById("amountToPay").value;

      getpaidSetup({
        PBFPubKey: PBFKey,
        customer_email: "user@example.com",
        customer_firstname: "Temi",
        customer_lastname: "Adelewa",
        custom_description: "Pay Internet",
        custom_logo: "http://localhost/communique-3/skin/frontend/ultimo/communique/custom/images/logo.svg",
        custom_title: "Communique Global System",
        amount: myAmount,
        customer_phone: "234099940409",
        country: "NG",
        currency: "NGN",
        txref: "rave-123456",
        integrity_hash: "6800d2dcbb7a91f5f9556e1b5820096d3d74ed4560343fc89b03a42701da4f30",
        onclose: function() {},
        callback: function(response) {
          var flw_ref = response.tx.flwRef; // collect flwRef returned and pass to a          server page to complete status check.
          console.log("This is the response returned after a charge", response);
          if (
            response.tx.chargeResponse == "00" ||
            response.tx.chargeResponse == "0"
          ) {
            // redirect to a success page
          } else {
            // redirect to a failure page.
          }
        }
      });
    });
  });
  </script>
  <script type="text/javascript">

   var unirest = require('unirest');

  unirest.post('https://moneywave.herokuapp.com/v1/merchant/verify')
  .headers({'Content-Type': 'application/json'})
  .send({ "apiKey": "ts_SNSO23Y07CSXI9P4J21X", "secret": "ts_TIKO82S52NVFBHOPNM4P8YCPHNHDEB" })
  .end(function (response) {
    console.log(response.body);
  });

  </script>
  <script type="text/javascript" src="http://flw-pms-dev.eu-west-1.elasticbeanstalk.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>


@endsection