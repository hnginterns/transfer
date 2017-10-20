
@extends('layouts.admin')
@section('title', 'Topup Admin Dashboard ')
@section('subtitle', 'Manage Phone/Data Topup')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="col-sm-12">
    <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">

                <div class="col-md-2">

                    <!-- mobiletopuopng balance -->

                    <div class="panel panel-info">
                        <div class="panel-heading">
                        <h3 class="panel-title">Topup Wallet Balance</h3>
                      </div>
                        <div class="panel-body">
                        ₦ {{number_format($topupbanlance, 2) }}
                      </div>

                      <div class="panel-footer"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#PurchaseTopUp">Purchase</button></div>
                    </div>

                    
                    <!-- Moneywave Wallet balance -->

                    <div class="panel panel-info">
                        <div class="panel-heading">
                        <h3 class="panel-title">Wallet Balance</h3>
                      </div>
                        <div class="panel-body">
                        ₦ {{number_format($topupbanlance, 2) }}
                      </div>

                      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#walletTopUp">Top Up Wallet</button>

                    </div>



                </div>

                <div class="col-md-10">

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
                                <td>Title</td>
                                <td>Dept</td>
                                <td>Phone</td>
                                <td>Email</td>
                                <td>Weekly Max</td>
                                <td>Nos of Topups this week</td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($phones) > 0)
                              @foreach($phones as $phone)
                                <tr>
                                    <td>{{ $phone->firstName }} {{ $phone->lastName }}</td>
                                    <td>@isset($phone->title){{ $phone->title }}@else Not Set @endisset</td>
                                    <td>@isset($phone->department){{ $phone->department }}@else Not Set @endisset</td>
                                    <td>{{ $phone->phoneNumber }}</td>
                                    <td>@isset($phone->email){{ $phone->email }}@else Not Set @endisset</td>
                                    <td>{{ $phone->max_tops }}</td>
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

            </div>

    </div>
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
                        <form action="{{config('app.url')}}/admin/transfer/topup" method="post" accept-charset="utf-8">
                            {{csrf_field()}}
                            <div class="modal-body" style="padding: 5px;">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                        <input class="form-control" name="account_name" placeholder="Account Name" type="text" required />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                        <select class="form-control" name="wallet_id" required >
                                            <option>--Select Wallet --</option>
                                            @foreach($wallet as $key=>$wallets)
                                                <option value="{{$wallets->id}}">{{$wallets->wallet_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                        <select class="form-control" name="bank_id" required >
                                            <option>--Select bank --</option>
                                            @foreach($bank as $key=>$banks)
                                                <option value="{{$banks->id}}">{{$banks->bank_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                        <input class="form-control" name="account_number" placeholder="Account number" type="text" required />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                        <input class="form-control" name="amount" placeholder="Amount" type="number" required />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                        <input class="form-control" name="narration" placeholder="Narration" type="text" required />
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer" style="margin-bottom:-14px;">
                                <button type="submit" class="btn btn-primary">Top up</button>
                                <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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

@endsection
