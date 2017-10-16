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


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
