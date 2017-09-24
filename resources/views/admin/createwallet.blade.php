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
                  <input type="text" name="wallet_name" class="form-control input-defaulted" placeholder="Wallet Name">
                  <br><input type="text" name="lock_code" class="form-control input-defaulted" placeholder="wallet Lock Code">
                  <br><select name="user" class="form-control input-defaulted" >
                    <option value="1">Select Wallet User</option>
                    <option value="1">User 2</option>
                    <option value="1">User 3</option>
          				</select>
                  <br><input type="text" name="user_ref" class="form-control input-defaulted" placeholder="User Reference">
                  <br><select name="currency" class="form-control input-defaulted" >
                    <option value="1">Nigerian Naira</option>
                    <option value="2">Kenyan Shilling</option>
                    <option value="3">Ghanaian Cedi</option>
                    <option value="4">US Dollar</option>
          				</select>
                  <br><button type="submit" class="btn btn-success" name="button"><i class="fa fa-plus" aria-hidden="true"> Create</i></button>
            </div>
        </div>
      </div>

    </div>

</div>

@endsection
