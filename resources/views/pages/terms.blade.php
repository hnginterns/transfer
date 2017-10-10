@extends('layouts.page')
@section('main-text', 'Terms and Conditions')
@section('sub-text', 'TransferRules lets you receive payments locally and globally with no hassles and zero set up fees')
@section('content')

<!-- SECTION ONE BEGINS -->

<p>
    Terms and conditions<br> Welcome to our website. If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern TransferRule relationship with you in relation to this website. If you disagree with any part of these terms and conditions, please do not use our website.
The term ‘TransferRule]’ or ‘us’ or ‘we’ refers to the owner of the website whose registered office is [address]. Our company registration number is [company registration number and place of registration]. The term ‘you’ refers to the user or viewer of our website.
The use of this website is subject to the following terms of use:
<ul>
	<li>
		The content of the pages of this website is for your general     information and use only. It is subject to change without notice
	</li>
	<li>
		This website uses cookies to monitor browsing preferences. If you do allow cookies to be used, the following personal information may be     stored by us for use by third parties: 
    Email address, Bank details, Card Details
	</li>
	<li>
		Neither we nor any third parties provide any warranty or guarantee as to the     accuracy, timeliness, performance, completeness or suitability of     the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law
	</li>
	<li>
		Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your     own responsibility to ensure that any products, services or     information available through this website meet your specific     requirements.
	</li>
	<li>
		Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your     own responsibility to ensure that any products, services or     information available through this website meet your specific     requirements.
	</li>
	<li>
		All trademarks reproduced in this website, which are not the property of, or licensed to the operator, are acknowledged on the website.

	</li>
	<li>Unauthorised     use of this website may give rise to a claim for damages and/or be a     criminal offence.</li>
	<li>From time to time, this website may also include links to other websites.     These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s)</li>
	<li>Your use of this website and any dispute arising out of such use of the website is subject to the laws of the Federal Republic of Nigeria
</li>

</ul>
</p>

@endsection



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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid">



            <a class="navbar-brand" href="{{url('/')}}">

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


                    <li class="nav-item">

                        <a class="nav-link" href="{{route('how')}}">Get Started</a>

                    </li>

                    <li class="nav-item active">

                    @if(Auth::guest())
                        <a class="nav-link" href="{{url('/login')}}">SIGN IN</a>
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

<div class="container">
  <div class="row">
  <hr>
    <div class="col-lg-12">
      <div class="col-md-8">
        <a href="#">Terms of Service</a> | <a href="#">Privacy</a>    
      </div>
      <div class="col-md-4">
        <p class="muted pull-right">© 2013 Company Name. All rights reserved</p>
      </div>
    </div>
  </div>
</div>

<div id="footer" class="footer">

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
            <td><a href="#">Disclaimer</a></td>
        </tr>
    </table>
    <p id="line"> </p>
    <div id="lower-footer">
        <p>&#169; 2017 Transferrules.com. All rights reserved</p>
    </div>
</div>


<!-- FOOTER ENDS -->


