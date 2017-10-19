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
    
/* 
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
	} */
    
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
                  <td>Name</td>
                  <td>Phone Number</td>
                  <td>Network</td>
                  <td>Amount Left</td>
                  <td>Weekly Limit</td>
                  <td>Action</td>
                </tr>
              </thead>


              <tbody>
                @if(count($phones) > 0)
                  @foreach($phones as $phone)
                    <tr>
                        <td>{{ $phone->firstName }} {{ $phone->lastName }}</td>
                        <td>{{ $phone->phoneNumber }}</td>
                        <td>{{ $phone->ref }}</td>
                        <td>{{ $phone->amount }}</td>
                        <td>{{ $phone->max_tops }}</td>
                        <td>

                          <a class="airtime btn btn-success" data-id="{{ $phone->id }}" data-toggle="modal" data-target="#airtimeModal">
                              Airtime
                          </a>

                          <a class="btn btn-success" data-id="{{ $phone->id }}" data-toggle="modal" data-target="#dataModal">
                              Data
                          </a>

                          

                        </td>
                    </tr>
                  @endforeach
                @else
                   <tr>
                      <td></td>
                      <td>No Phone Number Added</td>
                      <td></td>
                      <td></td>
                  </tr>
                @endif

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

 

   <!-- Modal -->
<div class="modal fade" id="airtimeModal" tabindex="-1" role="dialog" aria-labelledby="airtimeModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Topup {{ $phone->phoneNumber }} with Airtime </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{ route('topup.phone.submit')}}" method="POST" role="form">
          {{csrf_field()}}

           <input type="text" name="phoneRef" value="{{ $phone->ref }}" >
           <input type="text" name="name" value="{{ $phone->firstName  }}">
           <input type="text" name="name" value="{{ $phone->lastName  }}">
           <input type="text" name="phone" value="{{ $phone->phoneNumber }}">

           <input type="text" name="amount" placeholder="Please Enter Amount">          
                        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    
      
            </div>
          </div>
      </div>
      
    </div>
  </div>

</div>

<script type="text/javascript">
  $('.airtime').click(function() {

    // get the invoice ID
    var id = $(this).data('id');

    // set up a GET route using the invoice ID and retrieve the result for that invoice
    $.get('/topup/phone/' + id, function(response, status) {

        // display the results in the modal
        $('#airtimeModal .modal-body').html(response.data);
    });
});
</script>

    
  @endsection
