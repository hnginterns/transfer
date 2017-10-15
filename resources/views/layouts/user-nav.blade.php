      <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
        <a class="navbar-brand" href="{{url('/')}}">  <img src="/img/logo3.png" alt="Hotels.Ng"><span></span></a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          
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
              <li><a href="#" style="color:#39689C; font-size:18px;"><i class="fa fa-user"></i>  </a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
            <!-- Right Section -->
                    <div class="content-header-section">

                      <!-- User Dropdown -->
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}<i class="fa fa-angle-down ml-5"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right min-width-150" aria-labelledby="page-header-user-dropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="si si-user mr-5"></i> Profile
                                </a>

                                 <a class="dropdown-item" href="#">
                                    <i class="si si-speech mr-5"></i> Help
                                </a>
                               
                                <div class="dropdown-divider"></div>
                               
                                <a href="{{ route('logout') }}" class="dropdown-item"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           <i class="si si-logout mr-5"></i> Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                            </div>
                        </div>
                        <!-- END User Dropdown -->
          </form>
        </div>
      </div>
    </nav>


