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
    
    tr>td {
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
        .single-wallet-holder.col-md-3 {
            margin-bottom: 20px;
            padding: 0px;
        }
    }
</style>

@extends('layouts.admin')

@section('content')


<div class="container-fluid">
    
    <br>
    <div class="single-wallet-holder col-md-12">
        <div class="inner-holder">
            <div class="box-body">
                <div class="table-responsive">

                    <table class="table no-margin">

                        <thead>
                            <h4 class="wallet-name">Rules</h4>
                        </thead>

                        <tr style="color: white;">
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Can Transfer</th>
                            <th>Can Make Ext. Transfer</th>
                            <th>Max. Amt. per Transfer</th>
                            <th>Min. Amt. per Transfer</th>
                            <th>Max. Transactions per day</th>
                            <th>Max. Amt. Transfer Per day</th>
                        </tr>
                        @foreach($rules as $key => $rule)
                        <tbody>
                            <tr>
                                <td>{{ $key + 1}}</td>
                                <td>{{ $rule->rule_name }}</td>
                                <td>{{ $rule->can_transfer ? "Yes" : "No" }}</td>
                                <td>{{ $rule->can_transfer_external ? "Yes" : "No" }}</td>
                                <td>{{ $rule->max_amount }}</td>
                                <td>{{ $rule->min_amount }}</td>
                                <td>{{ $rule->max_transactions_per_day }}</td>
                                <td>{{ $rule->max_amount_transfer_per_day }}</td>
                                <td><a href="{{ route('edit-rule', $rule->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                            </tr>
                        </tbody>
                        {{--  {{ $i++ }}  --}}
                       @endforeach
                    </table>
                </div>
                <!-- /.table-responsive -->
            </div>
        </div>
    </div>

</div>

@endsection