<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ config('app.name', 'TransferRules') }} - Hotels.ng 2017 Remote Software Intership Project Admin</title>
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

                  @yield('content')

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