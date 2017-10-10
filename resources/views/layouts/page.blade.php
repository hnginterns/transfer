<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Sign In</title>

    <link href="css/bootstrap.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">

    <link href="css/signin.css" rel="stylesheet">

</head>



<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid">



            <a class="navbar-brand" href="#">

                <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> TransferRules

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

                        <a class="nav-link" href="/home">Home

                            <span class="sr-only">(current)</span>

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="/about">About</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="/home">Get Started</a>

                    </li>

                    <li class="nav-item active">

                        <a href="{{ route('admin.login') }}"class="nav-link">Admin login</a>


                    </li>

                </ul>

            </div>

        </div>

    </nav>
<main>

        <div class="container">

        @yield('content')    
        

        </div>



    </main>

<!--HEADER ENDS -->


<!-- SECTION ONE BEGINS -->



<!-- FOOTER -->
<footer class="footer">

    <div id="footer-links">
        <li><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{route('about')}}">About Us</a></li>
        <li><a href="{{route('privacy')}}">Privacy Policy</a></li>

        <li><a href="{{route('how')}}">How it works</a></li>
        <li><a href="{{route('contact')}}">Contact Us</a></li>
        <li><a href="#">Disclaimer</a></li>

        <li><a href="{{route('help')}}">Help & Support</a></li>
        <li><a href="{{url('login')}}">Sign In</a></li>
        <li><a href="{{route('how')}}">FAQs</a></li>
        <li><a href="{{route('terms')}}">Terms & Condition</a></li>

        <li><a href="#">Site Map</a></li>
    </div>

        <div class="container" style="text-align:center">

            <span class="text-muted company">2017 TransferFunds - All Rights Reserved</span>

        </div>

    </footer>

    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.js"></script>

</body>



</html>



