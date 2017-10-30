<style media="screen">
    .inner-holder {
        background: #39689C ;
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

    i.can{
        color: #00a65a;
        
    }

    i.cannot{
      color: #dd4b39;
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

  <a type="button" class="btn btn-info" href="{{ route('permission.create')}}" name="button"> Add Permission</i></a>
  <a type="button" class="btn btn-link" href="{{ route('admin.dashboard')}}" name="button">back</i></a>

  <div class="wallet-container">

    <div class="wallet-row row">
    @foreach($restriction as $key => $restrictions)
      @if($restrictions->user != null)
        <a href="editpermission/{{$restrictions->id}}" style="padding-bottom: 20px;" class="single-wallet-holder col-md-3 col-xs-12 col-sm-6">
            <div class="inner-holder">
                  <h5 class="wallet-name"><b>Username : </b> {{ $restrictions->user->username }}</h5>
                  <h5 class="wallet-name"><b>Wallet Name : </b> {{ $restrictions->wallet->wallet_name }}</h5>
                  <h5 class="wallet-name"><b>Can fund Wallet:&nbsp; </b> <i class="fa {{$restrictions->can_fund_wallet ? 'fa-check-circle can' : 'fa-times-circle cannot'}}"></i></h5> 
                  <h5 class="wallet-name"><b>Can Add Beneficiary :&nbsp; </b> <i class="fa {{$restrictions->can_add_beneficiary ? 'fa-check-circle can' : 'fa-times-circle cannot'}}"></i></h5> 
                  <h5 class="wallet-name"><b>Can Transfer From Wallet :&nbsp; </b> <i class="fa {{$restrictions->can_transfer_from_wallet ? 'fa-check-circle can' : 'fa-times-circle cannot'}}"></i></h5> 
            
            </div>
        </a>
        @endif
        @endforeach
      </div>
      {{$restriction->links()}}
  </div>

</div>

@endsection
