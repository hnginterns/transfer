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
    tr>td{
      color: white;
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

      .single-wallet-holder.col-sm-3 {
          margin-bottom: 20px;
          padding: 0px;
      }
    }
</style>

@extends('layouts.admin')

@section('content')


<div class="container-fluid">
  <a href="/admin/managewallet">
  <button type="submit" class="btn btn-info" name="button">Back</button>
  </a>
  <br> <br>
        <div class="single-wallet-holder col-sm-6">
            <div class="inner-holder">
                  <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <h4 class="wallet-name">{{ $wallet->wallet_name }} Details</h4>
                      </thead>
                      <tbody>
                      <tr>
                        <td>Wallet Name:</td>
                        <td>{{ $wallet->wallet_name }}</td>
                      </tr>
                      <tr>
                        <td>Wallet Lock Code:</td>
                        <td>{{ $wallet->lock_code }}</td>
                      </tr>
                      <tr>
                      <tr>
                        @foreach($transaction as $transact)
                       <!-- @if($transact['uref'] == $wallet->wallet_code) -->
                        <td>User Balance:</td>
                        <td>{{ $transact['balance'] }}</td>
                         <!--  @endif -->
                        @endforeach

                      </tr>
                      <tr>
                        <td>User ref:</td>
                        <td>{{ $wallet->wallet_code }}</td>
                      </tr>
                      <tr>
                        <td>Currency:</td>
                        <td>Nigerian Naira</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
              <!-- /.table-responsive -->
                @if($wallet->archived == 0)
                  <a href="/admin/{{ $wallet->id }}/archivewallet" type="submit" class="btn btn-md btn-danger">{{ 'Archive Wallet' }}</a>
                @else
                  <a href="/admin/{{ $wallet->id }}/activatewallet" type="submit" class="btn btn-md btn-success">{{ 'Activate Wallet' }}</a>
                @endif
            </div>
          </div>

    </div>

</div>

@endsection
