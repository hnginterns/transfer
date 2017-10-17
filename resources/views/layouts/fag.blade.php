<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transfer Rules</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery.js"></script>
    <!-- Custom styles for this template -->
    <link href="css/custom2.css" rel="stylesheet">
    <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <style>
        body {
            font-family: 'Nunito Sans', sans-serif;
            padding: 0px;
            margin: 0px;
        }
        #section-1,
        #section-2,
        #spacer,
        #footer {
            margin-top: 90px;
        }
        #header {
            width: 100%;
            height: 650px;
             /* background-image: url("http://preview.ibb.co/iqedKQ/37158e6ed6bb6bbfb6a114f2810c6361_houston_usa_bank_of_america.jpg");   */
            background-image: url("https://preview.ibb.co/n9dyok/Group.png");
            /* background: #333333;  */
            background-size: 100% 650px;
            background-repeat: no-repeat;
            /* background-size: 650px;  */
           
        }
        #logo {
    
            height: 40px;
            margin-right: 15px;
            margin-left: 50px;
        }
        .navbar {
            margin: 0px;
            padding-top: 0px !important;
            padding: 0px;
            background: transparent;
            width: 100%;
            border-radius: 0px;
            border: none;
            color: white;
        }
        .navbar-brand,
        .navbar-nav a {
            color: white !important;
            font-size: 17px;
            margin-right: 15px;
        }
        .navbar-brand {
            margin-top: -13px;
            font-size: 19px;
            font-weight: bold;
            letter-spacing: 0.04em;
        }
        .navbar-nav {
            margin-right: 20px;
        }
        .navbar-nav .active > a {
            background: transparent !important;
            border: 2px solid white;
            border-radius: 10px;
            padding: 5px 10px;
            margin-top: 9px;
            margin-right: 19px;
        }
        #sign-in {
            margin-top: 9px;
            /* background: #E57679; */
            background: #00aeff;
            border-radius: 63px;
            padding-left: 12px;
            padding-right: 12px;
        }
        #sign-in a  {
            padding: 7px 14px;
        }
        #header-content {
            color: white;
            position: absolute;
            left: 40%;
            top: 40%;
        }
        #main-text {
            font-size: 26px;
            font-weight: bold;
        }
        #sub-text {
            font-size: 18px;
        }
        /* SECTION 1 STYLES */
        #about {
            display: flex;
            flex-direction: row;
            padding: 0px 180px;
        }
        #about p {
            font-size: 16px;
        }
        #about img {
            width: 250px;
            height: 250px;
            margin-right: 90px;
        }
        #about #heading {
            font-size: 26px !important;
            font-weight: bold;
            text-transform: uppercase;
            color: #00aeff;
        }
        #about-text {
            padding-right: 300px;
            align-self: flex-start;
        }
        /* SPACER STYLES */
        #spacer {
            text-align: center;
            color: white;
            background: #333333;
            padding: 60px 30px;
        }
        #spacer #heading {
            font-size: 26px;
            font-weight: bold;
            text-transform: uppercase;
        }
        #spacer #sub-heading {
            font-size: 16px;
        }
        #sponsors img {
            width: 300px;
            height: 80px;
            margin: 50px 30px;
        }
        /* SECTION 2 STYLES */
        #section-2 {
            text-align: center;
            display: flex;
            flex-direction: row;
            padding: 0px 200px 0px 400px;
            margin-bottom: 140px;
        }
        #section-2 #heading {
            font-size: 22px;
            font-weight: bold;
            text-transform: uppercase;
        }
        #section-2 #sub-heading {
            font-size: 17px;
        }
        #get-started {
            transition: color 2s, background 1s;
            box-shadow: 0px 2px 2px #333300;
            border: none;
            padding: 12px 20px;
            margin-top: 70px;
            font-weight: bold;
            background: #00aeff;
            color: white;
        }
        #get-started:hover {
            background: white;
            color: #00aeff;
        }
        #section-2 img {
            width: 200px;
            height: 300px;
            /* position: absolute;
            right: 20%; */
        }
        #section-2 p {
            margin-bottom: 0px !important;
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
        /* FOOTER STYLE ENDS */
        /* RESPONSIVE STYLES */
        @media (max-width: 1250px) {
            #about {
                display: flex;
                flex-direction: row;
                padding: 0px 80px;
            }
            #about p {
                font-size: 16px;
            }
            #about img {
                width: 250px;
                height: 250px;
                margin-right: 90px;
            }
            #about #heading {
                font-size: 26px !important;
                font-weight: bold;
                text-transform: uppercase;
            }
            #about-text {
                padding-right: 200px;
                align-self: flex-start;
            }
        }
        @media (max-width: 900px) {
            #about {
                display: flex;
                flex-direction: row;
                padding: 0px 50px;
            }
            #about p {
                font-size: 16px;
            }
            #about img {
                width: 250px;
                height: 250px;
                margin-right: 90px;
            }
            #about #heading {
                font-size: 26px !important;
                font-weight: bold;
                text-transform: uppercase;
            }
            #about-text {
                padding-right: 50px;
                align-self: flex-start;
            }
        }
        @media (max-width: 650px){
            #header-content {
                color: white;
                position: static;
                margin-top: 150px;
                padding: 0px 20px;
                text-align: center;
            }
            #about {
                display: flex;
                flex-direction: row;
                padding: 0px 10px;
            }
            #about p {
                font-size: 16px;
            }
            #about img {
                display: none;
                width: 150px;
                height: 150px;
                margin-right: 90px;
                margin-top: 50px;
            }
            #about #heading {
                font-size: 26px !important;
                font-weight: bold;
                text-transform: uppercase;
            }
            #about-text {
                padding-right: 20px;
                align-self: flex-start;
                text-align: center;
            }
            #sponsors img {
                width: 200px;
                height: 60px;
                margin: 20px 20px;
            }
            /* SECTION 2 STYLES */
            #section-2 {
                text-align: center;
                display: block;
                flex-direction: column;
                padding: 0px 10px 0px 10px;
                margin-bottom: 240px;
            }
            #section-2 #heading {
                font-size: 16px;
                font-weight: bold;
                text-transform: uppercase;
            }
            #section-2 #sub-heading {
                font-size: 17px;
                margin-bottom: 100px;
            }
            #get-started {
                transition: color 2s, background 1s;
                box-shadow: 0px 2px 2px #333300;
                border: none;
                padding: 12px 20px;
                margin-top: 70px;
                font-weight: bold;
                background: #00aeff;
                color: white;
                display: block;
                float: left;
                /* position: absolute;
                left: 10%; */
            }
            #get-started:hover {
                background: white;
                color: #FF6200;
            }
            #section-2 img {
                display: block;
                width: 150px;
                height: 150px;
                /* position: absolute; */
                /* right: 10%; */
                float: right;
                /* position: absolute;
                right: 10%;  */
                margin-top: 35px;
                margin-bottom: 100px;
            }
            #section-2 p {
                margin-bottom: 0px !important;
            }
            #footer {
                display: none;
            }
            #mobile-footer {
                display: block;
                margin-top: 100px;
                text-align: center;
                width: 100%;
            }
            #mobile-footer td {
                padding: 0px 20px !important;
            }
            #mobile-footer tr {
                width: 100%;
            }
            #footer-links,
            #footer-heading {
                display: flex;
                flex-direction: row;
                flex-grow: 4;
            }
            /* #footer-links,
            #footer-heading {
                width: calc(100% * (1/4) - 10px - 1px);
            } */
        }
    </style>
