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
  <button type="submit" class="btn btn-success" name="button"> Back</button>
  <br>  <br>
        <div class="single-beneficiary-holder col-md-6">
            <div class="inner-holder">
                  <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <h4 class="beneficiary-name">beneficiary 1 Details</h4>
                      </thead>
                      <tbody>
                      <tr>
                        <td>Beneficiary Name:</td>
                        <td>beneficiary 1</td>
                      </tr>
                      <tr>
                        <td>Bank:</td>
                        <td>204537357</td>
                      </tr>
                      <tr>
                        <td>Account Number:</td>
                        <td>User 1</td>
                      </tr>
                      <tr>
                        <td></td>
                        <td></td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
              <!-- /.table-responsive -->
            </div>
          </div>
    </div>

</div>

@endsection
