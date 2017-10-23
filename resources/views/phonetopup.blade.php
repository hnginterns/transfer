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
                <h1>Current Balance: ₦ {{ number_format($topupbanlance),2}}</h1>
	<div class="orange-box"><h4 class="title" align="center">CONTACT LIST</h4></div>
          <div class="table-responsive">
                <table class="table">
              <thead>
                <tr>
                  <td>Select</td>
                  <td>Name</td>
                  <td>Phone Number</td>
                  <td>Network</td>
                  <td>Title</td>
                  <td>Department</td>
                  <td>Weekly Limit</td>
                  <td>Enter Amount<br>(airtime)</td>
                  <td>Action</td>
                </tr>
              </thead>


              <tbody>
                @if(count($phones) > 0)
                  @foreach($phones as $phone)
                    <tr>
                      <td><input type="checkbox" name="select" value="1"></td>
                        <td class="firstName" data-user="{{ $phone->id }}">{{ $phone->firstname }} {{ $phone->lastname }}</td>
                        <td class="phone">{{ $phone->phone }}</td>
                        <td class="phoneRef">{{ $phone->netw }}</td>
                        <td class="amount">{{ $phone->title }}</td>
                        <td class="amount">{{ $phone->department }}</td>
                        <td class="max-tops">{{ $phone->weekly_max }}</td>
                        <td>
                          <form>
                              <input class="form-control" type="text"  placeholder="Enter Amount" />
                          </form>
                        </td>
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
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><button class="btn btn-success">Top Up All</button></td>
                <td></td>
               </tr>
            </table>  
            
              <br>
<hr><br>
						
<div class="orange-box"><h4 class="title" align="center">TRANSACTION HISTORY</h4></div></th><br><div class="">
       
	
          <div class="table-responsive">
                <table id="datatable" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Phone</th>
                  <th>Name</th>
                  <th>Network</th>
                  <th>Amount</th>
                  <th>Ref</th>
                  <th>User</th>
                  <th>Status</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>

          @if(count($topuphistory) > 0)
                  @foreach($topuphistory as $hist)
                    <tr>
                        <th>{{ $hist->phone }}</th>
                        <th>{{ $hist->firstname }} {{ $hist->lastname }}</th>
                        <th>{{ $hist->netw }}</th>
                        <td class="phone">{{ $hist->amount }}</td>
                        <td class="phoneRef">{{ $hist->ref }}</td>
                        <td class="amount">{{ $hist->username }}</td>
                        <td class="amount">{{ $hist->status }}</td>
                        <td class="amount">{{ $hist->created_at }}</td>
                        
                    </tr>
                  @endforeach
                @else
                   <tr>
                      <td></td>
                      <td>No Topup Transactions yet</td>
                      <td></td>
                      <td></td>
                  </tr>
                @endif

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
            <input type="hidden" name="Airtime" class="Airtime">

            <div class="form-group col-md-6">
              <label for="Firstname" class="col-form-label">Name</label>
            <input type="text" class="form-control firstName" name="firstName" >
            </div>
            <div class="form-group col-md-6">
              <label for="Phone" class="col-form-label">Phone</label>
              <input type="text" class="form-control phone" name="phone" >
            </div>
          
            <hr />
            <div class="form-group col-md-12">
              <label for="Lastname" class="col-form-label">Amount</label>
              <input type="text" name="amount" class="form-control" placeholder="Please Enter Amount">          
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


<div class="modal fade" id="dataModal" tabindex="-1" role="dialog" aria-labelledby="dataModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Topup <span class="phoneToTopUp"></span> with Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-row">
          <form class="send-data" action="{{ route('topup.data.user')}}" method="POST" role="form">
            {{csrf_field()}}
            <input type="hidden" name="current_id" class="current_user">
            <input type="hidden" name="Data" class="Data">

            <div class="form-group col-md-6">
              <label for="Firstname" class="col-form-label">Name</label>
            <input type="text" class="form-control firstName" name="firstName" >
            </div>
            <div class="form-group col-md-6">
              <label for="Phone" class="col-form-label">Phone</label>
              <input type="text" class="form-control phone" name="phone" >
            </div>
          
            <hr />
      

          <select name="amount" class="form-control">

          <optgroup label="MTN">
            <option value="200">250MB (#200)</option>
            <option value="300">500MB (#300)</option>
             <option value="550">1GB (#550) </option>
            <option value="850">2GB  (#850)</option>
             <option value="1100">3GB (#1100)</option>
            <option value="1650">5GB (#1650)</option>
          </optgroup>

          <optgroup label="9MOBILE">
            <option value="250">250MB (#250)</option>
            <option value="350">500MB (#350)</option>
             <option value="650">1GB (#650)</option>
            <option value="1000">1.5GB (#1000)</option>
             <option value="1900">3GB (#1900)</option>
            <option value="3100">5GB (#3100)</option>
          </optgroup>

          <optgroup label="GLO">
            <option value="900">1.6GB/3.2GB</option>
            <option value="1800">3.75GB/7.5GB</option>
             <option value="2250">5GB/10GB</option>
            <option value="2650">6GB/12GB</option>
             <option value="3550">8GB/16GB</option>
            <option value="4450">12GB/24GB </option>
          </optgroup>

          <optgroup label="AIRTEL">
            <option value="950">1.5GB</option>
            <option value="1900">3.5GB</option>
             <option value="2375">5GB</option>
            <option value="3325">7GB</option>
             <option value="1100">3GB</option>
            <option value="1650">5GB</option>
          </optgroup>

        </select>





                    
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary btn-send">Send Data</button>
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
      $(this).find('form input.netw').val(row.find('td.netw').html());
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

<script type="text/javascript">
  $(function () {
    $('.modal#dataModal').on('show.bs.modal', function (e) {
      var btn = $(e.relatedTarget);
      var row = btn.parents('tr');
      $(this).find('form input.phoneRef').val(row.find('td.phoneRef').html());
      $(this).find('form input.current_user').val(row.find('td.firstName').data('user'));
      $(this).find('form input.firstName').val(row.find('td.firstName').html());
      $(this).find('form input.netw').val(row.find('td.netw').html());
      // $(this).find('form input.lastName').val(row.find('td.firstName').data('lastName'));
      $(this).find('form input.phone').val(row.find('td.phone').html());
      $(this).find('form .phoneToTopUp').val(row.find('td.phone').html());

    });
  });

  $('.modal#dataModal').on('click', 'button.btn-send' ,function () {
      console.log('Clcked');
      $('.modal#dataModal').find('form.send-data').submit();
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
