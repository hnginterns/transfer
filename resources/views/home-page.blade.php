<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transfer Rules</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <style>

        /* HIDDEN ELEMENTS BY DEFAULT */
        .features-icons,
        #mobile-footer {
            display: none;
        }

        body {
            font-family: 'Nunito Sans', sans-serif;
            padding: 0px;
            margin: 0px;
        }

        #header {
            width: 100%;
            height: 650px;
            /* background: linear-gradient(180deg, #358CAA 1.49%, #F87373 98.73%); */
            /* background: #333333; */
            background-size: 100% 650px !important;
        }
        #logo {
            
            height: 40px;
            margin-right: 15px;
            margin-left: 50px;
        }

        .navbar {
            margin: 0px;
            padding-top: 30px !important;
            padding: 0px;
            background: transparent;
            width: 100%;
            border-radius: 0px;
            border: none;
            color: white;
        }
        .about{
            height:700px;
        }
        .about-content{
            width:70%;
            padding:20px;
            margin-top:20px;
            margin-bottom:-40px;
            margin-left:auto;
            margin-right:auto;
            z-index:1000 !important;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }
        .navbar-brand,
        .navbar-nav a {
            color: white !important;
            font-size: 17px;
            margin-right: 10px;
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
        }

        #sign-in {
            margin-top: 9px;
            /* background: #E57679; */
            color:#000000 !important;
            background: #FFFFFF !important;
            border: 1px solid #00AEFF !important;
            border-radius: 63px;
            padding-left: 12px;
            padding-right: 12px;
        }
        
        #sign-in a  {
            padding: 7px 14px;
            color: #000000 !important;
            display: block;
        }
        #sign-in:hover a{
            color:#00AEFF
        }


        /* HEADER BODY STYLE */
        #background-text {
            position: absolute;
            left: 5%;
            top: 30%;
            color: white;
            font-size: 300px;
            font-weight: bold;
            color: rgba(255, 255, 255, 0.04);
            z-index: 1;
        }

        #header-content {
            z-index: 200;
            width:100%;
            padding:20px;
        }

        #content-text {
            display: grid;
            grid-template-rows: 1fr 1fr 1fr;
            height: 300px;
            grid-gap: 5px;
            color: white;
        }

        #heading-hd {
            font-size: 23px;
            letter-spacing: 0.07em;
            padding-right: 100px;
        }
        #heading-top-hd{
                font-size: 64px;
                letter-spacing: 0.07em;
                padding-right: 0px;
                text-align:0;
            }

        #text-hd {
          padding-right: 100px;
          word-spacing: 0.09em;
          letter-spacing: 0.05em;
          z-index: 100;
          font-size: 16px;
          line-height: 25px;
        }

        #button-hd {
            width: fit-content;
            /* color: #E57679; */
            color: #39689C;
            border: none;
            background: #fff;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            padding: 10px 15px;
            border-radius: 63px;
            transition: background 1s, color 2s;
            z-index: 100;
        }

        #button-hd:hover {
            /* background: #2CACF0;
            color: #FFFFFF; */
            color: #FF6200;
            background: white;
        }

        #mobile-app {
            width: 250px;
            height: 500px;
        }

        /* HEADER BODY STYLE ENDS */

        /* SECTION ONE STYLE */
        #section1,
        #section2,
        #divider,
        #footer {
            text-align: center;
            margin-top: 30px;
        }

        .section-header {
            font-size: 36px;
            /* color: #3D8BA8; */
            color: #2CACF0;
        }

        .section-sub {
            font-size: 16px;
            letter-spacing: 0.06em;
        }

        #features {
            display: grid;
            grid-template-columns: 60% 40%;
            margin-top: 70px;
            padding: 0px 80px;
        }

        #screenshots {
            width: 600px;
            height: 400px;
        }

        #features-list {
            display: grid;
            grid-template-rows: 1fr 1fr 1fr 1fr;
            grid-row-gap: 20px;
        }

        .feature {
            padding: 0px 50px;
            display: grid;
            grid-template-columns: 20% 80%;
            align-content: center;
            align-items: center;
            justify-content: center;
            text-align: left;
        }

        .feature-text {
            grid-column: 2/3;
        }

        .feature-img {
            width: 60px;
            height: 60px;
            border-radius: 30px;
            /* background: linear-gradient(180deg, #358CAA 1.49%, #F87373 98.73%); */
            background: linear-gradient(180deg, #FF6200 0%, #2CACF0 0.01%, #000000 98.9%);
        }

        #feature-heading {
            text-transform: uppercase;
            color: #2CACF0;
        }

        /* SECTION ONE STYLE ENDS */

        /* SECTION 2 STYLE */
        .testimony-img {
            width: 100px;
            height: 100px;
            border-radius: 90px;
            /* background: linear-gradient(180deg, #358CAA 1.49%, #F87373 98.73%); */
            background: linear-gradient(180deg, #FF6200 0%, #000000 98.9%);
        }

        #media1 {
            float: left;
        }

        #media2 {
            float: right;
            direction: rtl;
        }

        .media {
            width: 50%;
        }

        .media-object,
        .media-body {
            margin: 0px !important;
            padding: 0px !important;
        }

        .testimony {
            background: #333333;
            color: white;
            padding: 20px;
            margin-left: 30px;
            text-align: left;
        }

        .name {
            width: fit-content;
            margin-left: 30px;
        }

        #t-container {
            padding: 0px 150px;
            margin-top: 70px;
        }
        /* SECTION TWO STYLE ENDS */


        /* DIVIDER STYLE */
        #divider {
            width: 100%;
            height: 300px;
            padding: 70px 170px;
            background: #39689C;
           
        }
        #divider-top{
            width: 125%;
            height: 200px;
            background: #39689C;
            margin-bottom:-50px;
            margin-right:-20px;
            z-index:-1;
            -webkit-transform-origin: 100% 0;
  -ms-transform-origin:0 100%;
  transform-origin: 0 100% ;
  -webkit-transform: rotate(2deg);
  -ms-transform: rotate(2deg);
  transform: rotate(2deg);
        }

        #divider-content {
            display: grid;
            align-content: center;
            justify-content: center;
            align-items: center;
            grid-template-columns: 70% 30%;
            padding: 30px 30px;
            background: white;
            text-align: left;
        }

        #divider-cta {
            transition: color 1s, background 1s;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            grid-column: 2/3;
            grid-row: 1/3;
            width: fit-content;
            height: fit-content;
            background: #2AA6E8;
            color: #FFFFFF;
            border: none;
            padding: 12px 16px;
            border-radius: 63px;
            margin-right: -80px;
        }

        #divider-cta:hover {
            color: #2AA6E8;
            background: #FFFFFF;
        }

        #divider-text {
            display: grid;
            grid-template-rows: 20% 80%;
            grid-row-gap: 10px;
            width: fit-content;
            height: fit-content;
            margin-right: 40px;
        }

        #divider-title {
            color: #2AA6E8;
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 0.04em;
            margin: 0px;
            padding: 0px;
        }
        .icon{
            color:#39689C;
            font-size:70px;
            text-align:center;
        }
        .about-title{
            color:#39689C;
            font-size:24px;
            text-align:center;
            font-family: 'Nunito Sans', sans-serif;
        }
        .about-paragraph{
            color:#404040;
            font-size:16px;
            text-align:center;
            font-family: Lato-Regular,sans-serif!important;
        }
        /* DIVIDER STYLE ENDS */


        /* FOOTER STYLE */
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

        @media only screen and (max-width: 1250px) {
            /* HEADER BODY STYLE */
            #header {
                height: 650px;
            }

            #header-content {
               
            }

            #mobile-app {
                width: 200px;
                height: 400px;
            }

            #content-text {
                display: grid;
                grid-template-rows: 1fr 1fr 1fr;
                height: 300px;
                grid-gap: 5px;
            }

            #heading-hd {
                font-size: 26px;
                padding-right: 80px;
            }

            #text-hd {
                padding-right: 80px;
            }

            /* HEADER BODY STYLE ENDS */

            /* SECTION ONE STYLE */

            .section-header {
                font-size: 30px;
            }

            .section-sub {
                font-size: 14px;
                letter-spacing: 0.06em;
            }

            #features {
                display: grid;
                grid-template-columns: 60% 40%;
                margin-top: 70px;
                padding: 0px 40px;
            }

            #screenshots {
                width: 450px;
                height: 300px;
            }

            .feature {
                padding: 0px 10px;
                grid-template-columns: 20% 80%;
            }

        }

        @media only screen and (max-width: 1090px) {
            /* HEADER BODY STYLE */
            #header {
                height: 550px;
            }

            #header-content {
                
            }

            #mobile-app {
                width: 150px;
                height: 350px;
            }

            #content-text {
                display: grid;
                grid-template-rows: 1fr 1fr 1fr;
                height: 300px;
                grid-gap: 5px;
            }

            #heading-hd {
                font-size: 20px;
                padding-right: 50px;
            }

            #text-hd {
                font-size: 16px;
                padding-right: 50px;
            }

            /* HEADER BODY STYLE ENDS */

            /* SECTION ONE STYLE */

            .section-header {
                font-size: 26px;
            }

            .section-sub {
                font-size: 13px;
                letter-spacing: 0.06em;
            }

            #features {
                grid-template-columns: 50% 50%;
                grid-gap: 20px;
                padding: 0px 10px;
            }

            #screenshots {
                width: 400px;
                height: 300px;
            }

            .feature {
                padding: 0px 0px;
                grid-template-columns: 20% 80%;
            }

            /* DIVIDER STYLE */
            #divider {
                width: 100%;
                height: 300px;
                padding: 30px 100px;
                background: #39689C;
            }

        }

        @media only screen and (max-width: 800px) {
            #header {
                height: 620px;
            }
            .features-icons {
                display: inline;
            }

            .feature-img {
                display: none;
            }

            #header-content {
                
            }

            #content-text {
                align-self: center;
                flex: 2;
                display: flex;
                flex-direction: column;
                height: fit-content;
                width:100%;
            }

            #heading-hd {
                font-size: 18px;
                letter-spacing: 0.07em;
                padding-right: 0px;
                margin-bottom: 15px;
            }
            #heading-top-hd{
                font-size: 30px;
                letter-spacing: 0.07em;
                padding-right: 0px;
                margin-bottom: 15px;
            }
            #text-hd {
                padding-right: 0px;
                word-spacing: 0.09em;
                letter-spacing: 0.05em;
                font-size: 12px;
                margin-bottom: 15px;
            }

            #mobile-app {
                flex: 1;
                width: 150px;
                height: 300px;
                margin-right: 20px;
            }

            /* END HEADER */

            .section-sub {
                padding: 0px 30px;
                text-align: justify;
            }

            #features {
                display: flex;
                flex-direction: column;
                margin-top: 70px;
                padding: 0px 10px;
            }

            #screenshots {
                width: 350px;
                height: 200px;
            }

            #features-list {
                display: flex;
                flex-direction: column;
                margin-top: 30px;
            }

            .feature {
                padding: 0px 10px;
                margin-top: 30px;
                display: flex;
                flex-direction: column;
                grid-template-columns: 20% 80%;
                align-content: center;
                align-items: center;
                justify-content: center;
                text-align: left;
            }

            #feature-heading {
                text-transform: uppercase;
                color: #FF6200;
                font-size: 14px !important;
                align-self: flex-start;
                margin-bottom: 10px;
            }

            /* FEATURES ENDS */

            .testimony-img {
                width: 60px;
                height: 60px;
                border-radius: 30px;
                /* background: linear-gradient(180deg, #358CAA 1.49%, #F87373 98.73%); */
                background: linear-gradient(180deg, #FF6200 0%, #000000 98.9%);
            }

            #media1 {
                float: none;
            }

            #media2 {
                float: none;
                direction: rtl;
            }

            .media {
                width: 100%;
            }

            .media-object,
            .media-body {
                margin: 0px !important;
                padding: 0px !important;
            }

            .testimony {
                background: #333333;
                color: white;
                padding: 20px;
                margin-left: 30px;
                margin-bottom: 60px;
                text-align: left;
            }

            .name {
                width: fit-content;
                margin-left: 30px;
            }

            #t-container {
                padding: 0px 10px;
                margin-top: 70px;
            }


            /* DIVIDER STYLE */
            #divider {
                width: 100%;
                height: fit-content;
                padding: 70px 30px;
                background: #39689C;
            }

            #divider-content {
                display: flex;
                flex-direction: column;
                align-content: center;
                justify-content: center;
                align-items: center;
                padding: 15px 15px;
                background: white;
                text-align: left;
            }

            #divider-cta {
                width: fit-content;
                height: fit-content;
                text-align: center !important;
                background: #FF6200;
                color: white;
                border: none;
                padding: 12px 60px;
                border-radius: 63px;
                margin-right: 0px;
                margin-top: 20px;
            }

            #divider-text {
                display: flex;
                flex-direction: column;
                text-align: justify;
                width: fit-content;
                height: fit-content;
                margin-right: 0px;
            }

            #divider-title {
                color: #FF6200;
                font-size: 16px;
                font-weight: bold;
                letter-spacing: 0.04em;
                margin: 0px;
                margin-bottom: 10px;
                padding: 0px;
            }
            /* DIVIDER STYLE ENDS */


            /* FOOTER STYLES */
            #footer {
                
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
        }

    </style>
