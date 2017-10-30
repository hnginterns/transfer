    <nav class="navbar navbar-inverse navbar-fixed-top">
       <div class="navbar-header"><br>
        &nbsp;&nbsp;&nbsp;<a href="{{url('/')}}">  <img src="{{   URL::asset('img/HNGlogo.png')  }}" alt=""></a>
        <button type="button" class="navbar-toggle collapsed" style="color:#fff; background:#39689C;" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>    
            
          </div>
         
          <div class="collapse navbar-collapse" id="navbar">

          


          <form class="navbar-form navbar-right navform">
          <ul>
        
   
       
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
