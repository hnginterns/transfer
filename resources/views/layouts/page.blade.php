<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Transfer Rules</title>

    <link href="css/bootstrap.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">

    <link href="css/signin.css" rel="stylesheet">
    <link href="css/custom2.css" rel="stylesheet">

    <style>
        
       
        #footer {
            margin-top: 90px;
        }
       
        /* FOOTER STYLE */
        #mobile-footer {
            display: none;
        }
        #footer {
            text-align: center;
        }
        #footer-links,
        #footer-heading {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
        }
        #footer-links {
            grid-row-gap: 10px;
        }
        #footer-heading {
            margin-bottom: 20px;
        }
        #footer-heading a {
            text-transform: uppercase;
            font-weight: bold;
            color: #333333;
        }
        #footer-links a {
            color: #4F4F4F;
        }
        #footer li {
            list-style: none;
        }
        #line {
            height: 1px;
            width: 100%;
            padding: 0px 200px;
            background:  #BDBDBD ;
            margin: 30px 0px;
        }
        </style>
       </head>


<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid">



            <a class="navbar-brand" href="{{url('/')}}">

                <a class="navbar-brand" href="https://finance.hotels.ng/"><img src="img/logo.png" alt="logo"></a>

            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"

                aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>



            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">



                </ul>

                <ul class="navbar-nav">

                    <li class="nav-item">

                        <a class="nav-link" href="{{url('/')}}">Home

                            <span class="sr-only">(current)</span>

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="{{route('about')}}">About</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="{{route('how')}}">FAQs</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="{{route('features')}}">Features</a>

                    </li>


                   

                    <li class="nav-item active">

                    @if(Auth::guest())
                        <a class="nav-link" href="{{url('/login')}}">Sign In</a>
                    @else
                        
                        <a class="nav-link" href="{{ url('/logout') }}">
                            Logout
                        </a>
                      

                          @if(Auth::user()->isAdmin())
                          
                            <a class="nav-link" href="{{ url('/admin') }}"> Admin Dashboard </a>
                           
                            @else

                            
                            <a class="nav-link" href="{{ url('/dashboard') }}">
                                Dashboard
                            </a>
                          

                          @endif

                      

                    @endif


                    </li>

                </ul>

            </div>

        </div>

    </nav>

<main>

        <div class="container">

                    <br>
                    <br>

                <h3 class="sign-in">@yield('main-text')</h3>

        @yield('content')    
        

        </div>


    </main>


<div id="footer">
    <div id="footer-links">
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{route('about')}}">About Us</a></li>
      

        <li><a href="{{route('features')}}">Features</a></li>    
        
        <li><a href="{{url('login')}}">Sign In</a> </li>
        
    </div>
    <p id="line"> </p>
    <div id="lower-footer">
        <p>&#169; 2017 Transferrules.com. All rights reserved</p>
    </div>
</div>

<div id="mobile-footer">
    <table>
        <tr>
            <td style="font-size: 17px; font-weight: bold;">Company</td>
            <td style="font-size: 17px; font-weight: bold;">Support</td>
            <td style="font-size: 17px; font-weight: bold;">Terms</td>
        </tr>
        <tr>
            <td><a href="{{url('/')}}">Home</a></td>
            <td><a href="{{route('about')}}">About Us</a></td>
        </tr>
        <tr>
          
        </tr>
        <tr>
            
            
        </tr>
    </table>
    <p id="line"> </p>
    <div id="lower-footer">
        <p>&#169; 2017 Transferrules.com. All rights reserved</p>
    </div>
</div>

<!-- FOOTER ENDS -->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/script.js"></script>
</body>
</html>


