@extends('layouts.user')

@section('title')
      View Wallet
@endsection
@section('content')


<style>

i.can{
        color: #00a65a;
        
    }

    i.cannot{
      color: #dd4b39;
    }

i.sent{
        color: #00a65a;
        filter: blur(10px);
        -webkit-filter: blur(10px);
        z-index:-1
        
    }

    em.sent{
        opacity: 0.5
        z-index:-1
        
    }

    i.received{
      color: #dd4b39;
      
 }
    
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 5px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
    
    }

    .text-capitalize {
      text-transform: capitalize;
    }
</style>

<link rel="stylesheet" href="/css/walletview.css">

<center>            
 <div class="orange-box"><h2 class="title" align="center">Current Balance: <strong> &#x20A6;{{ number_format(($wallet->balance),2) }} </strong>  </h2></div>
</center><br>

   <!-- Trigger the modal with a button -->
        <center><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#beneficiaryModal">Add Beneficiary</button>
<!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Fund {{ $wallet->wallet_name }}</button>
  
  <a href="{{ route('transfer.validation', $wallet->id)}}" class="btn btn-primary ">Transfer To Beneficiary</a>
    

      <a href="{{ route('transfer.wallet', $wallet->id)}}" class="btn btn-primary ">Transfer to Another Wallet </a></center><br>

     <div class="">
                  @if (!empty($permit))
    <!-- wallet types table -->
        <table>
          <tr>
            <th><font color="#39689C">Wallet Name</font></th>
            <th><font color="#39689C">Wallet ID</font></th>
            <th><font color="#39689C"> Currency Type</font></th>
            <th><font color="#39689C">Balance</font></th>
          </tr>
          <tr>
            <td><font color="#008000"> <b>{{ $wallet->wallet_name }}</b></font></td>
            <td>{{ $wallet->wallet_code }}</td>
            <td>Nigeria Naira</td>
            <td>{{ $wallet->balance }}</td>
          </tr>
          
        </table>
        <!-- end wallet types table -->
        <p>
    </div><br><br>

          <br> <div class="">
          <ul class="nav nav-pills nav-justified ">
            <li class="active"><a data-toggle="pill" href="#home">Wallet Transfer History</a></li>
            <li><a data-toggle="pill" href="#menu1">Beneficiaries List</a></li>
            <li><a data-toggle="pill" href="#menu2">Beneficiaries Transaction History</a></li>
          </ul><br>
        <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
      	<div class="orange-box"><h4 class="title text-capitalize" align="center"> {{ ucfirst($wallet->wallet_name) }} wallet transfer history</h4></div><br>
              <!-- transaction history table tab -->
                <div class="table-responsive">
                  <p>Wallet Funding History
                    @if(count($history)) 
                  <table id="datatable-history" class="table table-bordered table-hover">
      							<thead>
      								<tr>
      									<th>Destination</th>
                        <th>Name of Depositor</th>
      									<th>Transaction Amount</th>
      									<th>Transaction Date</th>
      									<th>Status</th>
      								</tr>
      							</thead>
      							<tbody>
                    @foreach($walletTransactions as $key => $transaction)
                      <tr id="transaction" onclick="$('#modal-id{{$key}}').modal('toggle')">
      									<td id="Destination">{{ $transaction->wallet_name }} </td>
                        <td id="Name_of_depositor">{{ $transaction->firstName }} {{$transaction->lastName}}</td>
      									<td id="transaction_amount">{{ $transaction->amount }} </td>
      									<td id="transaction_date">{{ $transaction->created_at->toDateTimeString() }}</td>
      									<td id="transaction_status"><i class="fa {{ $transaction->status == 'completed' ? 'fa-check-circle can' : 'fa-times-circle cannot' }}" aria-hidden="true"></i></td>
      								</tr>
                      
                      
                      
                      @endforeach
                      
      							</tbody>
      						</table><br>
                    @else
                        
                          <p class="text-center"><b>No Transactions at the moment</b></p>
                        
                      @endif
      					</div>
                <!-- end transction history table tab -->



      </div>
      <div id="menu1" class="tab-pane fade">
                <div class="orange-box"><h4 class="title text-capitalize" align="center"> {{ $wallet->wallet_name }}'s Beneficiaries</h4></div>
              <!-- beneficiaries list table tab -->
                <div class="table table-responsive">
                  <table id="datatable-list" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Bank</th>
                        <th>Account Number</th>
                         <th>Wallet</th>
                        <th>Date</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach ($beneficiaries as $beneficiary)
                      <tr>
                        <td>{{ $beneficiary->name }}</td>
                        <td>{{ $beneficiary->bank_name }}</td>
                        <td>{{ $beneficiary->account_number }}</td>
                        <td>{{ $beneficiary->wallet_id }}</td>
                        <td>{{ $beneficiary->created_at->toDateTimeString() }}</td>
                      </tr>
                    @endforeach              
                    </tbody>
                  </table>

                  {{ $beneficiaries->links() }}
                </div>
                <!-- end beneficiaries list table tab -->
                </div>
          <div id="menu2" class="tab-pane fade">
            <div class="orange-box"><h4 class="title text-capitalize" align="center">{{ ucfirst($wallet->wallet_name) }} Beneficiaries Transfer</h4></div>
            <!-- beneficiaries transfer table tab -->
              <div class="table table-responsive">
                <table id="datatable-transfer" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Amount</th>
                      <th>Wallet ID</th>
                      <th>Transaction Ref</th>
                      <th>Narration</th>
                      <th>Transaction Status</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    
                    @foreach ($bankTransactions as $transaction)
                    <tr>
                      <td>{{ $transaction->beneficiary == null ? 'unknown' : $transaction->beneficiary->name }}</td>
                      <td>{{ $transaction->amount }}</td>
                      <td>{{ $transaction->wallet_id }}</td>
                      <td>{{ $transaction->transaction_reference }}</td>
                      <td>{{ $transaction->narration }}</td>
                      <td><i class="fa {{ $transaction->transaction_status ? 'fa-check-circle can' : 'fa-times-circle cannot' }}" aria-hidden="true"</td>
                      <td>{{ $transaction->created_at->toDateTimeString() }}</td>
                    @endforeach
                  </tbody> 
                  </table>         
                </div>  
          <!-- end beneficiaries transfer table tab -->     
              </div>
            </div>
          <div class="col-sm-12">              	
            <div class="container">
     
      <!--Add sms Account  Modal -->
          <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
              <!-- Modal content-->
                <div class="panel panel-default">
                  <div class="panel-heading">
                      Fund <strong>{{ $wallet->wallet_name }} </strong>  Wallet with Card <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                  </div>
      			
            <div class="modal-body">  
                <!-- text input -->      
	    <form action="/wallet/{{$wallet->id}}/fund" method="POST" class="form-horizontal">   
                    {{ csrf_field() }}
                    <input type="hidden" name="wallet_name" value="{{$wallet->wallet_name}}">
                      <input type="hidden" name="wallet_code" value="{{$wallet->wallet_code}}"> 
                    <div class="container-fluid">
                  <fieldset>  
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-5">
                                <label for="cc_name">First Name</label>
                                <div class="controls">
                                    <input name="fname" class="form-control" value="{{Auth::user()->fundWalletInfo == null ? '' : Auth::user()->fundWalletInfo->firstname}}" id="cc_name" title="First Name" required type="text">
                                </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                  <label for="cc_name">Last Name</label>
                                  <div class="controls">
                                      <input name="lname" class="form-control" value="{{Auth::user()->fundWalletInfo == null ? '' : Auth::user()->fundWalletInfo->lastname}}" id="cc_name"  title="last name" required type="text">
                                  </div>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-5">
                                <label>Phone Number</label>
                                <div class="controls">
                                      <input name="phone" pattern="\+234\d{10}" class="form-control" value="{{Auth::user()->fundWalletInfo == null ? '' : Auth::user()->fundWalletInfo->phonenumber}}" autocomplete="off" maxlength="20"  required="" type="text">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <div class="controls">
                                          <input type="email" name="emailaddr" value="{{Auth::user()->fundWalletInfo == null ? '' : Auth::user()->fundWalletInfo->email}}" class="form-control" autocomplete="off" required="" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-5">    
                                <label>Card Number</label>
                                    <div class="controls">
                                          <input name="card_no" class="form-control" autocomplete="off" maxlength="20"  required="" type="text">
                                    </div>
                            </div>
                            <div class="col-md-3">
                                <label>Card Expiry Date</label>
                                <div class="controls">
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
                            </div>
    
                            <div class="col-md-3">
                                <label>Card Expiry Year</label>
                                    <select class="form-control" name="expiry_year">
                                            @for ($i = 2017;$i <= 2040;$i++)
                                            <option>{{$i}}</option>
                                            @endfor  
                                    </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-3">
                                   <label>Card CVV</label>
                                    <div class="controls">
                                        <input class="form-control" autocomplete="off" maxlength="3" pattern="\d{3}" title="Three digits at back of your card" required="" type="number" name="cvv">
                                    </div>
                             </div>

                         <div class="col-md-3">
                               <label>Pin</label>
                                <div class="controls">
                                    <input class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="pin" required="" type="password" name="pin">
                                </div>
                         </div>
            
                          <div class="col-md-4">
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
                            <button type="submit" class="btn btn-primary">Fund Wallet</button>
                            <a href="/admin/viewwallet/{{$wallet->id}}"><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button></a>
                        </div>
                    </div>
                </fieldset>
                    </div>
                </form>
				
           </div>
      </div>
