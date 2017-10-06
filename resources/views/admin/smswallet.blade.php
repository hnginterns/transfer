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

    <section class="col-md-12">
      <!-- Content Wrapper. Contains page content -->
      <div class="row">
        <div class="col-lg-6">
          <h1>
            SMS Wallet
            
          </h1>
          <h2>Id:X846945532</h2>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Sms wallet</li>
          </ol>
        </div>
        <div class="col-lg-3 col-lg-offset-3">
        <h2 id="balance">Balance: <span id="wallet-balance"></span></h2>
        <div>
        <button type="button" class="btn btn-primary btn-block " id="topup"><!--data-toggle="modal" data-target="#walletTopUp">-->
          Top up
        </button>
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
                <h3 class="box-title">Wallet Details</h3>
              </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>Account</label>
                  <input class="form-control" value="Transfer Rule Sms"  type="text" disabled>
                </div>
                <div class="form-group">
                  <label>Wallet Id</label>
                  <input class="form-control" value="X846945532"  type="text" disabled>
                </div>
                 <div class="form-group">
                  <label>Top-up Amount</label>
                  <input id="amountToPay" class="form-control"  type="text" >
                </div>
                <input type="button" class="btn btn-block btn-success" name="" id="topu1p" value="Top-Up">
              </form>

              </div>
              
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </div>
        <!-- /.modal -->
    </section>

    <!-- Main content -->
    <section class="content container" id="bulksms">

        <button class="btn btn-success">Create New</button>
        <div class="row">

          @foreach ($smswalletdetails as $wallet)
            <div class="col-md-3 col-sm-10 units" data-trigger="focus" data-placement="top" data-toggle="popover" @if ($wallet['balance'] < 10) title="Balance Low" data-content="Your SMS Balance is Low!" @endif>
              <p>Account Name: <span class="username">{{ $wallet['username'] }}</span></p>
              <p>Sms Unit: <span class="unit-balance">{{ number_format($wallet['balance'], 2) }}</span></p>
              <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#top-up-modal">
                  Top up
                </button>
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
                  <label>Api Id</label>
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

 

<!-- REQUIRED JS SCRIPTS -->


@endsection

@section('added_js')
  <script src="{{ asset('js/modal-alert.js') }}"></script>
  <script>

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
        "accountNumber":new_data['account'],
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
              closeTime: 5000,
              minTop: 55
          });
          //get new wallet balance
          var newbal = getWalletBalance(token);
          //Set New wallet balance
          $('#wallet-balance').html(newbal);
          $.alert('Wallet Balance Updated', {
              type: 'success',
              position: ['top-right', [0,0]],
              // closeTime: 5000,
              minTop: 55
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
      return "Rf"+ Math.random(1000,9999);
    }
    
    //function to get api key 
    function getSmsApiKey(username, password){
      var xmlHttp = new XMLHttpRequest();
      try{
      
      xmlHttp.open( "post",'http://api.ebulksms.com:8080/getapikey.json', true ); // false for synchronous request
      //xmlHttp.setRequestHeader("Accept", "");
      xmlHttp.setRequestHeader('Content-type', 'application/json');
      xmlHttp.send(JSON.stringify({
            "auth": {
              "username":"samfield4sure@gmail.com",
              "password":"samfield"
              }
            }));
            
          alert(xmlHttp.responseText);
          }catch(e){
            alert(e);
          }
          
    }
  //	getSmsApiKey("samfield4sure@gmail.com","samfield");
    
    
  </script>
@endsection