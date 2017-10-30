@extends('layouts.admin')
@section('title', 'Dashboard')
@section('subtitle', 'Control Panel')

@section('content')

<?php

$totalusers = count($users);
$totalwallets = count($wallets);
$totalcontacts = count($contacts);
$totalbeneficiaries = count($beneficiaries);

?>
  

	<section class="content">
  
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$totalwallets}}</h3>

              <p>Total Wallets</p>
            </div>
            <div class="icon">
              <i class="fa fa-briefcase"></i>
            </div>
            <a href="{{ url('/admin/managewallet') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

          </div>
        </div>
        <!-- ./col -->



      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$totalusers}}</h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{url('admin/users')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-orange">
            <div class="inner">
              <h3>{{$totalcontacts}}</h3>

              <p>Total Phone Topup Contacts</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{route('topup.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->


        <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$totalbeneficiaries}}</h3>

              <p>Total Beneficiaries</p>
            </div>
            <div class="icon">
              <i class="fa fa-user-plus"></i>
            </div>
            <a href="{{url('admin/users')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->



  </section>



@endsection