</head>
<body>
<!-- HEADER BEGINS -->
<div id="">
    

    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><img id="logo" src="/img/HNGlogo.png" alt="TransferRules logo" style="display: inline;"></a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li ><a href="{{url('/')}}">Home</a></li>
                    <li class="{{ Request::segment(1) === 'how' ? 'active' : null }}" ><a href="{{route('how')}}">FAQs</a></li>
                    <li class="{{ Request::segment(1) === 'features' ? 'active' : null }}"><a href="{{route('features')}}">Features</a></li>
                    <li class="{{ Request::segment(1) === 'about' ? 'active' : null }}"><a href="{{route('about')}}">About<span class="sr-only">(current)</span></a></li>

                    @if(Auth::guest())
                        <li id="sign-in"><a href="{{url('/login')}}">Sign In</a></li>
                    @else
                        <li id="sign-in">
                        <a href="{{ url('/logout') }}">
                            Logout
                        </a>
                      </li>

                          @if(Auth::user()->isAdmin())
                          </li>  
                            <li  class="hidden-lg hidden-lg-up">
                            <a href="{{ url('/admin') }}">
                            <i class="fa fa-dashboard fa-lg"></i> Admin Dashboard
                            </a>
                          </li>
                            @else

                            <li id="sign-in">
                            <a href="{{ url('/dashboard') }}">
                                Dashboard
                            </a>
                          </li>

                          @endif

                      

                    @endif




                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>

    <div id="header-content">
        <p id="main-text"> @yield('main-text') </p>
        <p id="sub-text"> @yield('sub-text')
        </p>
    </div>
</div>

<!--HEADER ENDS -->


<!-- SECTION ONE BEGINS -->

@yield('content')

<!-- FOOTER -->

<div id="footer">
    <div id="footer-links">
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{route('about')}}">About Us</a></li>
        <li><a href="{{route('privacy')}}">Privacy Policy</a></li>

        <li><a href="{{route('features')}}">How it works</a></li>
        <li><a href="{{route('contact')}}">Contact Us</a></li>
   

        <li><a href="{{route('help')}}">Help & Support</a></li>
        <li><a href="{{url('login')}}">Sign In</a></li>
        <li><a href="{{route('how')}}">FAQs</a></li>
        <li><a href="{{route('terms')}}">Terms & Condition</a></li>
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
            <td><a href="{{route('contact')}}">Contact Us</a></td>
        </tr>
        <tr>
            <td><a href="{{route('how')}}">How it works</a></td>
            <td><a href="{{route('contact')}}">Contact Us</a></td>
            <td><a href="{{route('help')}}">Help & Support</a></td>
        </tr>
        <tr>
            <td><a href="{{route('terms')}}">Terms & Condition</a></td>
            <td><a href="{{route('privacy')}}">Privacy Policy</a></td>
          
        </tr>
    </table>
    <p id="line"> </p>
    <div id="lower-footer">
        <p>&#169; 2017 Transferrules.com. All rights reserved</p>
    </div>
</div>

<!-- FOOTER ENDS -->

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
