<style media="screen">
    .inner-holder {
        background: #222d32;
        color: #b8c7ce;
        padding: 13px 15px;
        border-radius: 3px;
    }
    .beneficiary-container {
      padding: 10px;
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

    .beneficiary-row.row {
      margin-bottom: 30px;
    }

    h5.beneficiary-name {
      margin-bottom: 20px;
    }

    @media screen and (max-width:768px) {

      .single-beneficiary-holder.col-md-3 {
          margin-bottom: 20px;
          padding: 0px;
      }
    }
</style>

@extends('layouts.admin')

@section('content')


<div class="container-fluid">

  <div class="beneficiary-container">

      <div class="beneficiary-row row">
        <div class="single-beneficiary-holder col-md-6">
            <div class="inner-holder">
                <h3 class="beneficiary-name">Permissions</h3><hr>
                <form action="" method="POST">
                  {{ csrf_field() }}
                  
                  <div class="form-group">
                    <label>Select User</label>
                    <select id="" name="uuid" class="form-control">
                    @foreach($user as $key => $users)
                      <option value="{{$users->id}}">{{$users->email}}</option>
                    @endforeach
                    </select>
                  </div> 

                  <div class="form-group">
                   <!-- <label>Add wallet</label> -->
                    <select id="" name="wallet_id" class="form-control">
                     <option value="none"> Select Wallet</option>
                      @foreach($wallet as $key => $wallets)
                      <option value="{{$wallets->id}}">{{$wallets->wallet_name}}</option>
                      @endforeach
                    </select>
                  </div> 

                  <div class="form-group">
                    <label>Maximum Amount</label>
                    <input type="number" name="max_amount" class="form-control" required placeholder="Maximum Amount">                  
                  </div> 

                  <div class="form-group">
                  <label>Minimum Amount</label>
                    <input type="number" name="min_amount" class="form-control" required placeholder="Minimum Amount">                  
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="can_transfer_from_wallet" id="">Can Transfer From Wallet
                    </label>
                  </div> 

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="can_fund_wallet" id="">Can Fund Wallet
                    </label>
                  </div> 

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="can_add_beneficiary" id="">Can Add Beneficiary
                    </label>
                  </div> 
                  @foreach($wallet as $key => $wallets)
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="{{$wallets->id}}" name="can_transfer_to_wallets[]" id="">Can Transfer To {{$wallets->wallet_name}}('s) wallet
                    </label>
                  </div> 
                  @endforeach

                  <br><button type="submit" class="btn btn-info" name="button">Add Permissions</button>
                  <a type="button" href="{{config('app.url')}}/admin/managePermission" class="btn btn-danger">Cancel</a>
                 </form>                
            </div>
        </div>
      </div>

    </div>

</div>

@endsection
