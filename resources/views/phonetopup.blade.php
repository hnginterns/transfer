@extends('layouts.user') 
@section('title') 
Phone Top Up 
@endsection 
@section('content')
<style>
i.can {
    color: #00a65a;
  }
  i.cannot {
    color: #dd4b39;
  }
  i.sent {
    color: #00a65a;
    filter: blur(10px);
    -webkit-filter: blur(10px);
    z-index: -1
  }
  em.sent {
    opacity: 0.5;
    z-index:-l;
  }
  i.received {
    color: #dd4b39;
    
    
  }
  
  hr {
    color: #39689C;
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
}
  
  }
  first {
    float: right;
    margin: 0 0 10px 10px;
  }
  form group {
    height: 400;
  }
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 899;
  }
  .starred {
    color: #f0ad4e;
    font-size: 15px;
    font-weight: bold;
  }
  .not-starred {
    color: grey;
    font-size: 15px;
    font-weight: bold;
  }
  td,
  th {
    border: px solid #dddddd;
    text-align: center;
    padding: 5px;
  }
  tr:nth-child(even) {
    width: 100;
    background-color: #dddddd;
  }
</style>



<div class="row">
  <div class="col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h2>Wallet Balance &#8358; {{ number_format($wallet->balance),2}}</h2>
      </div>
      <div class="panel-body text-center">
        <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#walletTopUp">Fund Wallet</button>
      </div>
    </div>

  </div>

  <div class="col-md-6">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h2> Current Bal with provider: &#8358;{{ number_format($topupbalance),2}} </h2>
      </div>
      <div class="panel-body text-center">
        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#Purchase">Purchase</button>
      </div>
    </div>

  </div>
</div>



<div class="row">
  <div class="col-md-12 text-center">
<hr>
        <ul class="nav nav-pills nav-justified ">
            <li class="active"><a data-toggle="pill" href="#contactlistbox">Top Up</a></li>
            <li><a data-toggle="pill" href="#fundhistorybox">Funding History</a></li>
            <li><a data-toggle="pill" href="#topuphistorybox">Topup History</a></li>
        </ul>

    </div>
