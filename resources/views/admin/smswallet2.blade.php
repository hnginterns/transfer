@extends('layouts.admin')
@section('title', 'SMS Account Page ')
@section('subtitle', 'Add sms Account/Top up')

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

@if(isset($smsWallet))
  <div class="row">
    <h3>Balance: {{ $smsWallet->balance }}</h3>

<button type="button" class="btn btn-info" data-toggle="modal" data-target="#walletTopUp">
                Fund Wallet</button>
  </div>
  @else
  <div class="row">
    <p>No wallet linked to this account. Please create a wallet and set type to Sms Wallet</p>
  </div>
  @endif
</div>

<section class="content">
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mModal">
          Add New SMS Account</button>

  <section class="content container" id="bulksms">
          
        <div class="row">
       
          <div class="col-md-3 col-sm-10 units" >
            <p>Account Name: Jonesky</p>
            <p>Sms Unit: 1826.00</p>
            <button type="button" class="btn btn-success btn-block " data-toggle="modal" data-target="#smstop">
                Top up
              </button>
          </div>
          <div class="col-md-3 col-sm-10 units" >
            <p>Account Name: Samfield</p>
            <p>Sms Unit: 2000.00</p>
            <button type="button" class="btn btn-success btn-block " data-toggle="modal" data-target="#samfield">
                Top up
              </button>
          </div>
          <div class="col-md-3 col-sm-10 units" >
            <p>Account Name: Godfred</p>
            <p>Sms Unit: 500.00</p>
            <button type="button" class="btn btn-success btn-block " data-toggle="modal" data-target="#godfred">
                Top up
              </button>
          </div>
          <div class="col-md-3 col-sm-10 units" >
            <p>Account Name: BigJeo</p..>
            <p>Sms Unit: 1000.00</p>
            <button type="button" class="btn btn-success btn-block " data-toggle="modal" data-target="#jeo">
                Top up
              </button>
          </div>
          
        </div>
    </section>

          
  <!-- Trigger the modal with a button -->
<!---Modal for wallet top Up-->
                    <div class="modal fade" id="walletTopUp">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    
                                    <h4 class="modal-title text-center"></h4>
            
                                </div>
                                <div class="modal-body">
                                
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Enter Card Details</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <form action="{{ route('fund.phone.submit')}}" method="POST" role="form form-horizontal">
                                            {{csrf_field()}}
                                            <!-- text input -->
                                            <div class="container-fluid">
                                                <fieldset>
                                                    <input type="hidden" name="wallet_code" value="">
                                                    <input type="hidden" name="wallet_name" value="">
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
                                                                    <input name="lname" class="form-control" id="cc_name" title="last name" required type="text">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <div class="controls">
                                                            <input name="phone" class="form-control" autocomplete="off" maxlength="20" required="" type="text">
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
                                                            <input name="card_no" class="form-control" autocomplete="off" maxlength="20" required="" type="text">
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
                                                                    @for ($i = 2017;$i < 2040; $i++)
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
                            </div>
                        </div>
                    </div>
<!---Modal for wallet top Up-->





                            <!-- Modal  for adding new sms Account-->
                            <div class="modal fade" id="mModal" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Add New Ebulk SMS Details</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="post" accept-charset="utf-8">
                                                {{csrf_field()}}
                                                <div class="modal-body" style="padding: 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="username" placeholder="Ebulk Username" type="text" required />
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="api_key" placeholder="Ebulk API Key" type="text" required />
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="Text" placeholder="Bank Account Number" type="text" required />
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="department" placeholder="Department" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                           <select class="form-control" name="network">
                                                            <option selected value="">Choose Bank</option>
                                                            <option value="15">first bank</option>
                                                           
                                                           </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="acc_number" placeholder="Bank Account Number" type="text" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-footer" style="margin-bottom:-14px;">
                                                    <input type="submit" class="btn btn-success" value="Save" />
                                                    <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                            <!-- Modal  for transfering to sms Bank account that is low-->

                     <div class="modal fade" id="smstop">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">SMS Unit Top Up</h4>
              </div>
              <div class="modal-body">
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>SMS User</label>
                  <input class="form-control" value="johseph.mbassey2@gmail.com"  type="Email" disabled>
                </div>
                
                <div class="form-group">
                  <label>Bank Name</label>
                  <input class="form-control" value="Firs bank"  type="text" disabled>
                </div>

                <div class="form-group">
                  <label>Account Number</label>
                  <input class="form-control" value="3091455216"  type="text" disabled>
                </div>
                 <div class="form-group">
                  <label>Top-Up Amount</label>
                  <input class="form-control"  type="text" placeholder="50000">
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
  <!-- /.c



<!-- REQUIRED JS SCRIPTS -->

</section>


@endsection
