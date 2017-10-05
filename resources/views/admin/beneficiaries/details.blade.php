@extends('layouts.admin')
@section('title', 'Wallet Details')
@section('subtitle', 'Wallet Details')

@section('content')

      <div class="row">
        <br>

        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              
              <h3 class="profile-username text-center">Name: {{ $wallet->name }}</h3>

              <p class="text-muted text-center">Rule: {{ $wallet->rule_id }} | Status: {{ $wallet->status }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Total Balance</b> <a class="pull-right">N1,000</a>
                </li>
                <li class="list-group-item">
                  <b>Total Beneficiaries</b> <a class="pull-right">0</a>
                </li>
                <li class="list-group-item">
                  <b>Reference Code</b> <a class="pull-right">1{{ $wallet->ref_code }}</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </div>
        
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#beneficiaries" data-toggle="tab">Beneficiaries</a></li>
              <li><a href="#history" data-toggle="tab">Transaction History</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="beneficiaries">
                
                <table class="table">
                    <thead>
                        <tr>
                          <th>Name</th>
                          <th>Account Number</th>
                          <th>Account Name</th>
                          <th>Bank</th>
                          <th colspan="2" >Action</th>
                        </tr>
                    </thead>
                    
                </table>

              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="history">
                
               <table class="table">
                    <thead>
                        <tr>
                          <th>Name</th>
                          <th>Account Number</th>
                          <th>Account Name</th>
                          <th>Bank</th>
                          <th colspan="2" >Action</th>
                        </tr>
                    </thead>
                    
                </table>
                
              </div>
              

            
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      

    








    
</div>
</div>
@endsection