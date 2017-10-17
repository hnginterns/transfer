
@extends('layouts.admin')
@section('content')
 <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin:0px;">
            <!-- Content Header (Page header) -->
            <section class="content-header" style="padding: 30px;">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 id="balance">Top-up Balance: ₦ 20,520</h4>
                        <div>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#PurchaseTopUp">Purchase</button>
                        </div>
                        <div class="container">
                            <!-- Trigger the modal with a button -->
                            <!-- Modal -->
                            <div class="modal fade" id="PurchaseTopUp" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Transfer To Service Provider</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="#" method="post" accept-charset="utf-8">
                                                <div class="modal-body" style="padding: 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="text" placeholder="Account number" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="Amount" placeholder="Amount" type="text" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-footer" style="margin-bottom:-14px;">
                                                    <input type="submit" class="btn btn-success" value="Save" />
                                                    <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <!-- Trigger the modal with a button -->
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Add New Phone Number</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('/admin/addphone') }}" method="post" accept-charset="utf-8">
                                                {{csrf_field()}}
                                                <div class="modal-body" style="padding: 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="first_name" placeholder="First Name" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="last_name" placeholder="Last Name" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="phone" placeholder="Phone Number" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                           <select class="form-control" name="network">
                                                            <option selected value="">Choose Network</option>
                                                            <option value="MTN">MTN</option>
                                                            <option value="GLO">GLO</option>
                                                            <option value="AIRTEL">AIRTEL</option>
                                                            <option value="9MOBILE">9Mobile</option>
                                                           </select>
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
                    <div class="col-lg-3 ">
                        <h4 id="balance">Wallet Balance: ₦ 20,520</h4>
                        <div>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#walletTopUp">Top Up Wallet</button>
                        </div>
                    </div>
                    <!---Modal for wallet top Up-->
                    <div class="modal fade" id="walletTopUp">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title text-center">Phone Wallet Top Up</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Card Details</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <form action="#" method="POST" role="form form-horizontal">
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
                            </div>
                            <!--row ends-->
                            <!---Modal for wallet top Up-->
                            <div class="modal fade" id="walletTopUp">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                                                        <input class="form-control" value="Transfer Rule Sms" type="text" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Wallet Id</label>
                                                        <input class="form-control" value="X846945532" type="text" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Top-up Amount</label>
                                                        <input id="amountToPay" class="form-control" type="text">
                                                    </div>
                                                    <input type="button" class="btn btn-block btn-success" name="" id="topu1p" value="Top-Up">
                                                </form>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
            </section>

            <!-- Main content -->
            <section class="content container" id="bulksms" style="margin-right: 0px;margin-left: 0px;">
                <div class="container">
                    <hr>
                    <p>
                        <h3>Phone Numbers </h3>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add New Phone</button>
                    </p>
                    <table class="table" style="width:70%;">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>phone Number</td>
                                <td>Network</td>
                                <td>Amount Left</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($phones) > 0)
                              @foreach($phones as $phone)
                                <tr>
                                    <td>{{ $phone->firstName }} {{ $phone->lastName }}</td>
                                    <td>{{ $phone->phoneNumber }}</td>
                                    <td>{{ $phone->ref }}</td>
                                    <td>{{ $phone->amount }}</td>
                                </tr>
                              @endforeach
                            @else
                               <tr>
                                  <td></td>
                                  <td>No Phone Number Added</td>
                                  <td></td>
                                  <td></td>
                              </tr>
                            @endif
                        </tbody>
                    </table>
                    <hr>
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


@endsection
