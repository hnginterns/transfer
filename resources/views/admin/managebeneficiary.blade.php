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

    tr>td {
        color: white;
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

  <a type="button" class="btn btn-info" href="addbeneficiary" name="button"><i class="fa fa-plus" aria-hidden="true"> Add beneficiary</i></a>

  <div class="beneficiary-container">

      <div class="beneficiary-row row">

        <div class="single-beneficiary-holder col-md-12">
            <div class="inner-holder">
            <div class="table-responsive">

                    <table class="table no-margin">

                        <thead>
                            <h4 class="wallet-name">Beneficiary</h4>
                        </thead>

                        <tr style="color: white;">
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Bank</th>
                            <th>Account Number</th>
                            <th></th>
                            <th></th>
                        </tr>

                        <tbody>
                        @php($i = 1)
                        @foreach($beneficiaries as $key => $beneficiary)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{ $beneficiary->name }}</td>
                                <td>{{ $beneficiary->bank_name }}</td>
                                <td>{{ $beneficiary->account_number }}</td>
                                <td><a href="{{config('app.url')}}/admin/editbeneficiary/{{$beneficiary->id}}"><i class="fa fa-pencil-square-o" aria-hidden="true"><span</span></i> </a></td>
                                <td><a href="{{config('app.url')}}/admin/deletebeneficiary/{{$beneficiary->id}}"><i class="fa fa-trash" aria-hidden="true"></i><span> </span> </a></td>
                            </tr>
                        @php($i++)
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>


      </div>
  </div>

</div>

@endsection
