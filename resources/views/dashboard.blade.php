@extends('layouts.user')

@section('title')
      Dashboard
@endsection
@section('content')

      <div class="col-md-12 col-sm-12">
        <div class="row">
         
           
            
            <div class="wallet-container">

            <div class="wallet-row row">
            @foreach($wallets as $wallet)
                <a href="{{ route('view-wallet', $wallet->id) }}" class="single-wallet-holder col-md-3">
                    <div class="inner-holder">
                          <h5 class="wallet-name"><b>Wallet Name:</b> {{ $wallet->wallet_name }}</h5>
                          <h5 class="wallet-name"><b>Balance:</b> {{ $wallet->balance }}</h5>                  
                    </div>
                </a>
                @endforeach
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