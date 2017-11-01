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
  .deltop{
    margin-top: -30px;
  }
</style>
@endsection

@section('content')

<div class="container top-up" style="padding-left:30px;">

@if(isset($smsWallet))
  <div class="row">
    <h3>Balance:₦ {{ $smsWallet->balance }}</h3>

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
 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newsms">
          Add New SMS Account</button>

  <section class="content container" id="bulksms">
        <div class="row">

          @foreach ($smswalletdetails as $smswalletdetail)

         <div class="col-md-3 col-xs-12 units">
                <!-- small box -->
                <div class="small-box">
      <div class="inner unit">
          <br>
              <h4 class="pull-right deltop">Ebulk SMS Account {{$smswalletdetail['id']}}</h4>

       <form action="{{ url('admin/delete_sms') }}/{{$smswalletdetail['id']}}" onsubmit="return confirm('Are you sure you want to delete this sms wallet?')" method="post">
		 {{ csrf_field() }}   {{method_field("DELETE")}}
   <input type="hidden" name="delete_sms" value="{{$smswalletdetail['id']}}" >
         <button type="submit" class="btn btn-danger  deltop " style="color:#fff;"><span class="fa fa-trash"></span></button>
</form>

                                                   
                    <hr>
                     @if($smswalletdetail['balance'] < 50) 
            
  <p>
    <strong class="label label-danger">SMS Unit is Low!</strong> 
  
        @else 
          <strong class="label label-success">SMS Unit is ok!</strong> 
        @endif
        </p>  
              Account Name: <span class="username">{{ $smswalletdetail['username'] }}</span>
<p>Sms Unit Balance: <span class="unit-balance">{{ $smswalletdetail['balance'] }}</span>

        
      </div>
      
      <div class="icon">
          <i class="fa fa-envelope"></i>
      </div>  
      <a href="#" class="btn-success btn pull-right" type="button"  data-toggle="modal" data-target="#{{$smswalletdetail['id']}}modal">Top-Up Unit <i class="fa fa-arrow-circle-right"></i></a>
      
                </div>
            </div>

          @endforeach
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
                                  @if(isset($smsWallet))
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <form action="{{ route('fund.smswallet.submit')}}" method="POST" role="form form-horizontal">
                                            {{csrf_field()}}
                                            <!-- text input -->
                                            <div class="container-fluid">
                                                <fieldset>
                                                    <input type="hidden" name="wallet_code" value="{{$smsWallet->wallet_code}}">
                                                    <input type="hidden" name="wallet_name" value="{{$smsWallet->wallet_name}}">
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
                                                            <input name="phone" class="form-control" placeholder="+2348066222222" autocomplete="off" maxlength="20" required="" type="text">
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
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
<!---Modal for wallet top Up-->





                            <!-- Modal  for adding new sms Account-->
                            <div class="modal fade" id="newsms" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content -->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title centered">Add New Ebulk SMS Details
                                            <hr>
                                            <p>Before Adding Account, Get Your API Key From  <a href="https://www.ebulksms.com/users/api" target="_blank"" data-toggle="tooltip" title="Login to your account navigate to the developer tap and generate your API key !">Ebulksms</a></p>
                                       </h4> </div>
                                        <div class="modal-body">
                                            <form action="addSmsAccount" method="post" accept-charset="utf-8">
                                                {{csrf_field()}}
                                                <div class="modal-body" style="padding: 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="username" placeholder="Your Ebulksms Account Email" type="text" required />
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control " name="api_key" placeholder="Your Ebulksms Account API Key" type="text" required />
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                           <select class="form-control" name="bank_code">
                                                            <option selected value="">Choose Bank</option>
                                                            
                                                            @foreach(App\Http\Controllers\BanksController::getAllBanks() as $key => $bankcode)
                                                            <option value="{{$bankcode->id}}">{{ $bankcode->bank_name }}</option>
                                                            @endforeach
                                                           
                                                           </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="bank_account" placeholder="Bank Account Number" type="text" required />
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
                        


                            <!-- Modal  for transfering to sms Bank account that is low-->
@foreach ($smswalletdetails as $smswalletdetail)
                     <div class="modal fade" id="{{$smswalletdetail['id']}}modal">
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
              <form action="{{config('app.url')}}/admin/transfer" method="post">
                {{csrf_field()}}
                <!-- text input -->
                <div class="form-group">
                  <label>SMS User</label>
                  <input class="form-control email" value="{{$smswalletdetail['username']}}"  type="email" readonly>
                </div>
                
                  <input class="form-control account-no" value="2087594250" name="account_number" type="hidden">
              
                 <div class="form-group">
                  <label>Top-Up Amount</label>
                  <input class="form-control" name="amount"  type="text" placeholder="60000">
                </div>
                <input type="hidden" class="bank-code" name="bank_code">
                <button class="btn btn-block btn-success sendsms-pay" name="" value="Transfer">Transfer</button>
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
  @endforeach
  <!-- -->


           <!--Modal for Otp -->
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
                                        @foreach(Session::get('status') as $data)
                                        <p>{{$data['message']}}</p>
                                        <div class="row">
                                        <div class="col-md-6 col-md-offset-2">
                                          <form action="sms/otp" method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="ref" value="{{$data['reference']}}">
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="otp" placeholder="Enter OTP">
                                            </div>
                                            <button type="submit" class="btn btn-default btn-block">Submit</button>
                                          </form>
                                        </div>
                                      </div>
                                      @endforeach
                                  </div>
                                </div>
                              </div>
                            </div>
                            @endif
                            <!--end-->

<!-- REQUIRED JS SCRIPTS -->



@endsection

@section('added_js')
    <script type="text/javascript">
        $('div.modal#smstop').on('show.bs.modal', function(e) {            
            var parent = $(e.relatedTarget).parents('div.units');
            $(this).find('form input.email').val(parent.find('p span.account-name').html());
            $(this).find('form input.account-no').val(parent.find('span.details').data('acctno'));
            $(this).find('form input.bank').val(parent.find('span.details').data('bankname'));
            $(this).find('form input.bank-code').val(parent.find('span.details').data('bankcode'));
        });
        $('div.modal#smstop button.btn').click(function() {
            $(this).parents('form.send-sms').submit();
        });
    </script>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

