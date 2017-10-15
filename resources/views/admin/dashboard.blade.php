@extends('layouts.admin')
@section('title', 'Dashboard')
@section('subtitle', 'Control Panel')

@section('content')
  
 <div class="row gutters-tiny invisible" data-toggle="appear">

                        <!-- Row #1 -->
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-rotate block-transparent text-right bg-primary-lighter" href="{{ url('/admin/managewallets') }}">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-bag fa-3x text-primary"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-primary-darker" data-toggle="countTo" data-speed="1000" data-to="{{count($wallets)}}">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-primary-dark">Total Wallets</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-rotate block-transparent text-right bg-primary-lighter" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-wallet fa-3x text-primary"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-primary-darker">&#8358;<span data-toggle="countTo" data-speed="1000" data-to="{{$wallets->sum('balance')}}">0</span></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-primary-dark">Total Balance</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-rotate block-transparent text-right bg-primary-lighter" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-shuffle fa-3x text-primary"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-primary-darker" data-toggle="countTo" data-speed="1000" data-to="15">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-primary-dark">Total Transfers</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-rotate block-transparent text-right bg-primary-lighter" href="{{ url('/admin/users') }}">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-users fa-3x text-primary"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600 text-primary-darker" data-toggle="countTo" data-speed="1000" data-to="{{count($users)}}">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-primary-dark">Total Users</div>
                                </div>
                            </a>
                        </div>
                        <!-- END Row #1 -->
                    </div>
                    <div class="row gutters-tiny invisible" data-toggle="appear">
                        <!-- Row #3 -->
                        <div class="col-md-8">
                            <div class="block">
                                <div class="block-content block-content-full">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <i class="si si-wallet fa-4x text-primary"></i>
                                        </div>
                                        <div class="pt-20">
                                            <a class="btn btn-rounded btn-alt-primary" href="{{ url('/admin/managewallet') }}">
                                                <i class="fa fa-cog mr-5"></i> Manage Wallets
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="block">
                                <div class="block-content block-content-full">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <i class="fa fa-users fa-4x text-info"></i>
                                        </div>
                                        
                                        <div class="pt-20">
                                            <a class="btn btn-rounded btn-alt-info" href="{{ url('/admin/managePermission') }}">
                                                <i class="fa fa-check mr-5"></i> Manage Permissions
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- END Row #3 -->
                    </div>

@endsection
