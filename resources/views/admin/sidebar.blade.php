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

      <li>
        <a href="{{ url('/admin/users') }}"><i class="fa fa-group"></i> <span>Manage Users</span></a>
      </li>

       <li>
        <a href="{{ url('/admin/view-rules') }}"><i class="fa fa-plus"></i> <span>Manage Rules</span></a>
      </li>
      <li><a href="{{ url('/admin/managewallet') }}"><i class="fa fa-briefcase"></i> <span>Manage Wallet</span></a></li>
      <li><a href="{{ url('/admin/beneficiary') }}"><i class="fa fa-dollar"></i> <span>Beneficiary</span></a></li>
      <li><a href="{{ url('/admin/analytics') }}"><i class="fa fa-line-chart"></i> <span>Transaction Analytics<span></a></li>
      <li><a class="flwpug_getpaid" data-PBFPubKey="FLWPUBK-832fd55bf568237a65fd571ee6d8a649-X" data-txref="rave-checkout-1506546533" data-amount="" data-customer_email="profchydon@gmail.com" data-currency = "NGN" data-pay_button_text = "Fund Wallet" data-country="NG" data-custom_title = "Transferrules" data-custom_description = "" data-redirect_url = "" data-custom_logo = "" data-payment_method = "both" data-exclude_banks="">Fund Wallet</a></li>
      <li>
        <li>
        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                     <i class="fa fa-sign-out" aria-hidden="true"></i>
                      <span> Logout</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            <input type="hidden" name="rdr" value="/admin/logout" placeholder="">
        </form>
      </li>

    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>

<script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
