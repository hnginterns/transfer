<style media="screen">
    .inner-holder {
        background: #222d32;
        color: #b8c7ce;
        padding: 13px 15px;
        border-radius: 3px;
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

  <div class="wallet-container">

      <div class="wallet-row row">
        <div class="single-wallet-holder col-md-6">
            <div class="inner-holder">
                  <h5 class="wallet-name"><b>Create</b> New Wallet</h5>
                  <form action="" method="POST" role="form">
                  {{csrf_field()}}
                  <input type="text" name="wallet_name" class="form-control input-defaulted" placeholder="Wallet Name">
                  <br><select name="type" class="form-control input-defaulted">
                          <option value="topup">Topup Wallet</option>
                          <option value="regular">Regular Wallet</option>
                          <option value="sms">Sms Wallet</option>
                      </select>
                  <br><input type="text" name="lock_code" class="form-control input-defaulted" placeholder="Wallet Lock Code">
                  <input type="hidden" name="user_ref" class="form-control input-defaulted" value="{{$user_ref}}" placeholder="User Reference">
                  <br><select name="currency_id" class="form-control input-defaulted" >
                    <option value="1">Nigerian Naira</option>
                    <option value="2">Kenyan Shilling</option>
                    <option value="3">Ghanaian Cedi</option>
                    <option value="4">US Dollar</option>
          				</select>
                  <br><button type="submit" class="btn btn-info" name="button"><i class="fa fa-plus" aria-hidden="true"> Create</i></button>
            </div>
        </div>
      </div>

    </div>

</div>

@endsection
