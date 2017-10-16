@extends('layouts.user')
@section('title', 'Dashboard')
@section('content')

      <div class="col-md-12 col-sm-12">
        <div class="row">
            @foreach($wallet as $key => $wallets)

                <div class="col-md-4 col-sm-4 ">
                  <div class="row dbackground">
                    <p class="dicon center-block">
                      <i class="fa fa-money fa-5x"></i>
                    </p>
                    <a href="{{route('user.wallet.detail', $wallets->id)}}"><p class="dtext"> {{ $wallets->wallet_name }} - {{ $wallets->balance }}</p></a>
                  </div>
                </div>
            @endforeach
        </div>
      </div>

<style>
  .dbackground{
    background:#39689C;
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
    color: white;
  }

</style>
@endsection      
