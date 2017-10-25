
@extends('layouts.admin')
@section('title', 'Topup Admin Dashboard ')
@section('subtitle', 'Manage Phone/Data Topup')
@section('content')
 <!-- Content Wrapper. Contains page content -->


 <div class="container-fluid">
  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#mModal">
                Add New Phone</button>

  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#tModal">Tags</button>
  <br> <br>

        <div class="row">
        <br>

        <div class="col-md-3 col-sm-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              
              <h3 class="profile-username text-center">Mobile Topup Wallet</h3>

              <h2 class="text-center"><strong>₦ {{isset($topupbalance) ? number_format($topupbalance, 2) : 'null' }}</strong></h2>
              @if(isset($wallet))
              <button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#PurchaseTopUp">Purchase</button>
              @endif
              <hr>

              <h3 class="profile-username text-center"> Wallet Balance</h3>
            @if(isset($wallet))
              <h2 class="text-center"><strong>₦ {{ $wallet->balance }}</strong></h2>
             <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#walletTopUp">Fund Wallet</button>
            @else
             <p>No wallet linked. <strong>Please Create a wallet and set type of wallet to Topup</strong></p>
            @endif
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>


    <!-- /.col -->
        <div class="col-md-9 col-sm-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#contacts" data-toggle="tab"><strong>Contacts</strong></a></li>
              <li><a href="#history" data-toggle="tab"><strong>Transaction History</strong></a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="contacts">
                
                 <table id="datatable" class="table table-bordered table-hover">
                    <thead>
                            <tr>
                                <td><strong>Name</strong></td>
                                <td><strong>Title</strong></td>
                                <td><strong>Dept</strong></td>
                                <td><strong>Phone</strong></td>
                                <td><strong>Email</strong></td>
                                <td><strong>Weekly Max</strong></td>
                                <td><strong>Network</strong></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($contacts) > 0)
                              @foreach($contacts as $phone)
                                <tr>
                                    <td>{{ $phone->firstname }} {{ $phone->lastname }}</td>
                                    <td>@isset($phone->title){{ $phone->title }}@else Not Set @endisset</td>
                                    <td>@isset($phone->department){{ $phone->department }}@else Not Set @endisset</td>
                                    <td>{{ $phone->phone }}</td>
                                    <td>@isset($phone->email){{ $phone->email }}@else Not Set @endisset</td>
                                    <td>{{ $phone->weekly_max }}</td>
                                    <td>{{ $phone->netw }}</td>
                                    <td>
                                        <form action="{{ url('admin/delete-phone') }}" method="post">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="delete_phone" value="{{ $phone->id }}" >
                                            <button type="submit" class="btn btn-danger btn-sm" style="color:#fff;"><span class="glyphicon glyphicon-remove"></span></button>
                                        </form>
                                    </td> 
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

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="history">

                   <table class="table">
                        <thead>
                            <tr>
                              <th>Transfered by</th>
                              <th>Amount</th>
                              <th>Payment Ref</th>
                              <th>Date</th>
                            </tr>
                        </thead>

                        <tbody>
                          @forelse ($history as $transaction)
                          <tr>
                            <td style="color: #595757;">{{ $transaction->firstName }}  {{$transaction->lastName}}</td>
                            <td style="color: #595757;">{{ $transaction->amount }}</td>
                            <td style="color: #595757;">{{ $transaction->ref }}</td>
                            <td style="color: #595757;">{{ $transaction->created_at }}</td>

                          @empty
                            <p> No Transactions has taken place on this wallet</p>
                          @endforelse
                          
                        </tbody>
                        
                    </table>
                        {{$history->links()}}
                  </div>
                  
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
                <!-- /.tab-content -->
              </div>
              <!-- /.nav-tabs-custom -->
            </div>
    <!-- /.col -->

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
                                                <div class="modal-body" style="padding: 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="account_number" placeholder="Account number" type="text" required />
                                                        </div>
                                                    </div>
                                                    <input name="wallet_id" value="{{$wallet == null ? 'null' : $wallet->id}}" type="hidden">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <select class="form-control" name="bank_id">
                                                                @foreach($bank as $key => $banks)
                                                                    <option value="{{$banks->id}}">{{$banks->bank_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                        {{csrf_field()}}
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="account_name" placeholder="Account name" type="text" required />
                                                       
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="narration" placeholder="Narration" type="text" required />
                                                       
                                                        </div>
                                                    </div>


                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="amount" placeholder="Amount" type="number" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-footer" style="margin-bottom:-14px;">
                                                    <button type="submit" class="btn btn-success">Purchase</button>
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
                            <div class="modal fade" id="mModal" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Add New Phone Number</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ url('admin/addphone') }}" method="post" accept-charset="utf-8">
                                                {{csrf_field()}}
                                                <div class="modal-body" style="padding: 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="firstname" placeholder="First Name" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="lastname" placeholder="Last Name" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="phone" placeholder="Phone Number" type="text" required />
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="email" placeholder="Email" type="text" required />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="title" placeholder="Title" type="text" required />
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
                                                            <option selected value="">Choose Network</option>

                                                            <option value="MTN">MTN</option>
                                                            <option value="GLO">GLO</option>
                                                            <option value="AIRTEL">AIRTEL</option>
                                                            <option value="9MOBILE">9MOBILE</option>

                                                           </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                           <select class="form-control" name="tagcontact">
                                                            @if(count($tags) > 0)
                                                              <option selected value="">Select Tag</option>
                                                              @foreach($tags as $tag)
                                                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                              @endforeach
                                                            @else
                                                                <option selected value="">No tags added</option>
                                                            @endif
                                                           </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="max_tops" placeholder="Weekly Maximum Topups" type="text" required />
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
                            <!-- Modal for tags -->
                            <div class="modal fade" id="tModal" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Tags</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="alert alert-success tagsuccess" style="display: none; font-size: 14px;"></div>
                                            <div class="alert alert-danger tagerror" style="display: none; font-size: 14px;"></div>
                                            <table class="table">
                                              <thead>
                                                  <tr>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                  </tr>
                                              </thead>

                                              <tbody id="tagbody">
                                                @if(count($tags) > 0)
                                                  @foreach($tags as $tag)
                                                    <tr id="{{ $tag->id }}">
                                                      <td class="name">{{ $tag->name }}</td>
                                                      <td><button type="button" class="btn btn-info btn-xs tagedit" style="margin-right: 10px;" data-name="{{ $tag->name }}" data-tag="{{ $tag->id }}">Edit</button><button type="button" class="btn btn-danger btn-xs tagdelete" data-name="{{ $tag->name }}" data-tag="{{ $tag->id }}">Delete</button></td>
                                                    </tr>
                                                  @endforeach
                                                @else
                                                  <tr id="tagempty">
                                                    <td>No tags added</td>
                                                  </tr>
                                                @endif
                                              </tbody>
                                              
                                          </table>
                                            <form onsubmit="return false;" accept-charset="utf-8">
                                                {{csrf_field()}}
                                                <div class="modal-body" style="padding: 5px;">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="tagname" id="tagname" placeholder="Tag Name" type="text" required />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel-footer" style="margin-bottom:-14px;">
                                                    <input type="submit" class="btn btn-success" value="Save" id="addtagbtn"/>
                                                    <input type="submit" class="btn btn-info" value="Edit" id="editbtn" style="display: none;" />
                                                    <input type="submit" class="btn btn-danger" value="Cancel" id="cancelbtn" style="display: none;" />
                                                    <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close
                                                    </button>
                                                </div>
                                            </form>
                                            <script>
                                              $('document').ready(function(){

                                                $('#addtagbtn').on('click', function(){
                                                  var tagname = $('input[name=tagname]').val();
                                                  var _token = $('input[name=_token]').val();
                                                  $.ajax({
                                                    url: "{{url('admin/addtag')}}",
                                                    type: "POST",
                                                    data:{
                                                      "tagname" : tagname,
                                                      "_token" : _token,
                                                      "type" : "new"
                                                    },
                                                    dataType: "json",
                                                    success: function(data){
                                                      if(data.error == true){
                                                        $(".tagerror").html(data.msg).show();
                                                      }
                                                      else{
                                                        var taghtml = '<tr><td>'+tagname+'</td><td>Refresh page to modify</td></tr>'
                                                        $('#tagempty').remove();
                                                        $("#tagbody").append(taghtml);
                                                        $(".tagsuccess").html(data.msg).show();
                                                        $('input[name=tagname]').val("");
                                                      }
                                                    }
                                                  });
                                                });

                                                $('#editbtn').on('click', function(){
                                                  var tagid = $(this).attr('data-tag');
                                                  var tagname = $('input[name=tagname]').val();
                                                  var _token = $('input[name=_token]').val();
                                                  $.ajax({
                                                    url: "{{url('admin/edittag')}}/"+tagid,
                                                    type: "POST",
                                                    data:{
                                                      "tagname" : tagname,
                                                      "_token" : _token,
                                                      "type" : "edit"
                                                    },
                                                    dataType: "json",
                                                    success: function(data){
                                                      if(data.error == true){
                                                        $(".tagerror").html(data.msg).show();
                                                      }
                                                      else{
                                                        $('#tagempty').remove();
                                                        $("#"+tagid+" .name").html(tagname);
                                                        $(".tagsuccess").html(data.msg).show();
                                                        $('input[name=tagname]').val("");
                                                        $("#editbtn").hide();
                                                        $("#cancelbtn").hide();
                                                        $('#addtagbtn').show();
                                                      }
                                                    }
                                                  });
                                                });

                                                $('#cancelbtn').on('click', function(){
                                                  $("#tagname").val("");
                                                  $("#editbtn").hide();
                                                  $("#cancelbtn").hide();
                                                  $('#addtagbtn').show();
                                                });

                                                $('.tagedit').on('click', function(){
                                                  var tagname = $(this).attr('data-name');
                                                  var tagid = $(this).attr('data-tag');
                                                  $("#tagname").val(tagname);
                                                  $("#editbtn").attr('data-tag', tagid).show();
                                                  $("#cancelbtn").show();
                                                  $('#addtagbtn').hide();
                                                });

                                                $('.tagdelete').on('click', function(){
                                                  var tagid = $(this).attr('data-tag');
                                                  var _token = $('input[name=_token]').val();
                                                  $.ajax({
                                                    url: "{{url('admin/deletetag')}}/"+tagid,
                                                    type: "GET",
                                                    dataType: "json",
                                                    success: function(data){
                                                        $("#"+tagid).remove();
                                                        $(".tagsuccess").html(data.msg).show();
                                                    }
                                                  });
                                                });

                                              });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @isset($wallet)
                    <!---Modal for wallet top Up-->
                    <div class="modal fade" id="walletTopUp">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    
                                    <h4 class="modal-title text-center">{{$wallet == null ? 'null' : $wallet->wallet_name}}</h4>
            
                                </div>
                                <div class="modal-body">
                                    <div class="box-header with-border">
                                        <h3 class="box-title">Card Details</h3>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <form action="{{ route('fund.phone.submit')}}" method="POST" role="form form-horizontal">
                                            {{csrf_field()}}
                                            <!-- text input -->
                                            <div class="container-fluid">
                                                <fieldset>
                                                    <input type="hidden" name="wallet_code" value="{{$wallet == null ? 'null' : $wallet->wallet_code}}">
                                                    <input type="hidden" name="wallet_name" value="{{$wallet == null ? 'null' : $wallet->wallet_name}}">
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
                    @endisset
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
                        </div>
                            <!-- /.modal-dialog -->
                     </div>
                        <!-- /.modal -->

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
                                <p>{{session('status')}}</p>
                                <div class="row">
                                <div class="col-md-6 col-md-offset-2">
                                  <form action="{{ route('fund.otp.submit')}}" method="POST">
                                    {{csrf_field()}}
                                    <input type="hidden" name="ref" value="{{$cardWallet->ref}}">
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
                    <!--end-->         
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
