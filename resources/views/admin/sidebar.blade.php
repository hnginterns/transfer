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
        <p>{{ $name }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success" ></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
          </span>
      </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">ADMIN CONTROLS</li>
      <!-- Optionally, you can add icons to the links -->
      
      <li>
        <a href="{{ url('/admin/users') }}"><i class="fa fa-group"></i> <span>Manage Users</span></a>
      </li>

       <li>
        <a href="{{ url('/admin/createrule') }}"><i class="fa fa-plus"></i> <span>Create Rules</span></a>
      </li>

       <li>
        <a href="{{ url('/admin/setrule') }}><i class="fa fa-group"></i> <span>Set Rules</span></a>
      </li>
      <li><a href="{{ url('/admin') }}"><i class="fa fa-briefcase"></i> <span>Manage Wallet</span></a></li>
      <li><a href="#"><i class="fa fa-dollar"></i> <span>Currencies</span></a></li>
      <li><a href="{{ url('/web-analytics') }}">Transaction Analytics</a></li>
      <li><a href="#"><i class="fa fa-eyedropper"></i> <span>Draft</span></a></li>
      <li><a href="#"><i class="fa fa-trash"></i> <span>Trash</span></a></li>
      <li><a hr
        <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </li>

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
