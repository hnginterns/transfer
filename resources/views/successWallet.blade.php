@extends('layouts.user')

@section('title')
      Transfer to Wallet
@endsection
@section('content')

<style>
        body {
            font-family: 'Nunito Sans', sans-serif;
        }

        .modal-header {
             border-bottom: 2px solid #828282; 
        }

        .modal-body {
            border-bottom: none;
        }

        .modal-body {
            text-align: center;
        }

        .modal-body h4 {
            color: #00AEFF;
            font-weight: bold;
            font-size: 16px;
        }

        .modal-title {
            text-align: center;
            font-weight: bold;
            color: #00AEFF;
        }

        table {
            text-align: left;
            width: 100%;
        }
        .table>tr{
            border:0px;
        }

        td {
            padding: 10px 30px;
        }

        tr > td:first-child {
            font-weight: bold;
        }

        .text-orange{
            color: #00AEFF;
            text-align: left;
        }

        button {
            float: left;
            transition: color 2s, background 1s;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);
            border-radius: 63px;
            padding:6px 15px;
            background: #00AEFF;
            color: white;
            border: none;
        }

        .modal-footer button:hover {
            background: white;
            color: #00AEFF;
        }
    </style>

@if(Session::has('status'))
@php($data = Session::get('status'))
<div class="col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2">
            <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title">TRANSFER RULES</h3>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <h4>YOUR TRANSACTION WAS SUCCESSFUL</h4>
            </div>

            <div class="table-responsive">
               <table class="table">
                 <tbody>
                   <tr><td><b>Merchant/sender Name</b></td><td> {{$data['username']}}</td></tr>
                   <tr><td><b>sender wallet/account</b></td><td> {{$data['source_wallet']}}</td></tr>
                   <tr><td><b>Beneficiary/Receiver Wallet</b></td><td>{{$data['recipient_wallet']}}</td></tr>
                   <tr><td><b>Transaction Date/Time</b></td><td>{{$data['time']}}</td></tr>
                   <tr><td><b>Narration</b></td><td>Wallet Transfer</td></tr>
                   <tr><td><b>Amount</b></td><td>&#8358; {{$data['amount']}}</td></tr>
                 </tbody>
               </table>
            </div>

            <div class="col-sm-12">
            <p class="text-orange">Click print to print receipt for reference </p>
            </div>

             <!-- Modal Header -->
          
              <button onclick="printPage()">Print</button>
          
</div>
<script>
            function printPage() {
                window.print();
            }
            </script>
@endif
@endsection