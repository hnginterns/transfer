<style media="screen">
    .inner-holder {
        background: #39689C;
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
      color: #39689C;
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
   <div class="row">
<div class="col-md-5">
    @if (session('status'))
    <div class="alert alert-success alert-dismissible" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        {{ session('status') }}
    </div>
    @endif
  </div>
</div>


  <a type="button" class="btn btn-info" href="createwallet" name="button"> Add Wallet</i></a>

  <div class="wallet-container">

    <div class="wallet-row row">
    @foreach($wallets as $wallet)
        <a href="{{ route('view-wallet', $wallet->id) }}" style="padding-bottom: 20px;" class="single-wallet-holder col-md-3 col-xs-12 col-sm-6">
            <div class="inner-holder">
                  <h5 class="wallet-name"><b>Wallet Name:</b> {{ $wallet->wallet_name }}</h5>
                  <h5 class="wallet-name"><b>Balance:</b> {{ $wallet->balance }}</h5>                  
            </div>
        </a>
        @endforeach
      </div>
  </div>
</div>

@endsection
