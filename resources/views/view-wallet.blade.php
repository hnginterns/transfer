@extends('layouts.user')

@section('title')
      View Wallet
@endsection
@section('content')

<link rel="stylesheet" href="/css/walletview.css">

            <div class="col-md-5 col-sm-5">
              <div class="col-sm-12">
                <svg width="285" height="288" viewBox="0 0 285 288" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                <title>Wallet logo</title>
                <desc>Created using Figma</desc>
                <g id="Canvas" transform="translate(-26279 3570)">
                <g id="Wallet logo">
                <use xlink:href="#path0_fill" transform="translate(26279 -3570)" fill="#25313F"/>
                </g>
                </g>
                <defs>
                <path id="path0_fill" d="M 284.055 144C 284.055 223.529 220.467 288 142.027 288C 63.5878 288 0 223.529 0 144C 0 64.471 63.5878 0 142.027 0C 220.467 0 284.055 64.471 284.055 144Z"/>
                </defs>
                </svg>
              </div>
                  
                  
                  <div class="row">    
                    <button id="" type="submit" class="btn btn-primary center-block">Fund</button>
                     
                    <button id="" type="submit" class="btn btn-primary center-block">Add Beneficiary</button>
                  </div>

            </div>

          <div class="col-md-7 col-sm-7">
					<div class="orange-box"><h4 class="title" align="center">TRANSACTION HISTORY</h4></div><br>
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
		</div>
		
    
  @endsection
