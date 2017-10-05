<style media="screen">
    .inner-holder {
        background: #222d32;
        color: #b8c7ce;
        padding: 13px 15px;
        border-radius: 3px;
    }
    .beneficiary-container {
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
                    <!-- <options>--Select user--</options> -->
                    @foreach($user as $key => $users)
                      <options value="{{$users->id}}">{{$users->email}}</options>
                    @endforeach
                    </select>
                  </div> 

                  <div class="form-group">
                   <!-- <label>Add wallet</label> -->
                    <select id="" name="" class="form-control">
                      @foreach($wallet as $key => $wallets)
                      <options value="{{$wallets->id}}">{{$wallets->wallet_name}}</options>
                      @endforeach
                    </select>
                  </div> 

                  <div class="form-group">
                    <label>Maximum Amount</label>
                    <input type="number" name="" class="form-control" placeholder="Maximum Amount">                  
                  </div> 

                  <div class="form-group">
                  <label>Minimum Amount</label>
                    <input type="number" name="" class="form-control" placeholder="Minimum Amount">                  
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="" id="">Can Transfer From Wallet
                    </label>
                  </div> 

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="" id="">Can Fund Wallet
                    </label>
                  </div> 

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="" id="">Can Add Beneficiary
                    </label>
                  </div> 

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="" id="">Can Transfer To Wallets
                    </label>
                  </div> 


                  <br><button type="submit" class="btn btn-info" name="button">Add Permissions</button>
                  <button type="button" class="btn btn-danger" name="button">Cancel</button>
                </form>                
            </div>
        </div>
      </div>

    </div>

</div>

@endsection
