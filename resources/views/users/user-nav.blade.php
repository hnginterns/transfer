  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('transferrules') }}"> <span> <img src="/img/logo.png" alt=""></span> Transfer Rules</a>
        <button type="button" id="navb" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
          aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>

      <ul class="nav navbar-nav">
        <li><a href="#" style="color:white; font-size:18px;"><i class="fa fa-dashboard"></i> @yield('content') </a></li>
      </ul>
      <ul class="nav navbar-nav pull-right">
        <li><a href="#" style="color:white; font-size:18px;"><i class="fa fa-user"></i> {{ Auth::user()->email }} </a></li>
      </ul>
  </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2" style="text-align: left;" id="sidebar" >
        <i class="fa fa-window-close" id="close" aria-hidden="true"></i>
        <ul class="nav nav-stacked">
          <li class="side-items active">
            <a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard</a>
          </li>
          <li class="side-items">
            <a href="/wallet-view" class="side-item"><i class="fa fa-google-wallet"></i> Wallet View</a>
          </li>
          <li class="side-items">
            <a href="/transfer-to-wallet" class="side-item"><i class="fa fa-tasks"></i> Wallet Transfer</a>
          </li>
          <li class="side-items">
            <a href="/transfer-to-bank" class="side-item"><i class="fa fa-bank"></i> Bank Transfer</a>
          </li>
          <li class="side-items">
            <a href="/banks" class="side-item"><i class="fa fa-bank"></i> Banks</a>
          </li>
          <li>
            <a href="{{ url('/logout') }}">
            <i class="fa fa-sign-out"></i> Logout
            </a>
          </li>
        </ul>
      </div>
