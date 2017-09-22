@extends('layouts.admin')

@section('content')

<!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <div class="row gutters-tiny invisible" data-toggle="appear">
                        <!-- Row #1 -->
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-bag fa-3x text-body-bg-dark"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="1500">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Total Wallets</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-wallet fa-3x text-body-bg-dark"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600">$<span data-toggle="countTo" data-speed="1000" data-to="780">0</span></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Total Balance</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-envelope-open fa-3x text-body-bg-dark"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="15">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Total Transfers</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-3">
                            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-users fa-3x text-body-bg-dark"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="4252">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Total Users</div>
                                </div>
                            </a>
                        </div>
                        <!-- END Row #1 -->
                    </div>
                   
                    <div class="row gutters-tiny invisible" data-toggle="appear">
                        <!-- Row #3 -->
                        <div class="col-md-4">
                            <div class="block">
                                <div class="block-content block-content-full">
                                    <div class="py-20 text-center">
                                        <div class="mb-20">
                                            <i class="si si-wallet fa-4x text-primary"></i>
                                        </div>
                                        <div class="pt-20">
                                            <a class="btn btn-rounded btn-alt-primary" href="javascript:void(0)">
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
                                            <a class="btn btn-rounded btn-alt-info" href="javascript:void(0)">
                                                <i class="fa fa-users mr-5"></i> Manage Beneficiaries
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
                                            <i class="fa fa-check fa-4x text-success"></i>
                                        </div>
                                        <div class="pt-20">
                                            <a class="btn btn-rounded btn-alt-success" href="javascript:void(0)">
                                                <i class="fa fa-arrow-up mr-5"></i> Manage Rules
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Row #3 -->
                    </div>
                    
                    
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
@endsection