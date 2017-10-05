<!-- Main Header -->
<header class="main-header" style="background-color: #25313F;">

  <!-- Logo -->
  <a href="{{ route('transferrules') }}" class="logo" style="background-color: #25313F;">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>T</b>R</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg" ><b>{{ config('app.name') }}</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" style="background-color: #25313F;" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu" style="background-color: #25313F;">
      <ul class="nav navbar-nav">
        <!-- User Account Menu -->
        <li class="dropdown user user-menu">
          <!-- Menu Toggle Button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <!-- The user image in the navbar-->
            <!--<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">-->
            <i class="fa fa-user" style="font-size: 25px;color:#fff"></i>
            <!-- hidden-xs hides the username on small devices so only the image appears. -->
            <span class="hidden-xs"></span>
          </a>
          <ul class="dropdown-menu">
            <!-- The user image in the menu -->
            <li class="user-header">
              <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
              <i class="fa fa-user" style="font-size: 50px;color:#fff"></i>

              <p>
               Transfer Rule Admin
              </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-right">
              <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                  onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                  Logout
              </a>
             
              </div>
            </li>
          </ul>
        </li>
        
      </ul>
    </div>
  </nav>
</header>
