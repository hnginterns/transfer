@extends('layouts.user')

@section('title')
      Transfer to wallet
@endsection
@section('content')

<link rel="stylesheet" href="/css/form.css">

 <div class="col-md-6 col-sm-6">
        <h4 class="intro text-left" >Transfer to another Wallet account </h4>
        @if($failed)) 
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>{{ $failed }}</strong> 
            </div>
        @elseif($status))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>{{ $status }}</strong> Alert body ...
            </div>  
        @endif
        <form action="/transfer-to-wallet/{{$wallet->id}}" method="POST" id="trform" class="input-form">
          {{csrf_field()}}
            <div class="form-group">
                <select class="form-control cus-input" name="sourceWallet">
                  <option value="{{ $wallet->wallet_code }}">{{ $wallet->wallet_name}}</option>
                </select>
            </div>

            <div class="form-group">
                <select class="form-control cus-input" name="recipientWallet">
                    <option value="">Select recipient wallet</option>
                      @foreach($wallets as $walletz)
                      @if($wallet->wallet_code != $walletz->wallet_code)
                              <option value="{{ $walletz->wallet_code }}">{{ $walletz->wallet_name}}</option>
                            @endif
                      @endforeach
                </select>
            </div>

            <div class="form-group">
                <input type="number" class="form-control cus-input" name="amount" id="amount" placeholder="Amount">
            </div>

            <div class="form-group ">    
              <button id="transferbt" type="submit" class="btn btn-primary pull-right">Transfer</button>
            </div>
        </form>
</div>

  
@endsection

