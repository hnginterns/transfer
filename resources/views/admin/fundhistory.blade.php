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
  <h3>Card to Wallet Funding Transaction Details</h3>
      <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <th>id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Amount</th>
                <th>Reference</th>
                <th>Date</th>
            </thead>
        @foreach($cardWallets as $card)
            <tbody>
              <tr>
                <td>{{$card->id}}</td>
                <td>{{$card->firstName}}</td>
                <td>{{$card->lastName}}</td>
                <td>{{$card->phoneNumber}}</td>
                <td>{{$card->amount}}</td>
                <td>{{$card->ref}}</td>
                <td>{{$card->created_at->toDateString()}}</td>
              </tr>
            </tbody>
            @endforeach
        </table>
      </div>
        {{ $cardWallets->links() }}

    </div>
 

@endsection
