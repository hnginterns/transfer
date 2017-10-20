@extends('layouts.user')

@section('title')
      Phone Top up
@endsection
@section('content')
<style>
i.can{
        color: #00a65a;
        
    }
    i.cannot{
      color: #dd4b39;
    }
i.sent{
        color: #00a65a;
        filter: blur(10px);
        -webkit-filter: blur(10px);
        z-index:-1
        
    }
    em.sent{
        opacity: 0.5
        z-index:-1
        
    }
    i.received{
      color: #dd4b39;
      
 }
    
    
first {
    float: right;
    margin: 0 0 10px 10px;
}
    
form group { 
    
    height:400;
    
    }
    
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 899;
    
}
td, th {
    border: px solid #dddddd;
    
    text-align: center;
    padding: 5px;
}
tr:nth-child(even) {
    width: 100;
    background-color: #dddddd;
}
    

<!--
	#container {
		width:200;
	}
	#box1	{
		background:#fff; border:0px solid #000;
        { box-shadow: 1px 1px 1px #999; }
		float:left; min-height:230px; margin-right:10px;
	}
	#box2 	{
		background:#fff; border:0px solid #000;
		float:right; min-height:230px; width:30px;
	}
	-->  
    
    }
</style>

<link rel="stylesheet" href="walletview.css">
<link rel="stylesheet" href="user.css">
<link rel="stylesheet" href="form.css">
<link rel="stylesheet" href="/css/walletview.css">


<center>
              <br><div class="">
	<div class="orange-box"><h4 class="title" align="center">CONTACT LIST</h4></div>
          <div class="table-responsive">
                <table class="table">
              <thead>
                <tr>
                      <th>Select</th>
                  <th>Name</th>
                  <th>Department</th>
                   <th>Network</th>
                  <th>Phone number</th>
                    <th>Amount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                 <td><input type="radio" name="select" value=""><br></td>
                  <td>Godfred Akpan</td>
                  <td>Iron</td>
                  <td>MTN</td>
                  <td>09036709916</td>
                <td><input type="text" name="amount" value="Amount"></td>
                </tr>
                  <tr>
                 <td><input type="radio" name="select" value=""><br></td>
                  <td>Godfred Akpan</td>
                  <td>Iron</td>
                  <td>MTN</td>
                  <td>09036709916</td>
                <td><input type="text" name="amount" value="Amount"></td>
                </tr>
                  <tr>
                 <td><input type="radio" name="select" value=""><br></td>
                  <td>Godfred Akpan</td>
                  <td>Iron</td>
                  <td>MTN</td>
                  <td>09036709916</td>
                <td><input type="text" name="amount" value="Amount"></td>
                </tr>
                  <tr>
                 <td><input type="radio" name="select" value=""><br></td>
                  <td>Godfred Akpan</td>
                  <td>Iron</td>
                  <td>MTN</td>
                  <td>09036709916</td>
                <td><input type="text" name="amount" value="Amount" size="20px"></td>
                </tr>
              
                </tr>               
              </tbody>
            </table>    <br>
<hr><br
						
 <table>
    <th>
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="col-md-4 col-sm-4">
    <td><select class="form-control cus-input" name="beneficiary_id" >
 <option>TOP UP AIRTIME</option>
                           <option value="1000">1000</option>
                            <option value="5000">5000</option>
                            <option value="10000">10000</option>
                            <option value="50000">50000</option>
                            <option value="100000">100000</option>
                            
   </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <button id="" type="submit" class="btn btn-dark">Top Up</button></td>
    <td height="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     </div>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     <div class="col-md-4 col-sm-4">
        <select class="form-control cus-input" name="beneficiary_id">
 <option>TOP UP DATA</option>
                           <option value="1000">1000</option>
                            <option value="5000">5000</option>
                            <option value="10000">10000</option>
                            <option value="50000">50000</option>
                            <option value="100000">100000</option>
                            
   </select>&nbsp;&nbsp;&nbsp;&nbsp;<button id="btn btn-primary btn-block" type="submit"   class="btn btn-dark">Top Up</button></td>
    
    </tr>
               
    </div>
                    
       
  </table> <br><hr><br>
  <br><hr><br>


       <th><div class="orange-box"><h4 class="title" align="center">TRANSACTION HISTORY</h4></div></th><br><div class="">
       
	
          <div class="table-responsive">
                <table class="table">
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Type</th>
                  <th>Amount</th>
                   <th>Network</th>
                  <th>Beneficiary</th>
                    <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                
                  <td>12:2:2017</td>
                  <td>Data</td>
                  <td>1000</td>
                  <td>MTN</td>
                  <td>09036709916</td>
                <td>Successful</td>
                </tr>
                  <tr>
                
                  <td>12:2:2017</td>
                  <td>Data</td>
                  <td>1000</td>
                  <td>MTN</td>
                  <td>09036709916</td>
                <td>Successful</td>
                </tr>
                  <tr>
                 
                  <td>12:2:2017</td>
                  <td>Data</td>
                  <td>1000</td>
                  <td>MTN</td>
                  <td>09036709916</td>
                <td>Successful</td>
                </tr>
                  <tr>
                 
                  <td>12:2:2017</td>
                  <td>Data</td>
                  <td>1000</td>
                  <td>MTN</td>
                  <td>09036709916</td>
                <td>Successful</td>
                </tr>
             
              
                </tr>               
              </tbody>
            </table>    <br><br>
		</div>

 

    <div class="modal fade" id="otpModal" role="dialog">
    <div class="modal-dialog">
    
      
            </div>
          </div>
      </div>
      
    </div>
  </div>

</div>

    
  @endsection
