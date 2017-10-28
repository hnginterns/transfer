      <nav class="navbar navbar-inverse navbar-fixed-top">
       <div class="navbar-header"><br>
        &nbsp;&nbsp;&nbsp;<a href="{{url('/')}}">  <img src="/img/HNGlogo.png" alt=""></a>
        <button type="button" class="navbar-toggle collapsed" style="color:#fff; background:#39689C;" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>    
     
          </div>
         
          <div class="" id="">
          <form class="">
          <ul class="nav nav-sidebar">
          <br>
   
             
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

             @if(Auth::user()->first_name !== null || Auth::user()->last_name !== null)
                  {{ Auth::user()->first_name.' '.Auth::User()->last_name }}
             @else
                  {{ Auth::user()->username }}
             @endif
            <i class="fa fa-user-circle-o"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           </form>
           </div>
    </nav>


