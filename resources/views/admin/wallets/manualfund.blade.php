@extends('layouts.admin')
@section('title', 'Manual Fund Wallet')
@section('subtitle', 'Fund Wallet')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <br>
        @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach()
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                Fund <strong>{{ $wallet->wallet_name }} </strong>  Wallet Manually <a href="{{ route('wallets.details', $wallet->id) }}" class="label label-primary pull-right">Back</a>
            </div>
            
                <div class="panel-body">

                <form action="/admin/{{$wallet->wallet_code}}/fund" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="method" value="Manual Funding">
                    <input type="hidden" name="status" value="Completed">
                    <input type="hidden" name="recipient_id" value="{{$wallet->wallet_code}}">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Wallet Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="wallet_name" id="wallet" class="form-control" value="{{ $wallet->wallet_name }}" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Sender's First Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="fname" id="fname" class="form-control" v>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Sender's Last Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="lname" id="lname" class="form-control" v>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Sender's Email Address</label>
                        <div class="col-sm-10">
                            <input type="text" name="emailaddr" id="emailaddr" class="form-control" v>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Sender's Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" id="phone" class="form-control" v>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Amount</label>
                        <div class="col-sm-10">
                            <input type="text" name="amount" id="amount" class="form-control" v>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Card Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="card_no" id="card_no" class="form-control" v>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >CVV</label>
                        <div class="col-sm-10">
                            <input type="text" name="cvv" id="cvv" class="form-control" v>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Expiry Month</label>
                        <div class="col-sm-10">
                            <input type="text" name="expiry_month" id="expiry_month" class="form-control" v>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Expiry Year</label>
                        <div class="col-sm-10">
                            <input type="text" name="expiry_year" id="expiry_year" class="form-control" v>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Pin</label>
                        <div class="col-sm-10">
                            <input type="text" name="pin" id="pin" class="form-control" v>

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" value="Fund Wallet" />
                        </div>
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

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
