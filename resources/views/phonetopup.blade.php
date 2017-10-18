@extends('layouts.user')

@section('title')
      Transfer to Bank
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
    width: 100%;
}
td, th {
    border: px solid #dddddd;
    
    text-align: center;
    padding: 5px;
}
tr:nth-child(even) {
    width: 200;
    background-color: #dddddd;
}
    

<!--
	#container {
		width:100%;
	}
	#box1	{
		background:#fff; border:0px solid #000;
        { box-shadow: 1px 1px 1px #999; }
		float:left; min-height:230px; margin-right:10px;
	}
	#box2 	{
		background:#fff; border:0px solid #000;
		float:left; min-height:230px; width:250px;
	}
	-->  
    
    }
</style>

<link rel="stylesheet" href="walletview.css">
<link rel="stylesheet" href="user.css">

   

          <br><div class="">
	<div class="orange-box"><h4 class="title" align="center">CONTACT</h4></div>
          <div class="table-responsive">
                <table class="table">
              <thead>
                <tr>
                  <th>Select</th>
                  <th>Name</th>
                  <th>Department</th>
                   <th>Network</th>
                  <th>Phone number</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                 <td><input type="checkbox" name="tick" />&nbsp;</td>
                  <td>Godfred Akpan</td>
                  <td>Iron</td>
                  <td>MTN</td>
                  <td>09036709916</td>
                </tr>
                  <tr>
                 <td><input type="checkbox" name="tick" />&nbsp;</td>
                  <td>Godfred Akpan</td>
                  <td>Iron</td>
                  <td>MTN</td>
                  <td>09036709916</td>
                </tr>
                  <tr>
                 <td><input type="checkbox" name="tick" />&nbsp;</td>
                  <td>Godfred Akpan</td>
                  <td>Iron</td>
                  <td>MTN</td>
                  <td>09036709916</td>
                </tr>
                  <tr>
                 <td><input type="checkbox" name="tick" />&nbsp;</td>
                  <td>Godfred Akpan</td>
                  <td>Iron</td>
                  <td>MTN</td>
                  <td>09036709916</td>
                </tr>
             
              
                </tr>               
              </tbody>
            </table>    <br><br>
<hr><br><br>
						
<table>
    <th><div class="orange-box"><h4 class="title" align="center"></h4></div></th><br>
    
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <td><select class="form-control cus-input" name="beneficiary_id" >
 <option>TOP UP AIRTIME</option>
                           <option value="1000">1000</option>
                            <option value="5000">5000</option>
                            <option value="10000">10000</option>
                            <option value="50000">50000</option>
                            <option value="100000">100000</option>
                            
   </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="" type="submit" class="btn btn-primary pull-right">Tup Up</button></td>
    <td height="200">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       
        <select class="form-control cus-input" name="beneficiary_id">
 <option>TOP UP DATA</option>
                           <option value="1000">1000</option>
                            <option value="5000">5000</option>
                            <option value="10000">10000</option>
                            <option value="50000">50000</option>
                            <option value="100000">100000</option>
                            
   </select>&nbsp;&nbsp;&nbsp;&nbsp;<button id="btn btn-primary btn-block" type="submit"   class="btn btn-primary pull-right">Top Up</button></td>
    
    </tr>
               
    
                    
       
                </table> <br><br><hr><br>
<table>

       <th><div class="orange-box"><h4 class="title" align="center">TRANSACTION HISTORY</h4></div></th><br><br><div class="">
	
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

