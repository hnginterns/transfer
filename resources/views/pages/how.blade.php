@extends('layouts.page')
@section('main-text', 'FREQUENTLY ASKED QUESTION (FAQs)')
@section('sub-text', 'Finance@ Hotels.ng lets an admin manage bills and fund disbursement')
@section('content')

<!-- Content BEGINS -->
<!---Content added by mercyikpe-->
    
<!--   main content-->
    
    
<div class="content">
    
    
    
               
    <div class="mainBody">
        
            <h2 id="header">Frequently Asked Questions (FAQs)</h2>
            
        <button class="accordion"> What does Finance@Hotels.ng do?</button>
            <div class="panel">
                <p>Finance@ Hotels.ng is a secure online service that enables any user to instantly buy mobile credit, data top-up for a prepaid Mobile Phone in any part of the country. Our customers use transferrules.com to buy Mobile Airtime for either themselves, friends and family members.</p>
            </div>
        
            
        
            <button class="accordion"> How do I register to use Finance @ Hotels.ng?</button>
            <div class="panel">
                
                 At Finance @ Hotels.ng site
                 Select ‘Register’ at the Top Left of the Page</br>
                 Enter your email address and password</br>
                 Click on ‘Register’ at the bottom right of the page.</br>
                 A Confirmation Code will be sent directly to your email.</br>
                 Click on the code to verify your email address and continue to setting up your account</br>
                </p>
                <p>NOTE: Recipients will also receive a transaction confirmation SMS message from their Mobile operator.</p>
            </div>
        
        
            <button class="accordion"> How do I send Prepaid Mobile Credit to an existing customer?</button>
            <div class="panel">
                <p>
                  Login to transferrules.com.</br>
                  Select a number from the list of numbers registered under your account</br>
                  Select the Top Up recharge amount.</br>
                  Click the Top Up button.</br>
                  Carefully review the order and complete payment using our secure online payment process.</br>
                  A confirmation message will appear on your screen with details on your completed transaction.</br>
                  A confirmation email will be sent to your email address.</br>
                </p>
                <p>NOTE: Recipients will also receive a transaction confirmation SMS message from their Mobile operator.</p>
            </div>
        
        
            <button class="accordion"> How do I send Data Plan to an existing customer?</button>
            <div class="panel">
                <p>
                  Login to transferrules.com.</br>
                  Select a number from the list of numbers registered under your account.</br>
                  Select the Top Up data plan.</br>
                  Carefully review the order and complete payment using our secure online payment process.</br>
                  A confirmation message will appear on your screen with details on your completed transaction.</br>
                  A confirmation email will be sent to your email address.</br>
                </p>
                <p>NOTE: Recipients will also receive a transaction confirmation SMS message from their Mobile operator.</p>
            </div>
        
            <button class="accordion">What should I do if forgot my password?</button>
            <div class="panel">
              <p>
                  Login to transferrules.com.</br>
                  Input your email address</br>
                  Click ‘Forgot Password?’</br>
                  A screen will appear to enter a security question.</br>
                  A message will then be sent to your email address with a link to reset the account password.</br>
                  Check your email and follow the instructions in the email to reset your account password and proceed further.</br>
            </p>
            </div>

            <button class="accordion">How do I credit my Top-Up Wallet?</button>
            <div class="panel">
              <p>
                  Login to transferrules.com.</br>
                  Select the amount you wish to Refill Top up wallet.</br>
                  Click the TopUp button.</br>
                  Carefully review and confirm your request.</br>
                  A confirmation email will be sent to your email address.</br>
                </p>
            </div>
            
            <button class="accordion">What is the cost to send a Top Up?</button>
            <div class="panel">
              <p>The cost of a Top Up transaction is based upon the denomination amount selected. During the checkout process the total amount due will be indicated. This amount includes the details of any additional charges (such as taxes or SMS fees) that affect the ultimate Top Up recharge amount that will be received by the transaction recipient.</p>
            </div>

            <button class="accordion">What happens if I Top Up an invalid mobile number?</button>
            <div class="panel">
              <p>Our website is best enjoyed while using Internet Explorer or Google Chrome. Please avoid using other web browsers like Firefox, Opera or UC browser. If the problem still persists, please raise a complaint with our Customer Service team by calling 000111 from your mobile number or send a mail via finance@hotels.ng </p>
            </div>
            
        
            <button class="accordion">How can i get my blocked account unblocked?</button>
            <div class="panel">
              <p>To get your account unblocked, you will need to send and email to the admin at admin@transfer.hng.fun stating the reason that led to your account being blocked, also why you want it to be reactivated.<p>
                <p>OR</p> 
                <p>
                  Login to your account.</br>
                  Click on the unblock button.</br>
                  Fill in the reactivation request form.</br>
                  Submit</li>
                </p>
            </div>
        
   
            <script>
                    var acc = document.getElementsByClassName("accordion");
                    var i;

                    for (i = 0; i < acc.length; i++) {
                      acc[i].onclick = function() {
                        this.classList.toggle("active");
                        var panel = this.nextElementSibling;
                        if (panel.style.maxHeight){
                          panel.style.maxHeight = null;
                        } else {
                          panel.style.maxHeight = panel.scrollHeight + "px";
                        } 
                      }
                    }
            </script>

    </div> 
</div>    
</body>
<html>
@endsection
