<body style="background-color:#E6E6FA">
  
          <ul class="nav nav-sidebar">
          <br>
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
<li class="header">USER CONTROLS</li>
             
              <li>
                <a href="/dashboard">
                <i class="fa fa-dashboard fa-1x"></i> Dashboard
                </a>
              </li> <br>


              <li>
                <a href="/phonetopup">
                <i class="fa fa-mobile fa-2x"></i> Phone TopUp
                </a>
              </li> <br>
              
                         
             
                                
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
</div>

<div class="container">
                            
                        </div>
