<style media="screen">
    .inner-holder {
        background: #222d32;
        color: #b8c7ce;
        padding: 13px 15px;
        border-radius: 3px;
    }
    .inner-holder :hover{
        background: #b8c7ce ;
        color: #222d32;
    }
    .wallet-container {
      padding: 30px;
    }

    .btn-primary {
        color: #b8c7ce;
        background-color: transparent !important;
        /*border-color: white !important;*/
        border: none !important;
        font-size: 12.5px;
    }

    i.fa.fa-plus {
      color: white;
      font-weight: 500;
    }

    .btn-success {
        background-color: #00a65a;
        border-color: #04864a;
        margin-left: 30px;
        padding: 10px !important;
    }

    i.fa {
      color: #b8c7ce;
    }

    .fa-trash-o:hover {
      color: #b32913;
    }

    .fa-eye:hover {
      color: #fff;
    }

    .wallet-row.row {
      margin-bottom: 30px;
    }

    h5.wallet-name {
      margin-bottom: 20px;
    }

    @media screen and (max-width:768px) {

      .single-wallet-holder.col-md-3 {
          margin-bottom: 20px;
          padding: 0px;
      }
    }
</style>

@extends('layouts.admin')

@section('content')


<div class="container-fluid">

  <a type="button" class="btn btn-info" href="createwallet" name="button"> Add Wallet</i></a>

  <div class="wallet-container">

    <div class="wallet-row row">
    @foreach($wallets as $wallet)
    <div class=" col-sm-3">
        <a href="{{ route('view-wallet', $wallet->id) }}" class="single-wallet-holder col-md-3">
            <div class="inner-holder">
            <h5 class="wallet-name"><b>Wallet name:</b> {{ $wallet->wallet_name }}</h5>
            <h5 class="wallet-name"><b>Balance:</b> {{ $wallet->balance }}</h5>
                  <h5 data-color="#ffffff">
                    @foreach($transaction as $transact)
                    @if($wallet->wallet_code == $transact['uref'])
                    Balance {{  $transact['balance'] }}
                    @endif
                    @endforeach
                  </h5>
            </div>
        </a>
        </div>
        @endforeach
      </div>
  </div>

</div>

@endsection
