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
                  <h5 class="beneficiary-name"><b>Create</b> New Beneficiary</h5>
                  <form action="" method="POST">
                  {{csrf_field()}}
                  <input type="text" name="name" class="form-control input-defaulted" placeholder="Name">
                  <br><select name="bank_id" class="form-control input-defaulted" >
                    <option>Select Bank</option>
                    @foreach(App\Http\Utilities\Bank::all() as $bankCode => $bankName)
                    <option value="{{$bankCode}}">{{$bankName}}</option>
                    @endforeach
                  </select>
                  <br><input type="text" name="account_number" class="form-control input-defaulted" placeholder="Account Number">
                  <br><button type="submit" class="btn btn-success" name="button"><i class="fa fa-plus" aria-hidden="true"> Create</i></button>
                </form>
            </div>
        </div>
      </div>

    </div>

</div>

@endsection