</head>
<body>
<!-- HEADER BEGINS -->
<div id="header" style="background: url('img/Group2.png');">
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
                <a class="navbar-brand" href="{{url('/')}}"><img id="logo" src="img/HNGlogo.png" alt="Company logo" style="display: inline;"> </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">

                     <li class="{{ Request::segment(1) === '/' ? 'active' : null }}" ><a href="{{url('/')}}">Home</a></li>
                    <li class="{{ Request::segment(1) === 'how' ? 'active' : null }}" ><a href="{{route('how')}}">FAQs</a></li>
                    <li class="{{ Request::segment(1) === 'features' ? 'active' : null }}"><a href="{{route('features')}}">Features</a></li>
                   <li class="{{ Request::segment(1) === 'features' ? 'active' : null }}"><a href="{{route('features')}}">Demo</a></li>
                   <li class="{{ Request::segment(1) === 'about' ? 'active' : null }}"><a href="{{route('about')}}">About<span class="sr-only">(current)</span></a></li>

                    @if(Auth::guest())
                    <li id="sign-in"><a href="{{url('login')}}">Sign In</a></li> 
                    @else
                        <li id="sign-in">
                        <a style="color:black" href="{{ url('/logout') }}">
                            Logout
                        </a>
                      </li>

                      <li id="sign-in">
                        <a href="{{ url('/dashboard') }}">
                            Dashboard
                        </a>
                      </li>
                    @endif

                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>

    <div id="header-content" align="center">
        
        <div id="content-text" class="clearfix" align="center">
        <span id="heading-top-hd">
        Online payments made easy
                </span>
                <span id="heading-hd">
                   Payant is an easy way for you to pay and get paid any where
                </span>
            <button id="button-hd">
                Get Started
            </button>
        </div>
    </div>
