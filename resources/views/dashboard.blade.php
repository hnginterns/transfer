@extends('layouts.user')

@section('title')
      Dashboard
@endsection
@section('content')

      <div class="col-md-12 col-sm-12">
        <div class="row">
         
            <div class="col-md-4 col-sm-4 ">
            <div class="row dbackground">
            <p class="dicon center-block">
              <i class="fa fa-list-alt fa-5x"></i>
            </p>
            <a href="/wallet-view"><p class="dtext"> Wallet View</p></a>
            </div>
            </div>
            
            <div class="col-md-4 col-sm-4 ">
            <div class="row dbackground">
            <p class="dicon center-block">
              <i class="fa fa-money fa-5x"></i>
            </p>
            <a href="/transfer-to-wallet"><p class="dtext"> Wallet Transfer </p></a>
            </div>
            </div>

            <div class="col-md-4 col-sm-4 ">
            <div class="row dbackground">
            <p class="dicon center-block">
              <i class="fa fa-bank fa-5x"></i>
            </p>
            <a href="transfer-to-bank"><p class="dtext"> Bank Transfer </p></a>
            </div>
            </div>     

            
            <div class="col-md-4 col-sm-4 ">
            <div class="row dbackground">
            <p class="dicon center-block">
              <i class="fa fa-credit-card fa-5x"></i>
            </p>
            <a href="mainwallet"><p class="dtext"> Clearing Wallet </p></a>
            </div>
            </div> 

            

        </div>
      </div>

<style>
  .dbackground{
    background:#25313F;
    color:white;
    padding:10px 20px;
    margin:10px 4px;
    border-radius:4px;
  }
  .dicon i{
    margin:20px auto;
  }
  

  .dtext{
    font-size:18px;
  }

</style>
@endsection      