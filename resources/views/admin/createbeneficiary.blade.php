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
        <div class="single-beneficiary-holder col-md-6 col-sm-6">
            <div class="inner-holder">
                  <h4 class="intro text-left" >Add New Beneficiary to {{$wallet->wallet_name}}</h4>
                  <form action="" method="POST" class="input-form">
                  {{csrf_field()}}
                
                 
                    <!--Add Beneficiary  Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ADD SMS ACCOUNT</h4>
        </div>
        <div class="modal-body">
          <p>Please fill out your details</p>
          <form role="form" class="submit-topup">
                {{ csrf_field() }}
                <!-- text input -->
                <div class="form-group">                  
                  <label>Beneficiary Name</label>
                  <input type="text" required name="name" class="form-control input-defaulted" placeholder="Name">
                </div>

                 <div class="form-group">                   
                  <label>Bank</label>
                  <select name="bank_id" required class="form-control input-defaulted" >
                    <option>Select Bank</option>

                  @foreach(App\Http\Controllers\BanksController::getAllBanks() as $key => $bankcode)
                  <option value="{{$bankcode->id}}||{{$bankcode->bank_name}}">{{ $bankcode->bank_name }}</option>
                  @endforeach
                  </select>
                </div>

                 <div class="form-group">
                    <label>Account Number</label>
                    <input type="text" required name="account_number" class="form-control input-defaulted" placeholder="Account Number">
                 </div>

                  <div class="form-group ">
                    <button type="submit" class="btn btn-success pull-right" name="button"> Add</button><br>
                  </div>
              </form>
          </div>
      </div>
    </div>
</div>

@endsection