</div>

<!--HEADER ENDS -->
<section class="about">
<div class="about-content">
<div class="row">
        <div class="col-lg-12">
        <h5 class="about-title">How it works</h5>
        <p class="about-paragraph">
        Our custom built Transfer Rules is built with the aim to connect your business to clients, employer to employee etc in a more effcient way and simplify your financial
        transactions. Crisp and clear UX design and excellent workflow serves to foster customer intimacy and user loyalty
        </p>
        </div>
        
</div>
<div class="row">
        <div class="col-lg-4">
        <div class="icon"><img src="img/multiple-shots.png" alt="icon" /> </div>
        <h5 class="about-title">How it works</h5>
        <p class="about-paragraph">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed porro, laborum quis dolorum impedit unde, sunt voluptate! Ab assumenda aliquam sint 
        necessitatibus at pariatur quidem dolorem quaerat doloribus, similique 
        </p>
        </div>
        <div class="col-lg-4">
        <div class="icon"><img src="img/Group.png" alt="icon" /></div>
        <h5 class="about-title">How it works</h5>
        <p class="about-paragraph">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed porro, laborum quis dolorum impedit unde, sunt voluptate! Ab assumenda aliquam sint 
        necessitatibus at pariatur quidem dolorem quaerat doloribus, similique 
        </p>
        </div>
        <div class="col-lg-4">
        <div class="icon"><img src="img/smartphone-chat.png" alt="icon" /></div>
        <h5 class="about-title">How it works</h5>
        <p class="about-paragraph">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed porro, laborum quis dolorum impedit unde, sunt voluptate! Ab assumenda aliquam sint 
        necessitatibus at pariatur quidem dolorem quaerat doloribus, similique 
        </div>
