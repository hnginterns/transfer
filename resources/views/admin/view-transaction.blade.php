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

        <div class="row">
        <br>

        <div class="col-md-3 col-sm-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">

              <h3 class="profile-username text-center">Name: {{ $wallet->wallet_name }}</h3>

              <p class="text-muted text-center">Rule: 2 | Status: {{ $wallet->archived == 0 ? 'Active' : 'Archived' }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Total Balance</b> <a class="pull-right">N{{ $wallet->balance }}</a>
                </li>
                <li class="list-group-item">
                  <b>Total Beneficiaries</b> <a class="pull-right">{{ count($beneficiaries) }} </a>
                </li>
                <li class="list-group-item">
                  <b>Reference Code</b> <a class="pull-right">{{ $wallet->wallet_code }}</a>
                </li>

                <li class="list-group-item">
                 <a href="{{ route('wallets.manualfund', $wallet->id)}}" class="btn btn-warning">Fund Wallet</a>
                </li>
                
                <li class="list-group-item">
                  <a href="{{route('permission.create')}}" class="btn btn-info" >Add Permission</a>
                </li>
              </ul>


              <br>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>

        <!-- /.col -->
        <div class="col-md-9 col-sm-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#beneficiaries" data-toggle="tab">Beneficiaries</a></li>
              <li><a href="#history" data-toggle="tab">Transaction History</a></li>
              <li><a href="#users" data-toggle="tab">Users</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="beneficiaries">
              
              @if(!empty($beneficiaries))
                <table class="table">
                    <thead>
                        <tr>
                          <th>Name</th>
                          <th>Account Number</th>
                          <th>Bank</th>
                          <th >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                      @forelse ($beneficiaries as $beneficiary)
                      <tr>
                        <td style="color: #595757;">{{ $beneficiary->name }}  {{$beneficiary->id}}</td>
                        <td style="color: #595757;">{{ $beneficiary->bank_name }}</td>
                        <td style="color: #595757;">{{ $beneficiary->account_number }}</td>
                        <td>
                          
                              <a href="{{ route('beneficiaries.delete', $beneficiary->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to archive this beneficiary?')">Archive</a>
                            </td>
                      </tr>

                      @empty
                        <p> No Beneficiaries has been added to this wallet.</p>
                      @endforelse
                      
                    </tbody>

                </table>
              @else
              <h2> No Beneficiaries has been added to this wallet yet </h2>
            @endif


              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="history">

               <table class="table">
                    <thead>
                        <tr>
                          <th>Transfered by</th>
                          <th>Amount</th>
                          <th>Payment Ref</th>
                          <th>Date</th>
                          
                        </tr>
                    </thead>

                    <tbody>
                      @forelse ($transactions as $transaction)
                      <tr>
                        <td style="color: #595757;">{{ $transaction->firstName }}  {{$transaction->lastName}}</td>
                        <td style="color: #595757;">{{ $transaction->amount }}</td>
                        <td style="color: #595757;"><a href="#">{{ $transaction->ref }}</a></td>
                        <td style="color: #595757;">{{ $transaction->created_at }}</td>

                      @empty
                        <p> No Transactions has taken place on this wallet</p>
                      @endforelse
                      
                    </tbody>

                </table>

              </div>

              <!-- /.tab-pane -->
              <div class="tab-pane" id="users">

            @if(!empty($users))
               <table class="table">
                    <thead>
                        <tr>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>User Name</th>
                          <th colspan="2">Email </th>
                        </tr>
                    </thead>

                    <tbody style="color: #595757;">
                      @forelse($users as $user)
                      <tr>
                        <td style="color: #595757;"> {{ $user->first_name }}</td>
                        <td style="color: #595757;"> {{ $user->last_name }}</td>
                        <td style="color: #595757;"> {{ $user->username }}</td>
                        <td style="color: #595757;"> {{ $user->email }}</td>
                      </tr>
                      @empty
                        <p> No User has been attached to this wallet.</p>
                      @endforelse
                    </tbody>

                </table>
            @else
              <h2> No user has been attached to this wallet yet </h2>
            @endif

              </div>



              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
<!-- /.col -->

</div>

@endsection
