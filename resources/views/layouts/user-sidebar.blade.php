<body style="background-color:#E6E6FA">
  
          <ul class="nav nav-sidebar">
          <br>
     
             
              <li>
                <a href="/dashboard">
                <i class="fa fa-dashboard fa-1x"></i> Dashboard
                </a>
              </li> <br>


              <li>
                <a href="/phonetopup">
                <i class="fa fa-mobile fa-2x"></i> Phone TopUp
                </a>
              </li> <br>
              
              <li>
                <a data-toggle="modal" data-target="#PurchaseTopUp" >
                <i class="fa fa-mobile fa-2x"></i> Fund Phone TopUp Wallet
                </a>
              </li> <br>
              
             
                                
              <li>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li> 

               

          </ul>
</div>

<div class="container">
                            <!-- Trigger the modal with a button -->
                            <!-- Modal -->
                            <div class="modal fade" id="PurchaseTopUp" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Transfer To Service Provider</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{config('app.url')}}/admin/transfer/topupUser" method="post" accept-charset="utf-8">
                                                <div class="modal-body" style="padding: 5px;">
                                                                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
                                                            <input class="form-control" name="amount" placeholder="Amount" type="number" required />
                                                        </div>
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
