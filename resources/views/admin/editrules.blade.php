<style media="screen">
    .inner-holder {
        background: #222d32;
        color: #b8c7ce;
        padding: 13px 15px;
        border-radius: 3px;
    }

    .rule-radio-label{
        padding-right: 30px;
    }

    form{
        margin-left: 10px;
        margin-right: 10px;
    }


    .wallet-container {
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

    .wallet-row.row {
      margin-bottom: 30px;
    }

    h5.wallet-name {
      margin-bottom: 20px;
    }

    @media screen and (max-width:768px) {

      .single-wallet-holder.col-md-3 {
          margin-bottom: 20px;
          padding: 0px;
      }
    }
</style>

@extends('layouts.admin')

@section('content')


<div class="container-fluid">

  <div class="wallet-container">

      <div class="wallet-row row">
        <div class="single-wallet-holder col-md-6">
            <div class="inner-holder">
                  <h5 class="wallet-name"><b>Update</b> Rule</h5>
                  
                  <form action="{{ route('update-rule') }}" method="POST" class="form-horizontal" role="form">
                    {{csrf_field()}}
                    <div class="form-group">
                        <input type="hidden" name="rule_id" value="{{ $rule->id }}">
                        <input type="text" name="rule_name" id="rule_name" class="form-control" value="{{ $rule->rule_name }}" placeholder="Enter Rule Name" required="required" title="Rule name">
                    </div>

                    <div class="form-group">
                        <input type="number" name="max_amount" id="max_amount" class="form-control" value="{{ $rule->max_amount }}" placeholder="Enter maximum transfer amount" required="required" title="Maximum Amount">
                    </div>

                    <div class="form-group">
                        <input type="number" name="min_amount" id="min_amount" class="form-control" value="{{ $rule->min_amount }}" placeholder="Enter minimum transfer amount" required="required" title="Minimum Amount">
                    </div>

                    <div class="form-group">
                        <input type="number" name="max_transactions_per_day" id="max_transactions_per_day" class="form-control" value="{{ $rule->max_transactions_per_day }}" placeholder="Enter maximum transactions per day" required="required" title="Rule name">
                    </div>

                    <div class="form-group">
                        <input type="number" name="max_amount_transfer_per_day" id="max_amount_transfer_per_day" class="form-control" value="{{ $rule->max_amount_transfer_per_day }}" placeholder="Enter maximum Amount to Transfer per day" required="required" title="Rule name">
                    </div>
                    
                    
                         
                        <div class="radio">
                           Can Transfer
                            <span class="rule-radio-label"></span>
                            <input type="radio" name="can_transfer" value="1" id="can_transfer" {{ $rule->can_transfer ? "checked" : "" }}>
                             <span class="rule-radio-label">YES</span>
                             <input type="radio" name="can_transfer" value="0" id="can_transfer" {{ $rule->can_transfer ? "" : "checked" }}>
                            <span class="rule-radio-label">NO</span>
                        
                        </div>

                        
                        <div class="radio">
                          Can Transfer External  
                            <span class="rule-radio-label"></span>
                            <input type="radio" name="can_transfer_external" value="1" id="can_transfer_external" {{ $rule->can_transfer_external ? "checked" : "" }} >
                             <span class="rule-radio-label">YES</span>
                             <input type="radio" name="can_transfer_external" value="0" id="can_transfer_external" {{ $rule->can_transfer_external ? "" : "checked" }} >
                            <span class="rule-radio-label">NO</span>
                        
                        </div>

                        
                    

                    <br><button type="submit" class="btn btn-info" name="button"><i class="fa fa-refresh" aria-hidden="true"> Update</i></button>
                    <a href="/admin/view-rules" style="padding:10px;" class="btn btn-danger" name="button"><i class="fa fa-times" aria-hidden="true"> Cancel</i></a>
           
                  </form>
                  
            </div>
        </div>
      </div>

    </div>

</div>

@endsection
