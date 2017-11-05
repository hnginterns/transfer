@extends('layouts.admin') @section('title', 'Manual Fund Wallet') @section('subtitle', 'Fund Wallet') @section('content')
<div class="row">
    <div class="col-md-10 col-sm-offset-1">
        <br>

        <div class="panel panel-default">
            <div class="panel-heading">
                Fund <strong>{{ $wallet->wallet_name }} </strong> Wallet with Card <a href="{{ route('wallets.details', $wallet->id) }}"
                    class="label label-primary pull-right">Back</a>
            </div>

            <div class="panel-body"> 

                <form action="{{$wallet->id}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="wallet_name" value="{{$wallet->wallet_name}}">
                    <input type="hidden" name="wallet_code" value="{{$wallet->wallet_code}}">
                    <div class="container-fluid">
                        <fieldset>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label for="cc_name">First Name</label>
                                        <div class="controls">
                                            <input name="fname" class="form-control" id="cc_name" value="{{$user->fundWalletInfo == null ? '' : $user->fundWalletInfo->firstname}}" title="First Name" required type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="cc_name">Last Name</label>
                                            <div class="controls">
                                                <input name="lname" class="form-control" value="{{$user->fundWalletInfo == null ? '' : $user->fundWalletInfo->lastname}}" id="cc_name" title="last name" required type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label>Phone Number</label>
                                        <div class="controls">
                                            <input name="phone" class="form-control" value="{{$user->fundWalletInfo == null ? '' : $user->fundWalletInfo->phonenumber}}" pattern="\+234\d{10}" autocomplete="off" maxlength="20" placeholder="+23470******87"
                                                required="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <div class="controls">
                                                <input type="email" name="emailaddr" value="{{$user->fundWalletInfo == null ? '' : $user->fundWalletInfo->email}}" class="form-control" autocomplete="off" required="" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-5">
                                        <label>Card Number</label>
                                        <div class="controls">
                                            <input name="card_no" class="form-control" autocomplete="off" maxlength="20" required="" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label>Card Expiry Date</label>
                                        <div class="controls">
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
                                    </div>

                                    <div class="col-md-2">
                                        <label>Card Expiry Year</label>
                                        <select class="form-control" name="expiry_year">
                                            @for ($i = 2017;$i <= 2040;$i++)
                                            <option>{{$i}}</option>
                                            @endfor  
                                    </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <label>Card CVV</label>
                                        <div class="controls">
                                            <input class="form-control" autocomplete="off" maxlength="3" pattern="\d{3}" title="Three digits at back of your card" required=""
                                                type="number" name="cvv">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <label>Pin</label>
                                        <div class="controls">
                                            <input class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="pin" required="" type="password" name="pin">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
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
                                    <button type="submit" class="btn btn-primary">Fund Wallet</button>
                                    <a href="/admin/viewwallet/{{$wallet->id}}"><button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button></a>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@if(session('otp'))
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
                <h4 class="modal-title">Otp Validation</h4>
            </div>
            <div class="modal-body">
                <p>{{session('otp')}}</p>
                <div class="row">
                    <div class="col-md-6 col-md-offset-2">
                        <form action="{{config('app.url')}}/admin/wallets/otp" method="POST">
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

@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>