</div>
<div class="row">
        <div class="col-lg-4">
        <div class="icon"><img src="img/live-chat.png" alt="icon" /></div>
        <h5 class="about-title">How it works</h5>
        <p class="about-paragraph">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed porro, laborum quis dolorum impedit unde, sunt voluptate! Ab assumenda aliquam sint 
        necessitatibus at pariatur quidem dolorem quaerat doloribus,
        </p>
        </div>
        <div class="col-lg-4">
        <div class="icon"><img src="img/credit-card.png" alt="icon" /></div>
        <h5 class="about-title">How it works</h5>
        <p class="about-paragraph">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed porro, laborum quis dolorum impedit unde, sunt voluptate! Ab assumenda aliquam sint 
        necessitatibus at pariatur quidem dolorem quaerat doloribus, 
        </p>
        </div>
        <div class="col-lg-4">
        <div class="icon"><img src="img/maze.png" alt="icon" /></div>
        <h5 class="about-title">How it works</h5>
        <p class="about-paragraph">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed porro, laborum quis dolorum impedit unde, sunt voluptate! Ab assumenda aliquam sint 
        necessitatibus at pariatur quidem dolorem quaerat doloribus, 
        </p>
        </div>
    </div>
</div>

<!-- DIVIDER -->
<div id="divider-top"></div>
<div id="divider">
    <div id="divider-content">
        <div id="divider-text">
            <p id="divider-title">Get Started in Five Minutes</p>
            <p id="">
                Create an account in less than 5 minutes. Login to your account and create wallets for your company
            </p>
        </div>
        <button id="divider-cta">Read More</button>
    </div>
</div><br><br><p>
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
<br><br><p>
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
</section>
<!-- DIVIDER ENDS-->



<!-- FOOTER ENDS -->
<!--<script
    src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous">
</script> -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script> -->
<script src="js/script.js"></script>
</body>
</html>
