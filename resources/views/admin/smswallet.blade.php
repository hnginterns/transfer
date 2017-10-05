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
        <h2 id="balance">Balance:</h2>
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
          <div class="col-md-3 col-sm-10 units" >
            <p>Account Name: Jonesky</p>
            <p>Sms Unit: 1826.00</p>
            <button type="button" class="btn btn-success btn-block " data-toggle="modal" data-target="#Jonesky">
                Top up
              </button>
          </div>
          <div class="col-md-3 col-sm-10 units" data-placement="top" data-toggle="popover" title="Balance Low">
            <p>Account Name: Samfield</p>
            <p>Sms Unit: <span class="unit-balance">2000.00</span></p>
            <button type="button" class="btn btn-success btn-block " data-toggle="modal" data-target="#samfield">
                Top up
              </button>
          </div>
          <div class="col-md-3 col-sm-10 units" data-placement="top" data-toggle="popover" title="Balance Low">
            <p>Account Name: Godfred</p>
            <p>Sms Unit: <span class="unit-balance">500.00</span></p>
            <button type="button" class="btn btn-success btn-block " data-toggle="modal" data-target="#godfred">
                Top up
              </button>
          </div>
          <div class="col-md-3 col-sm-10 units" data-placement="top" data-toggle="popover" title="Balance Low">
            <p>Account Name: BigJeo</p>
            <p>Sms Unit: <span class="unit-balance">1000.00</span></p>
            <button type="button" class="btn btn-success btn-block " data-toggle="modal" data-target="#jeo">
                Top up
              </button>
          </div>
          
        </div>
    </section>
    <!---Modal for Jonesky-->
    <div class="modal fade" id="Jonesky">
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
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" value="johseph.mbassey2@gmail.com"  type="Email" disabled>
                </div>
                <div class="form-group">
                  <label>Username</label>
                  <input class="form-control" value="Jonesky"  type="text" disabled>
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input class="form-control" value="***********"  type="Password" disabled>
                </div>

                <div class="form-group">
                  <label>Api Id</label>
                  <input class="form-control" value="jjdcjf68fv25s8dxe4cvvrf8r8frf"  type="text" disabled>
                </div>
                 <div class="form-group">
                  <label>Top-Up Amount</label>
                  <input class="form-control"  type="text" >
                </div>
                <input type="button" class="btn btn-block btn-success" name="" value="Top-Up">
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

 
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
              <div class="menu-info">

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<script>

  $(document).ready(function(){
      $('[data-toggle="popover"]').popover();
  });

	//var token = getToken("ts_SNSO23Y07CSXI9P4J21X","ts_TIKO82S52NVFBHOPNM4P8YCPHNHDEB");
	var token = getToken("ts_Q8PES8G6QJFI2RI1THN1","ts_AM2PIJ8VTPYLBK1K6EJDEXD9STLC6G");
	var bal = getWalletBalance(token);
	getSmsUnitBalance("samfield4sure@gmail.com","08d7c1f091de6c7f0be841608ec9d5f1f4c50b88","samBal")
	document.getElementById('balance').innerHTML += bal;
	var refKey =getReferKey();
	TransferwalletToBank("abc12345",100,"044","0690000004","",token,refKey);
	
	if (bal<1000){
    
  
  }

		function getToken(apikey,apisecret)
			{	var xmlHttp = new XMLHttpRequest();
				xmlHttp.open( "POST", "https://moneywave.herokuapp.com/v1/merchant/verify", false ); // false for synchronous request
				xmlHttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlHttp.send('apiKey='+apikey+'&secret='+apisecret);//paramaters to send to the url 
				var jsonResponse = JSON.parse(xmlHttp.responseText);
			return jsonResponse['token'];
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
