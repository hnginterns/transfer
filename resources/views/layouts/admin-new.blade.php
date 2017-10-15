<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'TransferRules') }} - Hotels.ng 2017 Remote Software Intership Project</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
  <!-- Stylesheets -->      
  <link rel="stylesheet" id="css-main" href="assests/css/codebase.min.css">

  @yield('added_css')

</head>

<div id="page-container" class="sidebar-inverse side-scroll page-header-fixed main-content-boxed">

          @include('admin.partials.header')

             <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content content-full">
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
                                        <i class="si si-envelope-open fa-3x text-primary"></i>
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
                      <div class="col-md-4">
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
                                        
                                        <div class="pt-20">
                                            <a class="btn btn-rounded btn-alt-info" href="{{ url('/admin/managePermission') }}">
                                                <i class="fa fa-check mr-5"></i> Manage Permissions
                                            <i class="si si-wallet fa-4x text-primary"></i>
                                        </div>
                                        <div class="pt-20">
                                            <a class="btn btn-rounded btn-alt-primary" href="{{ url('/admin/managewallet') }}">
                                                <i class="fa fa-cog mr-5"></i> Manage Wallet
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
<<<<<<< HEAD
                                            <i class="fa fa-users fa-4x text-success"></i>
                                        </div>
                                        <div class="pt-20">
                                            <a class="btn btn-rounded btn-alt-success" href="{{ url('/admin/users') }}">
                                                <i class="fa fa-arrow-up mr-5"></i> Manage Users
=======
                                            <i class="fa fa-users fa-4x text-info"></i>
                                        </div>
                                        
                                        <div class="pt-20">
                                            <a class="btn btn-rounded btn-alt-info" href="{{ url('/admin/managePermission') }}">
                                                <i class="fa fa-check mr-5"></i> Manage Permissions
>>>>>>> 78139cc4b3d8e1d66093b35ea62e3e5885431a8f
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


             <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                        Crafted with <i class="fa fa-heart text-pulse"></i> by <a class="font-w600" href="http://hng.fun" target="_blank">Hotels.ng Remote Software Developer Interns </a>
                    </div>
                    <div class="float-left">
                        <a class="font-w600" href="https://goo.gl/po9Usv" target="_blank">TransferRules 0.7</a> &copy; <span class="js-year-copy">2017</span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Codebase Core JS -->
        <script src="assests/js/core/jquery.min.js"></script>
        <script src="assests/js/core/popper.min.js"></script>
        <script src="assests/js/core/bootstrap.min.js"></script>
        <script src="assests/js/core/jquery.slimscroll.min.js"></script>
        <script src="assests/js/core/jquery.scrollLock.min.js"></script>
        <script src="assests/js/core/jquery.appear.min.js"></script>
        <script src="assests/js/core/jquery.countTo.min.js"></script>
        <script src="assests/js/core/js.cookie.min.js"></script>
        <script src="assests/js/codebase.js"></script>
    </body>
</html>