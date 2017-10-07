@extends('layouts.user')

@section('title')
      Transfer to wallet
@endsection
@section('content')

<link rel="stylesheet" href="/css/form.css">

 <div class="col-md-6 col-sm-6">
                    <h4 class="intro text-left" >Transfer to another Wallet account </h4>
                    <form id="trform" class="input-form">
                        <div class="form-group">
                            <select class="form-control cus-input" name="sourceWallet">
                                <option value="">Select sender Wallet</option>
                                    @foreach($wallets as $wallet)
                                          <option value="{{ $wallet->wallet_code }}">{{ $wallet->wallet_name}}</option>                                      
                                    @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <select class="form-control cus-input" name="recipientWallet">
                                <option value="">Select recipient wallet</option>
                                    @foreach($wallets as $wallet)
                                          <option value="{{ $wallet->wallet_code }}">{{ $wallet->wallet_name}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="number" class="form-control cus-input" name="amount" id="amount" placeholder="Amount">
                        </div>
                        
                        <div class="form-group center-block">    
                          <button id="transferbt" type="submit" class="btn btn-primary center-block">Transfer</button>
                        </div>
                    </form>
            </div>

  <script type="text/javascript">      

        $("#transferbt").click(function(e) {
          e.preventDefault();
          var data = $("#trform").serializeArray();
          $.getJSON('/walletTransfer', data, function(resp) {
            if(resp.status == 'failed') {
              var options = {
                  backdrop: false,
                  keyboard: false,
                  show: true,
                  remote: false
              }
             $("#fmsg").html(resp.msg);
             $("#fmodal").modal(options);
            } else if(resp.status == 'success'){
              $("[name=sourceWallet]").val('');
              $("[name=recipientWallet]").val('');
              $("[name=amount]").val('');
              var options = {
                  backdrop: false,
                  keyboard: false,
                  show: true,
                  remote: false
              }
              $("#smodal").modal(options);
            }
          })
        });
      });
  </script>
  
@endsection

