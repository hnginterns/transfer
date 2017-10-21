@extends('layouts.admin')

@section('added_css')
    <style type="text/css">
        .modal-loading{display:none;position:fixed;z-index:10005;top:0;left:0;height:100%;width:100%;background: rgba( 255, 255, 255, .5 ) url('{{ asset("/img/ajax-loader.gif") }}') 50% 50% no-repeat;}
        /* When the body has the loading class, we turn
        the scrollbar off with overflow:hidden */
        body.loading{overflow:hidden;}
        /* Anytime the body has the loading class, our
        modal element will be visible */
        body.loading .modal-loading{display: block;}
	.units {
          background:#222d32;
          color: #fff;
          margin:1%;
          padding:2%;}
	 #balRefre img {width:100% }
     #walletTopUp .modal-header {
       background-color: #222d32;
       color: #fff;
     }
     #walletTopUp input, #walletTopUp select{
      border: 1px solid #cccccc;
      border-radius: 5px;
      height: 50px;
     }
     #walletTopUp #amount {
       border-radius: 0px;
     }
     #walletTopUp input:focus, #walletTopUp select:focus {
       background-color: #cccccc;
     } 
    </style>
@endsection

@section('content')
   <section class="col-md-12">
      <!-- Content Wrapper. Contains page content -->
      <div class="row">
        <div class="col-lg-6">
          <h1>
            SMS Wallet
            
          </h1>
        
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Sms wallet</li>
          </ol>
        </div>
        <div class="col-lg-3 col-lg-offset-3">
        <h2 id="balance">Balance: <span id="wallet-balance"></span></h2>
        <div>
	<div class="icon"id="balRefre" style="cursor:pointer">
				<i class="fa fa-refresh fa-2x" aria-hidden="true"></i>			
			</div>
        <div class="btn-group">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#walletTopUp">
          Fund Wallet
        </button>
	</div>
        </div>
        </div>
      </div><!--row ends-->
      <!---Modal for wallet top Up-->
    <div class="modal fade" id="walletTopUp">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center">Wallet Top Up</h4>
              </div>
              <div class="modal-body">
              <div class="box-header with-border">
                <h3 class="box-title">Card Details</h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form action="sms" method="POST" role="form form-horizontal">
                {{csrf_field()}}
                <!-- text input -->
               <div class="container-fluid">
                <fieldset>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="cc_name">First Name</label>
                                <div class="controls">
                                    <input name="fname" class="form-control" id="cc_name" title="First Name" required type="text">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="form-group">
                              <label for="cc_name">Last Name</label>
                              <div class="controls">
                                  <input name="lname" class="form-control" id="cc_name"  title="last name" required type="text">
                              </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <div class="controls">
                              <input name="phone" class="form-control" autocomplete="off" maxlength="20"  required="" type="text">

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <div class="controls">
                              <input name="emailaddr" class="form-control" autocomplete="off" required="" type="text">

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Card Number</label>
                        <div class="controls">
                              <input name="card_no" class="form-control" autocomplete="off" maxlength="20"  required="" type="text">

                        </div>
                    </div>
                    <div class="form-group">
                        <label>Card Expiry Date</label>
                        <div class="controls">
                            <div class="row">
                                <div class="col-md-9">
                                    <select class="form-control" name="expiry_month">
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" name="expiry_year">
				    @for ($i = 2017;$i <2040;$i++)
                                        <option>{{$i}}</option>
                                     @endfor  
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">
                               <label>Card CVV</label>
                                <div class="controls">
                                    <input class="form-control" autocomplete="off" maxlength="3" pattern="\d{3}" title="Three digits at back of your card" required="" type="text" name="cvv">
                                </div>
                         </div>

                         <div class="col-md-3">
                               <label>Pin</label>
                                <div class="controls">
                                    <input class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="pin" required="" type="text" name="pin">
                                </div>
                         </div>
			
                          <div class="col-md-6">
                                  <label>Amount</label>
                                  <div class="input-group">
                                      <div class="input-group-addon">₦</div>
                                      <input name="amount" type="text" class="form-control" id="amount" placeholder="Amount">
                                    </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label></label>
                        <div class="controls">
                            <button type="submit" class="btn btn-primary">Top up</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </fieldset>
            </div>
              </form>
              </div>
              
            </div>
	       <!-- /.modal-OTP -->

            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </section>


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
              <form action="Otp" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="ref" value="{{$sms->ref}}">
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
    
    <!-- Main content -->
    <section class="content container" id="bulksms">
 
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#add-sms-Modal">ADD SMS ACCOUNT</button>
<!--modal for add sms account -->
        <div class="container">
    <!--Add sms Account  Modal -->
  <div class="modal fade" id="add-sms-Modal" role="dialog">
    <div class="modal-dialog">
    
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD SMS ACCOUNT</h4>
        </div>
        <div class="modal-body">
          <p>Please fill out your details</p>
          <form role="form" method="POST" action="/post" class="submit-add_sms_account">
                {{ csrf_field() }}
                <!-- text input -->
		<div class="form-group">
                  <div class="form-group">
                  <label>Username</label>
                  <input class="form-control email" name="username" type="email">
                </div>
                <div class="form-group">
                  <label>API Key</label>
                  <input class="form-control email" name="api_id" type="text">
                </div>
		<div class="form-group">
                  <label>Account Number</label>
                  <input class="form-control email" name="bank_account" type="text">
                </div>
              		 <div class="form-group">
				  <label> Bank Name</label>
				    <select name="currency_id" class="form-control input-defaulted">
				  		<option>Choose Bank</option>
					<option value="214">FIRST CITY MONUMENT BANK PLC</option>
                    			<option value="215">UNITY BANK PLC</option>
                    			<option value="221">STANBIC IBTC BANK PLC</option>
                    			<option value="232">STERLING BANK PLC</option>
					<option value="304">Stanbic Mobile</option>
                    			<option value="305">PAYCOM</option>
                    			<option value="307">Ecobank Mobile</option>
                    			<option value="309">FBN MOBILE</option>
					<option value="311">Parkway</option>
					<option value="315">GTBank Mobile Money</option>
					<option value="322">ZENITH Mobile</option>
					<option value="323">ACCESS MOBILE</option>
					<option value="401">Aso Savings and Loans</option>
					<option value="044">ACCESS BANK NIGERIA</option>
					<option value="014">AFRIBANK NIGERIA PLC</option>
					<option value="063">DIAMOND BANK PLC</option>
					<option value="050">ECOBANK NIGERIA PLC</option>
					<option value="084">ENTERPRISE BANK LIMITED</option>
					<option value="070">FIDELITY BANK PLC</option>
					<option value="011">FIRST BANK PLC</option>
					<option value="058">GTBANK PLC</option>
					<option value="030">HERITAGE BANK</option>
					<option value="082">KEYSTONE BANK PLC</option>
					<option value="076">SKYE BANK PLC</option>
					<option value="068">STANDARD CHARTERED BANK NIGERIA LIMITED</option>
					<option value="032">UNION BANK OF NIGERIA PLC</option>
					<option value="033">UNITED BANK FOR AFRICA PLC</option>
					<option value="035">WEMA BANK PLC</option>
					<option value="057">ZENITH BANK PLC</option>
					
                </select>
                
                </div>
					
                </div>
				
				
                <input type="submit" class="btn btn-block btn-success btn-top-up" name="" value="ADD SMS ACCOUNT">
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
<!-- /.modal -->
       
        <hr />
        <div class="row">

          @foreach ($smswalletdetails as $smswalletdetail)

            <div class="col-md-3 col-xs-12 units">
                <!-- small box -->
                <div class="small-box">
			<div class="inner unit">
			    <p>SMS Account</p>
			    <hr/>
			    <p>Account Name: <span class="username">{{ $smswalletdetail['username'] }}</span></p>
			    <p>Sms Unit: <span class="unit-balance">{{ number_format($smswalletdetail['balance'], 2) }}</span>
			    	@if($smswalletdetail['balance'] < 50 && $smswalletdetail['balance'] >10)
					<p class="text-warning">Balance is getting low</p>
				@elseif($smswalletdetail['balance'] < 10) 
					<p class="text-danger">Balance is low</p>
				@else 
					<p></p>
				@endif
			    </p>
			</div>
			
			<div class="icon">
			    <i class="fa fa-envelope"></i>
			</div>	
			<a href="#" class="btn-success btn pull-right" type="button"  data-toggle="modal" data-target="#top-up-modal">Top up <i class="fa fa-arrow-circle-right"></i></a>
			
                </div>
            </div>

          @endforeach
        </div>

    </section>
    <!---Modal for Jonesky-->
    <div class="modal fade" id="top-up-modal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">SMS Unit Top Up</h4>
              </div>
              <div class="modal-body">
              <div class="box-header with-border">
                <h3 class="box-title">EbulkSms Details</h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" class="submit-topup">
                {{ csrf_field() }}
                <!-- text input -->
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control email" name="email" type="email" readonly>
                </div>
                <div class="form-group">
                  <label>SMS Unit</label>
                  <input class="form-control app_id" name="app_id" type="text" readonly>
                </div>
                 <div class="form-group">
                  <label>Top-Up Amount</label>
                  <input class="form-control amount" type="text" name="amount">
                </div>
                <input type="button" class="btn btn-block btn-success btn-top-up" name="" value="Top-Up">
              </form>

              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->	
        
        
      
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- for showing a Loading Modal during AJAX Request -->
  <div class="modal-loading"><!-- Place at bottom of page --></div>

 

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
  </script>
