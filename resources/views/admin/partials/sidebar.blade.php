<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="https://adminlte.io/themes/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</p>
           <a href="#"> {{ Auth::user()->email }}</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li>
          <a href="#">
            <i class="fa fa-th"></i> <span>Admins</span>
            
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Manage Users</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Users</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Roles</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Permissions</a></li>   
          </ul>
        </li>

        <li>
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Transactions</span>
            
          </a>
        </li>
	
	<li class="treeview">
          <a href="#">
            <i class="fa fa-credit-card"></i>
            <span>Manage Wallets</span>
            <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('wallets.index')}}"><i class="fa fa-circle-o"></i> Wallets</a></li>
            <li><a href="{{ route('beneficiaries.index') }}"><i class="fa fa-circle-o"></i> Beneficiaries</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Wallet History</a></li>   
          </ul>
        </li>

        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>