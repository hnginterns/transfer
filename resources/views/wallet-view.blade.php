@extends('layouts.user')

@section('title')
     wallet View
@endsection
@section('content')

<link rel="stylesheet" href="/css/walletview.css">

		<div class="col-md-4 col-sm-4">
							<div class="wallet-details">
								<h4 class=""> Wallet Name <small>Payement wallet</small></h4>
								<h4 class="">Wallet Ref:  <small>226232</small></h4>
								<h4 class="">Wallet Code <small>sw2121</small></h4>
								<h4 class="">Currency Type <small>NGN</small></h4>
								<h4 class="">Balance: <small>2000</small></h4>
							</div>
		</div>

		<div class="col-md-8 col-sm-8">
					<div class="orange-box"><h4 class="title" align="center">TRANSACTION HISTORY</h4></div>
						<table class="table" style="width:100%;">
							<thead>
								<tr>
									<th>Trans id</th>
									<th>Trans Amount</th>
									<th>Trans Date</th>
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
							</tbody>
						</table>
						<div align="center">
						   <a href="transfer-to-wallet" class="btn btn-default btn-edit">Transfer to Wallet</a><a href="transfer-to-bank" class="btn btn-default btn-edit">Transfer to Bank</a><button class="btn btn-default btn-edit">DKGIU</button><button class="btn btn-default btn-edit">RKSNBT</button>
						</div>
					</div>
		</div>
		

@endsection