</div>
<hr>
<div class="tab-content">
  <div id="contactlistbox" class="tab-pane fade in active">
      <div class="orange-box">
          <h4 class="title" align="center">GROUP TOP UP</h4>
      </div>
      <div class="row">
  <div class="col-md-12 clear text-center">

    <form class="form form-inline col-md-12" action="{{ route('topup.phone.group')}}" method="POST" role="form">
      {{csrf_field()}} 
      @if(count($tags) > 0)
        <select name="topup_group" class="form-control groups-list">
          <option data-value="all" value="all">Show All</option>
          @foreach($tags as $group) 
            <option value="{{ $group->id }}" data-value="{{ strtolower($group->name) }}">{{ $group->name }}</option> 
          @endforeach 
        </select>
      @endif
      <input class="form-control group-amount-topup" type="number" name="amount" min="50" required placeholder="Enter Amount to be shared">
      <button class="btn btn-success topup-group-btn" type="submit">Top Up Group</button>
      <div style="margin-top: 10px;" class="alert alert-info col-md-8 col-md-offset-2 groups-topup text-center hidden"></div>
    </form>
      </div></div>
      <hr />
      <div class="row">
      <div class="orange-box">
          <h4 class="title" align="center">INDIVIDUAL TOP UP</h4>
      </div>

        <div class="col-md-2">
        </div>
        <div class="col-md-5"></div>
      
    </div>

    <div class="table table-responsive">
      <table class="table" id="contact-table">
        <thead>
          <tr>
            <td><input type="checkbox" onClick="toggle(this)" /> Select All</td>
            <td>Star</td>
            <td>Name</td>
            <td>Phone Number</td>
            <td>Network</td>
            <td>Title</td>
            <td>Group</td>
            <td>Weekly Limit</td>
            <td>Total recharge so far (&#8358;)</td>
            <td>Enter Amount<br>(airtime)</td>
            
          </tr>
        </thead>
        <tbody> 
          <form class="send-airtime topup-multiple" action="{{ route('topup.phone.multiple')}}" method="POST" role="form">   
          <a href="#dataModal" class="btn btn-info pull-right" style="margin-left: 5px; margin-bottom: 3px;" data-toggle="modal">Top-up Data</a>
          <button type="submit" class="btn btn-success pull-right btn-topup-all" style="margin-right: 5px; margin-bottom: 3px;">Top up all</button>
            {{ csrf_field() }} @if(count($phones) > 0) @foreach($phones as $phone)
            <tr class="contact-fn">

              <td><input type="checkbox" name="checked[]" value="{{$phone->id}}" class="checkbox
              @if(count($phone->groups) > 0) @foreach($phone->groups as $group) {{ strtolower($group->name) }} @endforeach @endif"></td>
              <td><i onclick="starContact({{$phone->id}})" class="fa {{$phone->starred ? 'fa-star starred': 'fa-star-o not-starred'}}"></i></td>
              <td class="firstName" data-user="{{ $phone->id }}">{{ $phone->firstname }} {{ $phone->lastname }}</td>
              <td class="phone">{{ $phone->phone }}</td>
              <td class="phoneRef">{{ $phone->netw }}</td>
              <td class="amount">{{ $phone->title }}</td>
              <td class="dept">{{ $phone->department }}</td>
              <td class="max-tops">{{ $phone->weekly_max }}</td>
              <td>{{$phone->topupTotal->sum('amount')}}</td>
              <td><input class="form-control input-airtime-amount" type="number" min="50" name="amount[{{$phone->id}}]" placeholder="Enter Amount"
                </td>
              <td>

                
              </td>
              <td>
               
                </td>

              
            </tr>
            @endforeach @else
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
          <td></td>
          <td></td>
        </tr>
        </form>
      </table>
  </div>

        </div>
        <div id="fundhistorybox" class="tab-pane fade">

          <div class="orange-box">
              <h4 class="title" align="center">Fund Transfer History</h4>
        </div>
          <br>
          <div class="table-responsive">
            <table class="table table-hover table-condensed" id="topuphistory">
             <thead>
               <tr>
                  <th>S/N</th>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Phone Number</th>
                  <th>Amount</th>
                  <th>Status</th>
                  <th>Ref</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @php($count = 1)
                @forelse($fundhistory as $key => $walletfundhistories)
                <tr>
                  <td>{{$count}}</td>
                  <td>{{$walletfundhistories->firstName}}</td>
                  <td>{{$walletfundhistories->lastName}}</td>
                  <td>{{$walletfundhistories->phoneNumber}}</td>
                  <td>{{$walletfundhistories->amount}}</td>
                  <td>{{$walletfundhistories->status}}</td>
                  <td>{{$walletfundhistories->ref}}</td>
                  <td>{{$walletfundhistories->created_at}}</td>
                </tr>
                @php($count++)
                @empty
                <p>No record found</p>
                @endforelse
              </tbody>
            </table>
          </div>

        </div>

        <div id="topuphistorybox" class="tab-pane fade">

            <div class="orange-box">
              <h4 class="title" align="center">TOPUP HISTORY</h4>
            </div>
    
        <div class="table table-responsive">
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
                <th>Response</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>

              @if(count($topuphistory) > 0) @foreach($topuphistory as $key=> $hist)
              <tr>
                <th>{{ $hist->contact != null ? $hist->contact->phone : 'XXXX'}}</th>
                <th>{{ $hist->contact != null ? $hist->contact->lastname : 'XXXX'}}</th>
                <th>{{ $hist->contact != null ? $hist->contact->netw : 'XXXX' }}</th>
                <td class="phone">{{ $hist->amount }}</td>
                <td class="phoneRef">{{ $hist->ref }}</td>
                <td class="amount">{{ $hist->user != null ? $hist->user->username: 'XXXX' }}</td>
                <td class="amount"><i class="fa {{ $hist->status == 'success' ? 'fa-check-circle can' : 'fa-times-circle cannot'}}"></i></td>
                <td class="amount">{{ $hist->txn_response}}</td>
                <td class="amount">{{ $hist->created_at }}</td>

              </tr>
              @endforeach @else
              <tr>
                <td></td>
                <td>No Topup Transactions yet</td>
                <td></td>
                <td></td>
              </tr>
              @endif

              
            </tbody>
          </table> 
    
          
        </div>
      </div>

<!---Modal for wallet top Up-->
<div class="modal fade" id="walletTopUp">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

        <h4 class="modal-title text-center">Top up wallet</h4>

      </div>
      <div class="modal-body">
        <div class="box-header with-border">
          <h3 class="box-title">Card Details</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form action="{{config('app.url')}}/phonetopup/fund" method="POST" role="form form-horizontal">
            {{csrf_field()}}
            <!-- text input -->
            <div class="container-fluid">
              <fieldset>
                <input type="hidden" name="wallet_code" value="{{$wallet->wallet_code}}">
                <input type="hidden" name="wallet_name" value="{{$wallet->wallet_name}}">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="cc_name">First Name</label>
                      <div class="controls">
                        <input name="fname" class="form-control" value="{{Auth::user()->fundWalletInfo == null ? '' : Auth::user()->fundWalletInfo->firstname}}" id="cc_name" title="First Name" required type="text">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label for="cc_name">Last Name</label>
                      <div class="controls">
                        <input name="lname" class="form-control" value="{{Auth::user()->fundWalletInfo == null ? '' : Auth::user()->fundWalletInfo->lastname}}" id="cc_name" title="last name" required type="text">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <div class="controls">
                    <input name="phone" pattern="\+234\d{10}" class="form-control" value="{{Auth::user()->fundWalletInfo == null ? '' : Auth::user()->fundWalletInfo->phonenumber}}" autocomplete="off" maxlength="20" required="" type="text">
                  </div>
                </div>

                <div class="form-group">
                  <label>Email Address</label>
                  <div class="controls">
                    <input name="emailaddr" class="form-control" value="{{Auth::user()->fundWalletInfo == null ? '' : Auth::user()->fundWalletInfo->email}}" autocomplete="off" required="" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label>Card Number</label>
                  <div class="controls">
                    <input name="card_no" class="form-control" autocomplete="off" maxlength="20" required="" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <label>Card Expiry Date</label>
                  <div class="controls">
                    <div class="row">
                      <div class="col-md-9">
                        <select class="form-control" name="expiry_month">
                                                                       <option value="01">January</option>
                                                                       <option value="02">February</option>
                                                                       <option value="03">March</option>
                                                                       <option value="04">April</option>
                                                                       <option value="05">May</option>
                                                                       <option value="06">June</option>
                                                                       <option value="07">July</option>
                                                                       <option value="08">August</option>
                                                                       <option value="09">September</option>
                                                                       <option value="10">October</option>
                                                                       <option value="11">November</option>
                                                                       <option value="12">December</option>
                                                                   </select>
                      </div>
                      <div class="col-md-3">
                        @php($year = date('Y'))
                        <select class="form-control" name="expiry_year">
                                                                      @for($i = $year; $i < $year + 6; $i++)
                                                                              <option value="{{$i}}">{{$i}}</option>
                                                                      @endfor
                                                                       
                                                                    
                                                                   </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label>Card CVV</label>
                      <div class="controls">
                        <input class="form-control" autocomplete="off" maxlength="3" pattern="\d{3}" title="Three digits at back of your card" required=""
                          type="password" name="cvv">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label>Pin</label>
                      <div class="controls">
                        <input class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="pin" required="" type="password" name="pin">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label>Amount</label>
                      <div class="input-group">
                        <div class="input-group-addon">₦</div>
                        <input name="amount" type="text" class="form-control" id="amount" placeholder="Amount">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label></label>
                  <div class="controls">
                    <button type="submit" class="btn btn-primary">Top up</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </fieldset>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>

<!--row ends-->

<div class="container">
  <!-- Trigger the modal with a button -->
  <!-- Modal -->
  <div class="modal fade" id="Purchase" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Transfer To Service Provider</h4>
        </div>
        <div class="modal-body">
            <div class="modal-body" style="padding: 5px;">
              <form action="{{config('app.url')}}/topup/wallet" method="post">
              {{ csrf_field() }}
              <input name="wallet_id" value="{{$wallet->id}}" type="hidden"> 
              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                  <input class="form-control" name="amount" placeholder="Amount" type="number" required />
                </div>
              </div>
            <div class="panel-footer" style="margin-bottom:-14px;">
              <button type="submit" class="btn btn-success">Purchase</button>
              <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

  <br>






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
                <input type="text" class="form-control firstName" name="firstName">
              </div>
              <div class="form-group col-md-6">
                <label for="Phone" class="col-form-label">Phone</label>
                <input type="text" class="form-control phone" name="phone">
              </div>

              <hr />
              <div class="form-group col-md-12">
                <label for="Lastname" class="col-form-label">Amount</label>
                <input type="text" name="amount" class="form-control" placeholder="Please Enter Amount" required>
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
              
              <div class="row">
                <div class="form-group col-md-6 col-md-offset-3">
                  @if(count($phones) > 0) 
                    <label for="data-user" class="col-form-label">Select User To Topup</label>
                    <select id="data-user" name="current_id" class="form-control data-topup-select">
                      @foreach($phones as $phone)
                        <option data-network="{{ $phone->netw }}" value="{{ $phone->id }}">
                          {{ $phone->firstname . ' ' . $phone->lastname .' (' . $phone->netw . ')' }}
                        </option>
                      @endforeach
                    </select>
                  @endif
                </div>
              
                <div class="form-group col-md-6 col-md-offset-3">
              
                  <label for="data-amount" class="col-form-label">Data Amount</label>
                  <select id="data-amount" name="amount" class="form-control data-amount">

                    <optgroup class="MTN" label="MTN">
                      <option value="200">250MB (#200)</option>
                      <option value="300">500MB (#300)</option>
                      <option value="550">1GB (#550) </option>
                      <option value="850">2GB  (#850)</option>
                      <option value="1100">3GB (#1100)</option>
                      <option value="1650">5GB (#1650)</option>
                    </optgroup>

                    <optgroup class="9MOBILE" label="9MOBILE">
                      <option value="250">250MB (#250)</option>
                      <option value="350">500MB (#350)</option>
                      <option value="650">1GB (#650)</option>
                      <option value="1000">1.5GB (#1000)</option>
                      <option value="1900">3GB (#1900)</option>
                      <option value="3100">5GB (#3100)</option>
                    </optgroup>

                    <optgroup class="GLO" label="GLO">
                      <option value="900">1.6GB/3.2GB</option>
                      <option value="1800">3.75GB/7.5GB</option>
                      <option value="2250">5GB/10GB</option>
                      <option value="2650">6GB/12GB</option>
                      <option value="3550">8GB/16GB</option>
                      <option value="4450">12GB/24GB </option>
                    </optgroup>

                    <optgroup class="AIRTEL" label="AIRTEL">
                      <option value="950">1.5GB</option>
                      <option value="1900">3.5GB</option>
                      <option value="2375">5GB</option>
                      <option value="3325">7GB</option>
                      <option value="1100">3GB</option>
                      <option value="1650">5GB</option>
                    </optgroup>

                  </select>
              </div>
            </div>
          <div class="row text-center">
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
  @if (session('otp'))
  <script type="text/javascript">
    $(document).ready(function () {
      $('#myModal').modal();
    });
  </script>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Otp</h4>
        </div>
        <div class="modal-body">
          <p>{{session('otp')}}</p>
          <div class="row">
            <div class="col-md-6 col-md-offset-2">
              <form action="{{config('app.url')}}/phonetopup/otp" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="ref" value="{{$cardWallet->ref}}">
                <div class="form-group">
                  <input type="password" class="form-control" name="otp" placeholder="Enter OTP">
                </div>
                <button type="submit" class="btn btn-default btn-block">Submit</button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
  @endif
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
    $('.modal#airtimeModal').on('click', 'button.btn-send', function () {
      $('.modal#airtimeModal').find('form.topup-multiple').submit();
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
    $('.modal#dataModal').on('click', 'button.btn-send', function () {
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

  <script type="text/javascript">
    function toggle(source) {
      checkboxes = document.getElementsByName('checked[]');
      for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
      }
    }
  </script>

  <script type="text/javascript">
      $("#department").change(function () {
        $("#contacts-form").submit();
      });
    $(".select-all").click(function () {
      if ($(".select-all").is(':checked')) {
        $(".checkbox").each(function () {
          $(this).prop("checked", true);
        });
      } else {
        $(".checkbox").each(function () {
          $(this).prop("checked", false);
        });
      }
    });
    $(".checkbox").click(function () {
      if ($(this).prop('checked') == false) {
        $(".select-all").prop("checked", false);
      }
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function () {
        $('#contact-table').DataTable({
          initComplete: function () {
            this.api().columns([1, 3]).every(function () {
              var column = this;
              var select = $('<select><option value=""></option></select>')
                .appendTo($(column.header()).empty())
                .on('change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                    $(this).val()
                  );
                  column
                    .search(val ? '^' + val + '$' : '', true, false)
                    .draw();
                });
              column.data().unique().sort().each(function (d, j) {
                select.append('<option value="' + d + '">' + d + '</option>')
              });
            });
          }
        });
    });
  </script>
  <!-- script enbles checkbox to be clicked when you click on the row -->
  <script>
    $('#contact-table tr').click(function () {
      ele = $(this).find('td input:checkbox')[0];
    ele.checked = !ele.checked;
    });
    $('input:checkbox').click(function (e) {
      e.stopPropagation();
    })
    $('#topuphistory tr').click(function () {
      ele = $(this).find('td input:checkbox')[0];
    ele.checked = !ele.checked;
    });
    $('input:checkbox').click(function (e) {
      e.stopPropagation();
    })
    $('#datatable tr').click(function () {
      ele = $(this).find('td input:checkbox')[0];
    ele.checked = !ele.checked;
    });
    $('input:checkbox').click(function (e) {
      e.stopPropagation();
    });
    $(function () {
        $('.groups-list').change(function () {
          var current = $(this).val();
          if (current == 'all') {
            if ($('#contact-table tr').hasClass('hidden')) {
              $('#contact-table tr').removeClass('hidden');              
            }
            if (! $('.groups-topup').hasClass('hidden')) {
              $('.groups-topup').html('').addClass('hidden');
            }
            $('input.checkbox').prop('checked', false);
            return;
          }
          $(this).find('option').each(function () {
            if (this.value == current) {
              var theClass = $(this).data('value');
              $('.groups-list').data('selected-class', theClass);
              $('input.checkbox').prop('checked', false);
              $('input.checkbox').each(function() {
                  if ($(this).parents('tr').hasClass('hidden')) {
                    $(this).parents('tr').removeClass('hidden');
                  }
                  if (current == 'all') {
                    return;
                  }
                  if (! $(this).hasClass(theClass)) {
                      $(this).parents('tr').addClass('hidden');
                  }
              });
              var totalUsers = $('input.checkbox.' + theClass);
              totalUsers.prop('checked', true);
              var membersCount = (totalUsers.length > 0) ? totalUsers.length : 'no';
              var member = (totalUsers.length > 1) ? ' members ' : ' member ';
              $('.groups-topup').html('You Have <b>' + membersCount + member + '</b> in this group to topup').removeClass('hidden');
            }
          });
        });
        $('.group-amount-topup').change(function () {
            var selectedClass = $('.groups-list').data('selected-class');
            var listItems = $('input.checkbox.' + selectedClass);
            var newAmount = parseInt($(this).val()) / listItems.length;
            listItems.parents('tr').find('input.input-airtime-amount').val(newAmount);
        });
        $('button.topup-group-btn').click(function (e) {
            e.preventDefault();
            $('form.send-airtime.topup-multiple').submit();
        });
        $('select.data-topup-select').change(function () {
            var phone_id = $(this).val();
            var phone_network = '';
            $(this).find('option').each(function() {
              if ($(this).prop('value') == phone_id) {
                phone_network = $(this).data('network'); 
              }
            });
            $('select.data-amount').find('optgroup').each(function () {
              if ($(this).prop('disabled', true)) {
                $(this).prop('disabled', false);
              }
              if (! $(this).hasClass(phone_network)) {
                $(this).prop('disabled', true)
              }
            });
        });
      });
  </script>

  <script>
    function starContact(id) {
      var base = "{{ config('app.url')}}";
      $.ajax({
          type: "GET",
        url: base + "/phonetopup/star/" + id,
        success: function (json) {
          location.reload(true);
        }
      });
    }
  </script>

  <script>
function confirmTopup() {
    confirm("Do you want to proceed?");
}
$('.btn-topup-all').click(function(e) {
    e.preventDefault();
    var btnSubmit = $(this);
    var totalContacts = $('input.checkbox').is(':checked').length;
    swal({
      title: '<i>Are You Sure</u>',
      type: 'info',
      html: 'You are sending airtime to ' + totalContacts + ' contacts',
      showCloseButton: true,
      showCancelButton: true,
      confirmButtonText: 'Go Ahead',
      cancelButtonText: 'Not Anymore',
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33'
    }).then(function() {
        $('form.send-airtime.topup-multiple').submit();
    }).catch(swal.noop);
});
</script>
@endsection
