      <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{url('/')}}"> <span> <img src="/img/logo.png" alt=""></span> Transfer Rules</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="hidden-lg hidden-lg-up">
                <a href="/dashboard">
                <i class="fa fa-dashboard fa-lg"></i> Dashboard
                </a>
              </li>  
                <li  class="hidden-lg hidden-lg-up">
                <a href="/wallet-view">
                <i class="fa fa-tasks fa-lg"></i> Wallet View
                </a>
              </li>  
                <li  class="hidden-lg hidden-lg-up">
                <a href="/transfer-to-wallet">
                <i class="fa fa-tasks fa-lg"></i> Wallet Transfer
                </a>
              </li>  
                <li  class="hidden-lg hidden-lg-up">
                <a href="transfer-to-bank">
                <i class="fa fa-bank fa-lg"></i> Bank Transfer
                </a>
              </li>  
                <li  class="hidden-lg hidden-lg-up">
                <a href="{{ url('/logout') }}">
                <i class="fa fa-dashboard fa-lg"></i> Logout
                </a>
              </li>
              @if(Auth::user())
              </li>  
                <li  class="hidden-lg hidden-lg-up">
                <a href="{{ url('/dashboard') }}">
                <i class="fa fa-dashboard fa-lg"></i> Dashboard
                </a>
              </li>
              @endif

              @if(Auth::user()->isAdmin())
              </li>  
                <li  class="hidden-lg hidden-lg-up">
                <a href="{{ url('/admin') }}">
                <i class="fa fa-dashboard fa-lg"></i> Dashboard
                </a>
              </li>
              @endif
              <li><a href="#" style="color:white; font-size:18px;"><i class="fa fa-user"></i>  </a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>


