@extends('layouts.user')

@section('title')
      Transfer to Clearing Wallet
@endsection
@section('content')

<link rel="stylesheet" href="/css/form.css">

            <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3">
                  <img src="/svg/naira.svg" alt="no preview" class="transfer-icon">
                  <h4 class="intro text-center">Transfer To Main Wallet (Clearing Account) </h4>
                  <form class="input-form" action="/transferAccount" method="POST">
                  {{csrf_field()}}

                  <div class="form-group">  
                    <input type="text" name="fname"  class="form-control input-defaulted" placeholder="First Name">                       
                  </div> 

                  <div class="form-group">  
                  <input type="text" name="lname"  class="form-control" placeholder="Last Name">  
                    </div> 
                     
                  <div class="form-group">      
                  <input type="text" name="phone"  class="form-control" placeholder="Phone Number"> 
                    </div> 
                     
                  <div class="form-group">       
                  <input type="email" name="emailaddr"  class="form-control" placeholder="Email Address"> 
                    </div> 
                     
                  <div class="form-group">       
                  <input type="number" name="card_no"  class="form-control" placeholder="Card No.">  
                    </div> 
                     
                  <div class="form-group">      
                  <input type="number" name="cvv"  class="form-control" placeholder="CVV">          
                    </div> 
                     
                  <div class="form-group">         
                  <input type="number" name="expiry_year" class="form-control " placeholder="Expiry Year">
                    </div> 
                     
                  <div class="form-group"> 
                  <input type="number" name="expiry_month" class="form-control" placeholder="Expiry Month">  
                  </div> 
                     
                  <div class="form-group"> 
                  <input type="number" name="pin" class="form-control" placeholder="PIN">  
                  </div> 
                     
                  <div class="form-group"> 
                  <input type="number" name="amount" class="form-control" placeholder="Amount">  </div> 
                  </div>
                            
                  <div class="form-group center-block">    
                    <button id="" type="submit" class="btn btn-primary center-block">Transfer</button>
                  </div>


                  </form>
            </div>
    
  @endsection
