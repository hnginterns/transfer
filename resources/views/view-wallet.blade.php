@extends('layouts.user')

@section('title')
      View Wallet
@endsection
@section('content')

<link rel="stylesheet" href="/css/walletview.css">

            <div class="col-md-4 col-sm-4">
              
              <div class="col-sm-12 text-center">
                  <p>Wallet Name</p>
                  <h2>{{ $wallet->wallet_name }}</h2>
              </div>   
               <br>
               <div class="col-sm-12 text-center">
                  <p>Wallet ID</p>
                  <h2>{{ $wallet->lock_code }}</h2>
               </div> 
              </br>
               <div class="col-sm-12 text-center">
                    <p>Currency Type</p>
                    <h2>{{ $wallet->currency }}</h2>
               </div>
                <br><br>
               <div class="col-sm-12 text-center">
                    <p>Balance</p>
                    <h2>{{ $wallet->balance }}</h2>
               </div>
                                 

            </div>

          <div class="col-md-8 col-sm-8">
					<div class="orange-box"><h4 class="title" align="center"> {{ $wallet->wallet_name }} TRANSACTION HISTORY</h4></div><br>
          <div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th>Transaction Type</th>
									<th>Transaction Amount</th>
									<th>Transaction Date</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>								
							</tbody>
						</table>
					</div>
          
          <div class="col-sm-12">    
            <a href="/ravepay" class="btn btn-dark">Fund</a>

            <a href="/transfer-to-wallet" class="btn btn-dark ">Transfer</a>
              
            <a href="/addbeneficiary" class="btn btn-dark ">Add Beneficiary</a>
          </div>
		</div>
		
    
  @endsection
