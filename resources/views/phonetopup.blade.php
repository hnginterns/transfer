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
                        <td class="firstName" data-user="{{ $phone->id }}">{{ $phone->firstname }} {{ $phone->lastname }}</td>
                        <td class="phone">{{ $phone->phone }}</td>
                        <td class="phoneRef">{{ $phone->network }}</td>
                        <td class="amount">{{ $phone->weekly_max }}</td>
                        <td class="max-tops">{{ $phone->weekly_max }}</td>
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
<hr><br>
						
<div class="orange-box"><h4 class="title" align="center">TRANSACTION HISTORY</h4></div></th><br><div class="">
       
	
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
                  <td>07099384743</td>
                <td>Successful</td>
                </tr>
                  <tr>
                
                  <td>12:2:2017</td>
                  <td>Data</td>
                  <td>1000</td>
                  <td>MTN</td>
                  <td>09036435625</td>
                <td>Successful</td>
                </tr>
                  <tr>
                 
                  <td>12:2:2017</td>
                  <td>Data</td>
                  <td>1000</td>
                  <td>MTN</td>
                  <td>08023425643</td>
                <td>Successful</td>
                </tr>
                  <tr>
                 
                  <td>12:2:2017</td>
                  <td>Data</td>
                  <td>1000</td>
                  <td>MTN</td>
                  <td>07053462544</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Topup <span class="phoneToTopUp"></span> with Airtime </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-row">
          <form class="send-airtime" action="{{ route('topup.phone.user')}}" method="POST" role="form">
            {{csrf_field()}}
            <input type="hidden" name="current_id" class="current_user">

            <div class="form-group col-md-6">
              <label for="Firstname" class="col-form-label">Name</label>
            <input type="text" class="firstName" name="firstName" >
            </div>
            <div class="form-group col-md-6">
              <label for="Phone" class="col-form-label">Phone</label>
              <input type="text" class="phone" name="phone" >
            </div>
            <hr />
            <div class="form-group col-md-12">
              <label for="Lastname" class="col-form-label">Amount</label>
              <input type="text" name="amount" placeholder="Please Enter Amount">          
            </div>      
                    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary btn-send">Send Airtime</button>
          </div>

        </form> 
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

  @endsection

@section('add_js')
<script type="text/javascript">
  $(function () {
    $('.modal#airtimeModal').on('show.bs.modal', function (e) {
      var btn = $(e.relatedTarget);
      var row = btn.parents('tr');
      $(this).find('form input.phoneRef').val(row.find('td.phoneRef').html());
      $(this).find('form input.current_user').val(row.find('td.firstName').data('user'));
      $(this).find('form input.firstName').val(row.find('td.firstName').html());
      // $(this).find('form input.lastName').val(row.find('td.firstName').data('lastName'));
      $(this).find('form input.phone').val(row.find('td.phone').html());
      $(this).find('form .phoneToTopUp').val(row.find('td.phone').html());
    });
  });

  $('.modal#airtimeModal').on('click', 'button.btn-send' ,function () {
      console.log('Clcked');
      $('.modal#airtimeModal').find('form.send-airtime').submit();
  })
//   $('.airtime').click(function() {

//     // get the invoice ID
//     var id = $(this).data('id');

//     // set up a GET route using the invoice ID and retrieve the result for that invoice
//     $.get('/topup/phone/' + id, function(response, status) {

//         // display the results in the modal
//         $('#airtimeModal .modal-body').html(response.data);
//     });
// });
</script>

@endsection
