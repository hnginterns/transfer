<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Wallet Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>

  <style>
    @import url('https://fonts.googleapis.com/css?family=Nunito+Sans');
    body {
      font-family: Nunito Sans;
    }

    nav {
      border-radius: 0 !important;
    }

    .menu {
      padding-top: 22px;
    }

    .menu-item {
      color: white;
      text-decoration: none !important;
    }

    .menu ul {
      display: flex;
      list-style: none;
    }

    .menu li {
      margin: 0 10px;
      width: 141px;
      height: 52px;
      padding: 10px 10px;
      background-color: #FD8032;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 4px;
    }

    .wallet-container {
      display: flex;
      flex-wrap: wrap;
      padding-top: 35px;
      justify-content: center;
    }

    .wallet {
      position: relative;
      width: 324px;
      height: 150px;
      background: #333333;
      margin: 15px;
    }

    .wallet .currency {
      position: absolute;
      width: 41px;
      height: 21px;
      left: 280px;
      top: 2px;


      font-style: normal;
      font-weight: bold;
      line-height: normal;
      font-size: 17px;
      letter-spacing: 0.68px;

      color: #FFFFFF;
    }

    .wallet-img {
      position: absolute;
      width: 63px;
      height: 77px;
      left: 130px;
      top: 33px;
    }

    .wallet .id {
      position: absolute;
      height: 14px;
      left: 5px;
      top: 130px;
      color: white;
    }

    .wallet .num {
      position: absolute;
      left: 7px;
      top: 5px;
      color: white;
    }

    .wallet .balance {
      position: absolute;
      width: 115px;
      left: 225px;
      top: 125px;
      color: white;
    }

    .profile {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: gray;
      margin-top: 4px;
    }

    .profile-info{
      color: white;
      padding: 5px;
      line-height: 5.5px;
      margin-top: 10px;
    }
  </style>
</head>
<<<<<<< HEAD
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>R</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>TR</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the messages -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!-- User Image -->
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <!-- Message title and timestamp -->
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <!-- The message -->
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                </ul>
                <!-- /.menu -->
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- /.messages-menu -->

          <!-- Notifications Menu -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li><!-- start notification -->
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks Menu -->
          <li class="dropdown tasks-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- Inner menu: contains the tasks -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <!-- Task title and progress text -->
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <!-- The progress bar -->
                      <div class="progress xs">
                        <!-- Change the css width attribute to simulate progress -->
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Alexander Pierce</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Admin - Tranfer Rules
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin TR</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
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
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Manage Users</span></a></li>
        <li><a href="#"><i class="fa fa-link"></i> <span>Manage wallets</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Users
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Default Box Example</h3>
          <div class="box-tools pull-right">
            <!-- Buttons, labels, and many other things can be placed here! -->
            <!-- Here is a label for example -->
            <span class="label label-primary">Label</span>
          </div>
          <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          The body of the box
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          The footer of the box
        </div>
        <!-- box-footer -->
      </div>
      <!-- /.box -->
      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
=======

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">TransferFunds</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
        <li>
          <div class="profile"></div>
        </li>
        <li>
          <div class="profile-info">
            <p>Mr John Doe</p>
            <p>Log Out</p>
          </div>
        </li>
      </ul>
>>>>>>> ce28d3122e8bf66badf9080744e59fb1a9f16a8f
    </div>
  </nav>

  <div class="container">
    <div class="menu">
      <ul>
        <li>
          <a href="" class="menu-item">Wallets</a>
        </li>
        <li>
          <a href="" class="menu-item">Transactions</a>
        </li>
        <li>
          <a href="" class="menu-item">Pay Bills</a>
        </li>
        <li>
          <a href="" class="menu-item">Lorem</a>
        </li>
        <li>
          <a href="" class="menu-item">Lorem</a>
        </li>
        <li>
          <a href="" class="menu-item">Accounts</a>
        </li>
        <li>
          <a href="" class="menu-item">Lorem</a>
        </li>
      </ul>
    </div>
    <div class="wallet-container">
      <div class="wallet">
        <p class="num">001</p>
        <p class="currency">NGN</p>
        <img src="img/wallet-i.svg" alt="" class="wallet-img">
        <p class="id">ID: 0125665</p>
        <div class="balance">₦5,263,200.00</div>
      </div>

      <div class="wallet">
        <p class="num">001</p>
        <p class="currency">NGN</p>
        <img src="img/wallet-i.svg" alt="" class="wallet-img">
        <p class="id">ID: 0125665</p>
        <div class="balance">₦5,263,200.00</div>
      </div>

      <div class="wallet">
        <p class="num">001</p>
        <p class="currency">NGN</p>
        <img src="img/wallet-i.svg" alt="" class="wallet-img">
        <p class="id">ID: 0125665</p>
        <div class="balance">₦5,263,200.00</div>
      </div>

      <div class="wallet">
        <p class="num">001</p>
        <p class="currency">NGN</p>
        <img src="img/wallet-i.svg" alt="" class="wallet-img">
        <p class="id">ID: 0125665</p>
        <div class="balance">₦5,263,200.00</div>
      </div>

      <div class="wallet">
        <p class="num">001</p>
        <p class="currency">NGN</p>
        <img src="img/wallet-i.svg" alt="" class="wallet-img">
        <p class="id">ID: 0125665</p>
        <div class="balance">₦5,263,200.00</div>
      </div>

      <div class="wallet">
        <p class="num">001</p>
        <p class="currency">NGN</p>
        <img src="img/wallet-i.svg" alt="" class="wallet-img">
        <p class="id">ID: 0125665</p>
        <div class="balance">₦5,263,200.00</div>
      </div>

      <div class="wallet">
        <p class="num">001</p>
        <p class="currency">NGN</p>
        <img src="img/wallet-i.svg" alt="" class="wallet-img">
        <p class="id">ID: 0125665</p>
        <div class="balance">₦5,263,200.00</div>
      </div>

      <div class="wallet">
        <p class="num">001</p>
        <p class="currency">NGN</p>
        <img src="img/wallet-i.svg" alt="" class="wallet-img">
        <p class="id">ID: 0125665</p>
        <div class="balance">₦5,263,200.00</div>
      </div>
    </div>
  </div>
</body>

</html>