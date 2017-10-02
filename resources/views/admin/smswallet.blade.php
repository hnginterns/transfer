@extends('layouts.admin')

@section('content')

<a class="flwpug_getpaid" data-PBFPubKey="FLWPUBK-832fd55bf568237a65fd571ee6d8a649-X" data-txref="rave-checkout-1506546533" data-amount="" data-customer_email="profchydon@gmail.com" data-currency = "NGN" data-pay_button_text = "Fund Sms Wallet" data-country="NG" data-custom_title = "Transferrules" data-custom_description = "" data-redirect_url = "" data-custom_logo = "" data-payment_method = "both" data-exclude_banks=""></a>

	<section class="content">
      <!-- Small boxes (Stat box) -->

      @foreach ($smswalletdetails as $smswalletdetail)

      <div class="col-md-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>SMS Wallet</h3>
            <p>{{ $smswalletdetail['username'] }}</p>
            <p>Balance: {{ $smswalletdetail['balance'] }}</p>
          </div>
          <div class="icon">
            <i class="fa fa-envelope"></i>
          </div>
          <a href="{{ url('/admin/managewallet') }}" class="small-box-footer">Top up <i class="fa fa-arrow-circle-right"></i></a>

        </div>
      </div>
        <!-- ./col -->

      @endforeach


  </section>



@endsection
