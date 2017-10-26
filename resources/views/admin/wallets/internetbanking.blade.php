@extends('layouts.admin')
@section('title', 'Internet Fund Wallet')
@section('subtitle', 'Internet Fund Wallet')

@section('content')
<div class="row">
    <div class="col-md-10 col-sm-offset-1">
        <br>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                Fund <strong>{{ $wallet->wallet_name }} </strong>  Wallet with Internet Banking <a href="{{ route('wallets.details', $wallet->id) }}" class="label label-primary pull-right">Back</a>
            </div>
                <div class="panel-body">

                <form action="/admin/wallets/manualfundint/{{$wallet->id}}" method="POST" class="form-horizontal">
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
                                    <input name="firstname" class="form-control" id="cc_name" title="First Name" required type="text">
                                </div>
                            </div>
                            <div class="col-md-5">
                              <div class="form-group">
                                  <label for="cc_name">Last Name</label>
                                  <div class="controls">
                                      <input name="lastname" class="form-control" id="cc_name"  title="last name" required type="text">
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
                                      <input name="phoneNumber" class="form-control" autocomplete="off" maxlength="20"  required="" type="text">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <div class="controls">
                                          <input type="email" name="email" class="form-control" autocomplete="off" required="" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-3">
                                   <label>Sender Account</label>
                                    <div class="controls">
                                        <input class="form-control" autocomplete="off" maxlength="10" title="Your account number" required="" type="number" name="account_number">
                                    </div>
                             </div>

                         <div class="col-md-3">
                               <label>Sender Bank</label>
                                <select name="bank_id" required class="form-control input-defaulted" >
                              <option>Select Bank</option>
                              @foreach(App\Http\Controllers\BanksController::getAllBanks() as $key => $bankcode)
                              <option value="{{$bankcode->bank_code}}||{{$bankcode->bank_name}}">{{ $bankcode->bank_name }}</option>
                              @endforeach
                              </select>
                         </div>
            
                          <div class="col-md-4">
                                  <label>Amount</label>
                                  <div class="input-group">
                                      <div class="input-group-addon">₦</div>
                                      <input name="amount" type="number" class="form-control" id="amount" placeholder="Amount">
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
              <form action="/admin/otp" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="ref" value="{{$intBanking->reference}}">
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

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
