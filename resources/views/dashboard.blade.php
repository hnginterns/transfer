@extends('layouts.user')
@section('title', 'Dashboard')

@section('content')

      <div class="col-md-12 col-sm-12">
        <div class="row">
         
         @foreach($wallets as $wallet)
            <div class="col-md-4 col-sm-4 ">
              <div class="row dbackground">
                <p class="dicon center-block">
                  <i class="fa fa-list-alt fa-5x"></i>
                </p>
                <a href="/wallet-view"><p class="dtext"> {{ $wallet->wallet_name }} - {{ $wallet->balance }}</p></a>
              </div>
            </div>
        @endforeach

           
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