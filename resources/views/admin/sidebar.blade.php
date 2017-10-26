<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
        <i class="fa fa-user" style="font-size: 50px;color:#fff"></i>
      </div>
      <div class="pull-left info">
        <p></p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success" ></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">ADMIN CONTROLS</li>
      <!-- Optionally, you can add icons to the links -->
    <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li>
        <a href="{{ url('/admin/users') }}"><i class="fa fa-group"></i> <span>Manage Users</span></a>
      </li>
       <li>
        <a href="{{ url('/admin/managePermission') }}"><i class="fa fa-plus"></i> <span>Manage Permission</span></a>
      </li>
      <li><a href="{{ url('/admin/managewallet') }}"><i class="fa fa-briefcase"></i> <span>Manage Wallet</span></a></li>
      <!--<li><a href="{{ url('/admin/analytics') }}"><i class="fa fa-line-chart"></i> <span>Transaction Analytics<span></a></li>-->
      <li><a href="{{ url('/admin/smswallet') }}"><i class="fa fa-envelope"></i> <span>SMS Wallet</span></a></a></li>
      <li><a href="{{ url('/admin/phonetopup') }}"><i class="fa fa-money"></i> <span>Phone Top-up Wallet</span></a></a></li>
      
      <li>
        <li>
        <a href="{{ url('/logout') }}">
            <i class="fa fa-sign-out" aria-hidden="true"></i>
            <span> Logout</span>
        </a>
      </li>

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

<script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
