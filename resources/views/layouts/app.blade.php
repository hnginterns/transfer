<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/style.css')}}">
</head>
<body>
    <!-- HEADER BEGINS -->
    <div id="header"> 
    <p id="background-text">FUNDS</p>
        
        <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img id="logo" src="img/logo.png" alt="Company logo" style="display: inline;"> TransferRules</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
              <li><a href="#">FAQs</a></li>
              <li><a href="#">Features</a></li>
              <li><a href="#">Demo</a></li>

              @if(Auth::guest())
                <li id="sign-in"><a href="/signin">Sign In</a></li>
              @else
                <li id="sign-in">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
            @endif          
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

      <div id="header-content">
          <img src="img/phone.png" alt="Transfer rules mobile app screenshot" id="mobile-app">
          <div id="content-text" class="clearfix">
                <span id="heading-hd">
                    Create an account for your company with TransferRules
                </span>
                <span id="text-hd">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim 
                </span>
                <button id="button-hd">
                    DOWNLOAD APP
                </button>
          </div>
      </div>
    </div>

    <!--HEADER ENDS --> 

    <!-- SECTION ONE - (AMAZING FEATURES) --> 
    <div id="section1">
        <p class="section-header">
            Amazing Features
        </p>    
        <p class="section-sub">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim 
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim             
        </p>
        <div id="features">
            <img src="img/screenshots.png" alt="site screenshot" id="screenshots">
            <div id="features-list">
                <div class="feature">
                    <span class="feature-img"></span>
                    <span id="feature-heading">Get Payment <span class="fa fa-money features-icons"></span></span>
                    <span class="feature-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
                </div>
                <div class="feature">
                    <span class="feature-img"></span>
                    <span id="feature-heading">Manage Funds <span class="fa fa-money features-icons"></span></span>
                    <span class="feature-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
                </div>
                <div class="feature">
                    <span class="feature-img"></span>
                    <span id="feature-heading">Access Wallet <span class="fa fa-shopping-bag features-icons"></span></span>
                    <span class="feature-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
                </div>
                <div class="feature">
                    <span class="feature-img"></span>
                    <span id="feature-heading">Multiple User Access <span class="fa fa-users features-icons"></span></span>
                    <span class="feature-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit</span>
                </div>
            </div>
        </div>
    </div>
    <!-- SECTION ONE ENDS -->


     <!-- SECTION TWO - (TESTIMONIES) --> 
    <div id="section2">
        <p class="section-header">
            Testimonies
        </p>    
        <p class="section-sub">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
        </p>
        
        <div id="t-container">
            <div class="row">
                <div class="media col-md-6" id="media1">
                    <a class="pull-left" href="#">
                        <span class="media-object testimony-img"></span>                
                    </a>
                    <div class="media-body"> 
                        <h4 class="media-heading name">Name</h4>
                        <p class="testimony">Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="media col-md-12 pull-right" id="media2">
                    <a class="pull-right" href="#">
                        <span class="media-object testimony-img"></span>                
                    </a>
                    <div class="media-body"> 
                        <h4 class="media-heading name">Name</h4>
                        <p class="testimony">Lorem ipsum dolor sit amet, consectetur Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor i</p>
                    </div>
                </div> 
            </div>
        </div>
    </div>
     <!-- SECTION TWO ENDS -->    
     
    <!-- DIVIDER --> 
        <div id="divider">
            <div id="divider-content">
                <div id="divider-text">
                    <p id="divider-title">Imagine your companie's future</p>
                    <p id="">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor sit amet, consectetur adipiscing elit 
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, Lorem ipsum dolor sit amet, consectetur adipiscing
                    </p>
                </div>
                <button id="divider-cta">GET STARTED</button>
            </div>
        </div>
    <!-- DIVIDER ENDS-->

    <!-- FOOTER -->

    <div id="footer">
        <div id="footer-heading">
            <li><a href="#">Lorem ipsum dolor</a></li>        
            <li><a href="#">Lorem ipsum dolor</a></li>
            <li><a href="#">Lorem ipsum dolor</a></li>
            <li><a href="#">Lorem ipsum dolor</a></li> 
        </div>
        <div id="footer-links">
            <li><a href="#">Lorem ipsum dolor</a></li>        
            <li><a href="#">Lorem ipsum dolor</a></li>
            <li><a href="#">Lorem ipsum dolor</a></li>
            <li><a href="#">Lorem ipsum dolor</a></li> 
            <li><a href="#">Lorem ipsum dolor</a></li>        
            <li><a href="#">Lorem ipsum dolor</a></li>
            <li><a href="#">Lorem ipsum dolor</a></li>
            <li><a href="#">Lorem ipsum dolor</a></li> 
            <li><a href="#">Lorem ipsum dolor</a></li>        
            <li><a href="#">Lorem ipsum dolor</a></li>
            <li><a href="#">Lorem ipsum dolor</a></li>
            <li><a href="#">Lorem ipsum dolor</a></li>    
        </div>    
        <p id="line"> </p>
        <div id="lower-footer">
            <p>&#169; 2017 Transferrules.com. All rights reserved</p>
        </div>
    </div>

    <div id="mobile-footer">
      <table>
        <tr>
          <td style="font-size: 17px; font-weight: bold;">Heading</td>
          <td style="font-size: 17px; font-weight: bold;">Heading</td>
          <td style="font-size: 17px; font-weight: bold;">Heading</td>          
        </tr>
        <tr>
          <td>Link</td>
          <td>Link</td>
          <td>Link</td>          
        </tr>
        <tr>
          <td>Link</td>
          <td>Link</td>
          <td>Link</td>          
        </tr>
        <tr>
          <td>Link</td>
          <td>Link</td>
          <td>Link</td>          
        </tr>
      </table>
      <p id="line"> </p>
      <div id="lower-footer">
          <p>&#169; 2017 Transferrules.com. All rights reserved</p>
      </div>
    </div>

    <!-- FOOTER BEGINS -->
    <!--<script
        src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous">
    </script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('js/script.css')}}"></script>
</body>
</html>
