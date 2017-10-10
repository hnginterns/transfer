@extends('layouts.page')
@section('main-text', 'Features')
@section('sub-text', 'TransferRules lets you receive payments locally and globally with no hassles and zero set up fees')
@section('content')

<p><h3>FEATURES OF TRANSFER RULES</h3><p>
Our custom built Transfer Rules is built with the aim to connect your business to clients, employer to employee etc in a more efficient way and simplify your financial transactions.
Crisp and clear UX designs and excellent workflow serves to foster customer intimacy and user loyalty.</center><p>

<h3>WHAT FEATURE DO WE OFFER?</h3><br>
<ul>
<li>      Admin Interface <br></li>
<li>      Credit Score <br> </li>
<li>      Personal Finance <br></li> 
<li>      Account tracking <br></li>
<li>      User Interface <br></li>
<li>     Multiple Wallet support <br></li>
<li>     Wallet to Wallet Transaction <br></li>
<li>      Wallet to Account Transactions <br></li>
<li>      Account Balance check <br></li>
<li>     Detailed Transaction History <br></li>
<li>     Data Protection <br></li>
<li>     Robust Financial Statistics and custom reports <br></li>
<li>     Credit/Data Top-up <br></li>
<li>     Bulk Sms Integration <br></li>
<li>     Live Chat <br></li>
<li>     Secured and Reliable Payment method <br></li>
<li>     Easy usage with fewer clicks to make payments<br></li>
<br>
</ul>
 
When it comes to financial app development as this, our priority lies on security, clean performance and long term viability
We work out the best solution to save your business from the hazzles of every day tradional banking.
Our clients range from large enterprise-sized financial institutions and business in need of more powerful financial technologies to manage their accounts and payees to innovative startups offering a new kind of service for customers to manage credit scores, personal finances and expenses without resorting to traditional banking.

            </p>

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
        <!-- FOOTER -->



<div id="footer">
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

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
@endsection
