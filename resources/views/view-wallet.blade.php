@extends('layouts.user')

@section('title')
      View Wallet
@endsection
@section('content')

<style>

i.can{
        color: #00a65a;
        
    }

    i.cannot{
      color: #dd4b39;
    }

i.sent{
        color: #00a65a;
        filter: blur(10px);
        -webkit-filter: blur(10px);
        z-index:-1
        
    }

    em.sent{
        opacity: 0.5
        z-index:-1
        
    }

    i.received{
      color: #dd4b39;
    }
</style>

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
                  <th>State</th>
									<th>Transaction Amount</th>
									<th>Transaction Date</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
              @foreach($history as $key => $hist)
								<tr>
									<td>{{ $hist['transaction_type'] }} </td>
                  <td>{{ $hist['transaction_state'] }}</td>
									<td>{{ $hist['transaction_amount'] }} </td>
									<td>{{ $hist['transaction_date'] }}</td>
									<td><i class="fa {{ $hist['transaction_status'] ? 'fa-check-circle can' : 'fa-times-circle cannot' }}" aria-hidden="true"></i></td>
								</tr>
                @endforeach
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
			
 
            <a href="/transfer-to-bank/{{$wallet->id}}" class="btn btn-dark ">Transfer To Beneficiary</a>
			

      <a href="/transfer-to-wallet" class="btn btn-dark ">Transfer to Another Wallet </a>

		 <div class="container">
    <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add Beneficiary</button>
  
  

			

          </div>
		</div>

    @else

              <p> You do not have permission to view this wallet</p>

     @endif
		
    
  @endsection