</div>
</div>
			
 
            
            
            <!--Add Beneficiary  Modal -->
            <div class="modal fade" id="beneficiaryModal" role="dialog">
              <div class="modal-dialog">
              
                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">ADD Beneficiary</h4>
                  </div>
                  <div class="modal-body">
                    <p>Please fill out details</p>
                    <form action="/addbeneficiary/{{ $wallet->id }}" method="post" role="form" class="submit-topup">
                          {{ csrf_field() }}
                          <!-- text input -->
                          {{--<div class="form-group">                  
                            <label>Beneficiary Name</label>
                            <input type="text" required name="name" class="form-control input-defaulted" placeholder="Name">
                          </div>--}}

                           <div class="form-group">                   
                            <label>Bank</label>
                            <select name="bank_id" required class="form-control input-defaulted" >
                              <option>Select Bank</option>

                            @foreach(App\Http\Controllers\BanksController::getAllBanks() as $key => $bankcode)
                            <option value="{{$bankcode->bank_code}}||{{$bankcode->bank_name}}">{{ $bankcode->bank_name }}</option>
                            @endforeach
                            </select>
                          </div>

                           <div class="form-group">
                              <label>Account Number</label>
                              <input type="text" required name="account_number" class="form-control input-defaulted" placeholder="Account Number">
                           </div>

                            <div class="form-group ">
                              <button type="submit" class="btn btn-success pull-right" name="button"> Add</button><br>
                            </div>
                        </form>
                    </div>
                </div>
              </div>
          </div>
		</div>

     @if (session('otp'))
   <script type="text/javascript">
        $(document).ready(function() {
            $('#otpModal').modal();
        });
    </script>

    <div class="modal fade" id="otpModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Otp</h4>
          </div>
          <div class="modal-body">
            <p>{{session('otp')}}</p>
            <div class="row">
            <div class="col-md-6 col-md-offset-2">
              <form action="/otp" method="POST">
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
<script>
$('.modal-content').resizable({
      //alsoResize: ".modal-dialog",
      minHeight: 300,
      minWidth: 300
    });
    $('.modal-dialog').draggable();

    $('#myModal').on('show.bs.modal', function() {
      $(this).find('.modal-body').css({
        'max-height': '100%'
      });
    });

