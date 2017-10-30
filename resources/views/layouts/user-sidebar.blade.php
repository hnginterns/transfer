<body style="background-color:#E6E6FA">
  
          <ul class="nav nav-sidebar">
          <br>
   
             
              <li>
                <a href="{{route('user.dashboard')}}">
                <i class="fa fa-dashboard fa-1x"></i> Dashboard
                </a>
              </li> <br>


              <li>
                <a href="{{route('user.phonetopup')}}">
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