@endsection

@section('added_js')
  <script src="{{ asset('js/modal-alert.js') }}"></script>
  <script type="text/javascript">

    // To show Loading GIF on ajax actions
    $body = $("body");

    $(document).on({
        ajaxStart: function() { $body.addClass("loading"); },
        ajaxStop: function() { $body.removeClass("loading"); }
    });

    function getToken(apikey,apisecret)
    {
      var xmlHttp = new XMLHttpRequest();
      xmlHttp.open( "POST", "https://moneywave.herokuapp.com/v1/merchant/verify", false ); // false for synchronous request
      xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xmlHttp.send('apiKey='+apikey+'&secret='+apisecret);//paramaters to send to the url 
      var jsonResponse = JSON.parse(xmlHttp.responseText);
      return jsonResponse['token'];
    }

    var csrf = "{{ csrf_token() }}";
    // var token = getToken("ts_SNSO23Y07CSXI9P4J21X","ts_TIKO82S52NVFBHOPNM4P8YCPHNHDEB");
    var token = getToken("ts_Q8PES8G6QJFI2RI1THN1","ts_AM2PIJ8VTPYLBK1K6EJDEXD9STLC6G");

    $(document).ready(function(){
        $('[data-toggle="popover"]').popover({
          show: true,
          delay: {
            "show" : 5000
          }
        });
    });

    $('#top-up-modal').on('show.bs.modal', function (e) {
      var btn = $(e.relatedTarget);
      $(this).find('input.email').val(btn.parents('div.units').find('span.username').html());
      $(this).find('input.app_id').val(btn.parents('div.units').find('span.unit-balance').html());
    });

    $('input.btn-top-up').click(function () {
      var current = $(this);
      var email = current.parents('div#top-up-modal').find('input.email').val();
      var amount = current.parents('div#top-up-modal').find('input.amount').val();
      var data_return = '';
      var data = function () {
        $.ajax({
          async: false,
          type: "post",
          url: '/admin/get-user-details',
          data: 'email=' + email + '&_token=' + csrf,
          success: function (res) {
            data_return = res;
          },
          error: function (res) {
            console.log(res);
          }
        });
        return data_return;
      }();
      var new_data = $.parseJSON(data);
      console.log(new_data);
      var params = {
        "lock":"abc12345",
        "amount":amount,
        "bankcode":new_data['bank_code'],
        "accountNumber":new_data['bank_account'],
        "currency":"NGN",
        "senderName":"TransferRule",
        "narration": 'Transfer for SMS Top-up', //Optional
        "ref":new_data['transaction_id']
      };
      $.ajax({
        type: "post",
        url: 'https://moneywave.herokuapp.com/v1/disburse',
        data: JSON.stringify(params),
        headers: {
          'Content-type' : 'application/json',
          'Authorization' : token
        },
        success: function (res) {
          console.log(res);
          // hide the modal
          $('div#top-up-modal').modal('hide');
          $.alert('Account topped up successfully', {
              type: 'success',
              position: ['top-right', [0,0]],
              closeTime: 10000,
              minTop: 55,
              isOnly: false,
          });
          //get new wallet balance
          var newbal = getWalletBalance(token);
          //Set New wallet balance
          $('#wallet-balance').html(newbal);
          $.alert('Wallet Balance Updated', {
              type: 'success',
              position: ['top-right', [0,0]],
              closeTime: 10000,
              minTop: 110,
              isOnly: false,
          });
        },
        error: function (res) {
          console.log(JSON.stringify(res));
          $.alert('Error making transfer', {
              type: 'error',
              position: ['top-right', [0,0]],
              closeTime: 15000,
              minTop: 55
          });
        },
      })
    });

    //var token = getToken("ts_SNSO23Y07CSXI9P4J21X","ts_TIKO82S52NVFBHOPNM4P8YCPHNHDEB");
    var bal = getWalletBalance(token);
    // getSmsUnitBalance("samfield4sure@gmail.com","08d7c1f091de6c7f0be841608ec9d5f1f4c50b88","samBal")
    document.getElementById('wallet-balance').innerHTML = bal;
    var refKey =getReferKey();
    // TransferwalletToBank("abc12345",100,"044","0690000004","",token,refKey);
    
    if (bal<1000){
      
    
    }

  //funtion to get wallet balance;
    function getWalletBalance(token){

      var xmlHttp = new XMLHttpRequest();
      xmlHttp.open( "get", 'https://moneywave.herokuapp.com/v1/wallet', false ); // false for synchronous request
      xmlHttp.setRequestHeader('Authorization',token);
      xmlHttp.send();
      var res = JSON.parse(xmlHttp.responseText);
      var data = res["data"];
      return data[0]['balance'];
    }
  //function to get sms unit balance 
    function getSmsUnitBalance(username,key,divId){
    
      var xmlHttp = new XMLHttpRequest();
      xmlHttp.open( "get", "http://api.ebulksms.com:8080/balance/"+username+"/"+key, false ); // false for synchronous request
      xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xmlHttp.send();
      var res = xmlHttp.responseText; 
      document.getElementById(divId).innerHTML = res;
      if(res < 10){
        alert('Your Sms unit balance at '+username+' is Low');
      }
    }
    
    //wallet to bank transfer
    function TransferwalletToBank(walletPass,amount,bankcode,accountNumber,narration="",token1,ref){
            var  params = {
                  "lock":walletPass,
                  "amount":amount,
                  "bankcode":bankcode,
                  "accountNumber":accountNumber,
                  "currency":"NGN",
                  "senderName":"TransferRule",
                  "narration":narration, //Optional
                  "ref":ref
            };
      var xmlHttp = new XMLHttpRequest();
      xmlHttp.open( "post", 'https://moneywave.herokuapp.com/v1/disburse', false ); // false for synchronous request
      xmlHttp.setRequestHeader('Content-type', 'application/json');
      xmlHttp.setRequestHeader('Authorization',token1);
      xmlHttp.send(JSON.stringify(params));
      var res = xmlHttp.responseText;
      alert(res)
      return res;
    }
    //function to generate reference key 
    function getReferKey(){
      return "Rf"+ Math.random()*1000;
    }
    
 
      //Balance Refresh Button to get new Balance
var refBut = document.getElementById("balRefre");
refBut.addEventListener('click', function(){
        //calling the get balance function to refresh the wallet balance with current balance
        var token = getToken("ts_Q8PES8G6QJFI2RI1THN1","ts_AM2PIJ8VTPYLBK1K6EJDEXD9STLC6G");
        var bal = getWalletBalance(token);
        document.getElementById('balance').innerHTML = "Balance:"+bal;
});
    
  </script>
@endsection


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>