@extends('layouts.user')

@section('title')
      Add Beneficiary
@endsection
@section('content')

<link rel="stylesheet" href="/css/form.css">

<div class="container-fluid">

  <div class="beneficiary-container">

      <div class="beneficiary-row row">
        <div class="single-beneficiary-holder col-md-6 col-sm-6">
            <div class="inner-holder">
                  <h4 class="intro text-left" >Add New Beneficiary to {{$wallet->wallet_name}}</h4>
                  <form action="" method="POST" class="input-form">
                  {{csrf_field()}}
                
                 
                  <div class="form-group">                  
                    <label>Beneficiary Name</label>
                    <input type="text" required name="name" class="form-control input-defaulted" placeholder="Name">
                  </div>

                   <div class="form-group">                   
                    <label>Bank</label>
                    <select name="bank_id" required class="form-control input-defaulted" >
                      <option>Select Bank</option>
                      @foreach(.\App\Http\Controllers\BanksController::getAllBanks() as $bankcode)
                      <option value="{{$bankcode->id}}||{{$bankcode->bank_name}}">{{ $bankcode->bank_name }}</option>
                      @endforeach
                    </select>
                  </div>

                   <div class="form-group">
                      <label>Account Number</label>
                      <input type="text" required name="account_number" class="form-control input-defaulted" placeholder="Account Number">
                   </div>

                    <div class="form-group ">
                      <button type="submit" class="btn btn-success pull-right" name="button"> Add</button>
                    </div>
                </form>
            </div>
        </div>
      </div>

    </div>

</div>

@endsection