</script>

@endif

@if (session('responses'))
   <script type="text/javascript">
        $(document).ready(function() {
            $('#validateModal').modal();
        });
    </script>

    <div class="modal fade" id="validateModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Save Beneficiary</h4>
          </div>
          <div class="modal-body">
            <div class="row">
            <div class="col-md-6 col-md-offset-2">
              

              
              <form action="/updateBeneficiary/{{$wallet->id}}" method="POST">
                {{csrf_field()}}
                
                <div class="form-group">
                 @foreach(Session::get('responses') as $response) 
                <input type="text" name="name" value="{{$response['name']}}" class="form-control" readonly>
                 @endforeach
              </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="bank_name" value="{{$response['bank_name']}}" readonly>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="bank_id" value="{{$response['bank_code']}}">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="account_number" value="{{$response['account_number']}}" readonly>
                </div>
               
                <button type="submit" class="btn btn-default btn-block">Submit</button>
                
              </form>
            </div>
          </div>
      </div>
      
    </div>
  </div>

</div>
<script>
$('.modal-content').resizable({
      //alsoResize: ".modal-dialog",
      minHeight: 300,
      minWidth: 300
    });
    $('.modal-dialog').draggable();

    $('#myModal').on('show.bs.modal', function() {
      $(this).find('.modal-body').css({
        'max-height': '100%'
      });
    });

</script>
@endif

    @else

              <p> You do not have permission to view this wallet</p>

     @endif
    
  @endsection
