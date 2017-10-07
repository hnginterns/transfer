@extends('layouts.user')

@section('title')
      View Wallet
@endsection
@section('content')

<link rel="stylesheet" href="/css/walletview.css">

            <div class="col-md-4 col-sm-4">
              
              @if (!empty($permit))
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
                        <h2>Nigeria Naira</h2>
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

          <div class="orange-box"><h4 class="title" align="center"> {{ $wallet->wallet_name }} Beneficiaries</h4></div>

          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Bank</th>
                  <th>Account Number</th>
                   <th>Wallet</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>

              @foreach ($beneficiaries as $beneficiary)
                <tr>
                  <td>{{ $beneficiary->name }}</td>
                  <td>{{ $beneficiary->bank_name }}</td>
                  <td>{{ $beneficiary->account_number }}</td>
                  <td>{{ $beneficiary->wallet_id }}</td>
                  <td>{{ $beneficiary->created_at }}</td>
                </tr>
              @endforeach
              
                </tr>               
              </tbody>
            </table>

            {{ $beneficiaries->links() }}
          </div>
          

          <div class="col-sm-12">  
		  	  
            	<a href="{{ route('ravepay.pay', $wallet->id)}}" class="btn btn-dark">Fund</a>
			
			@if(!array_key_exists('can_transfer_from_wallet', $rules)) 
            <a href="/transfer-to-bank/{{$wallet->id}}" class="btn btn-dark ">Transfer To Beneficiary</a>
			@endif

      <a href="/transfer-to-wallet" class="btn btn-dark ">Transfer to Another Wallet </a>

      @if(!array_key_exists('can_add_beneficiary', $rules))
       		 <a href="/addbeneficiary/{{$wallet->id}}" class="btn btn-dark ">Add Beneficiary</a>
			@endif

          </div>
		</div>

    @else

              <p> You do not have permission to view this wallet</p>

     @endif
		
    
  @endsection
