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
            height: 850px; 

    /* Center and scale the image nicely */
    background-position: center !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
        }
        #logo {
            
            height: 40px;
            margin-right: 15px;
            margin-left: 0px;
        }

        .navbar {
            margin: 0px;
            padding-top: 10px !important;
            padding-bottom: 10px !important;
            padding: 0px;
            background: transparent;
            width: 100%;
            border-radius: 0px;
            border: none;
            border-bottom:solid;
            border-bottom-color:#39689C;
            color: white;
        }
        .about{
            height:700px;
        }
        .about-content{
            width:70%;
            padding:20px;
            margin-top:20px;
            margin-bottom:-200px;
            margin-left:auto;
            margin-right:auto;
            background:#fff;
            z-index:1000 !important;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

        }
        .navbar-brand,
        .navbar-nav a {
            color: #000 !important;
            font-size: 17px;
            margin-right: 10px;
        }

        .navbar-brand {
            margin-top: -13px;
            font-size: 17px;
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
            color:#FFF !important;
            background: #39689C !important;
            border: 1px solid #39689C !important;
            border-radius: 63px;
            padding-left: 12px;
            padding-right: 12px;
        }
        
        #sign-in a  {
            padding: 7px 14px;
            color: #FFF !important;
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
            font-size: 240px;
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
            margin-top:15%;
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
            color: white;
            border: none;
            border-radius: 21px;
            background: #eff2f4;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            padding: 4px 12px;
            
            transition: background 1s, color 2s;
            z-index: 100;
            font-size: 22px;
        }

        #button-hd:hover {
            /* background: #2CACF0;
            color: #FFFFFF; */
            color: #FF6200;
            background: #2CACF0;
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
            width: 100%;
            height: 200px;
            background: #39689C;
            position:relative;
            margin-bottom:-50px;
            z-index: -1;
        }
        #divider-top:before{
            background: inherit;
            content: '';
            display: block;
            height: 50%;
            left: 0;
            position: absolute;
            right: 0;
            z-index: -1;
            -webkit-backface-visibility: hidden;
            top: 0;
            transform: skewY(2deg);
            transform-origin: 100% 0;
        }

        #divider-content {
            padding: 30px 30px;
            background: white;
            text-align: center;
        }

        #divider-cta {
            transition: color 1s, background 1s;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            padding:20px;
            background: #39689C;
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
           text-align:center;
           color:#404040;
           font-size: 18px
        }

        #divider-title {
            color: #39689C;
            text-align:center;
            font-size: 40px;
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
                width: 850px;
                               /* Full height */
    height: 100%; 

    /* Center and scale the image nicely */
    background-position: center !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
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
                width: 100%;
                /* Full height */
    height: 800px; 

    /* Center and scale the image nicely */
    background-position: center !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
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
                /* Full height */
                height: 650px; 
                width:100%;
    /* Center and scale the image nicely */
    background-position: center !important;
    background-repeat: no-repeat !important;
    background-size: cover !important;
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
                font-size: 10px;
                letter-spacing: 0.07em;
                padding-right: 0px;
                margin-bottom: 15px;
            }
            #heading-top-hd{
                margin-top:25px;
                font-size: 40px;
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
                
                padding: 70px 30px;
                background: #39689C;
            }

            #divider-content {
             
                align-items: center;
                padding: 15px 15px;
                background: white;
                text-align: left;
            }

            #divider-cta {
                text-align: center !important;
                background:#39689C;
                color: white;
                border: none;
                padding:20px;
                border-radius: 63px;
                margin-right: 0px;
                margin-top: 20px;
            }

            #divider-text {
                text-align: center;
              
            }

            #divider-title {
                color: #fff;
                background-color: #39689C;
                font-size: 16px;
                font-weight: bold;
                letter-spacing: 0.04em;
                margin: 0px;
                margin-bottom: 0px;
                padding: 0px;
            }
            /* DIVIDER STYLE ENDS */


            /* FOOTER STYLES */
            #footer {
                
            }
            #footer{
                display:none;
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
<div class="top">
<nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><img id="logo" src="{{   URL::asset('img/HNGlogo.png')  }}" alt="Company logo" style="display: inline;"> </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">

                     <li class="{{ Request::segment(1) === '/' ? 'active' : null }}" ><a href="{{url('/')}}">Home</a></li>
                     

                    @if(Auth::guest())          
                    <li id=""><a href="{{url('login')}}">Sign In</a></li> 
                    @else
                        <li id="">
                        <a style="color:black" href="{{ url('/dashboard') }}">
                            Dasboard
                        </a>
                      </li>

                      <li id="">
                        <a href="{{ url('/logout') }}">
                            Logout
                        </a>
                      </li>
                    @endif

                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
</div>
<!-- HEADER BEGINS -->
<div id="header" style="background: url({{   URL::asset('img/Group2.png')  }});">
  <!--  <p id="background-text">FUNDS</p> -->

    

    <div id="header-content" align="center">
        
        <div id="content-text" class="clearfix" align="center">
        <span id="heading-top-hd">
        Hotels.ng Financial Control
        
                </span>
                <span id="heading-hd" style="margin-left:6%">
                   Financial Management Made Easy as pie
                </span>
            <button id="button-hd">
                <a href="{{url('login')}}">Sign in</a>
            </button>
        </div>
    </div>
</div>
</div>


<div id="footer">
    
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
<script src="{{   URL::asset('js/script.js')  }}"></script>
</body>
</html>

