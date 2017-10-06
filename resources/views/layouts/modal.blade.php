<!-- Modal -->
<div class="modal fade" id="topup{{ $smswalletdetail['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Top Up Sms Wallet with Moneywave</h4>
      </div>

      <div class="modal-body">
          <form class="" action="" method="post">

            <div class="input-group topup-input">
                <span class="input-group-addon" id="basic-addon1">User Wallet</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" value="{{ $smswalletdetail['username'] }}" readonly="">
            </div>

            <div class="input-group topup-input">
                <span class="input-group-addon" id="basic-addon1">Bank Code</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" value="{{ $smswalletdetail['bank_code'] }}" readonly="">
            </div>

            <div class="input-group topup-input">
                <span class="input-group-addon" id="basic-addon1">Bank Account</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1" value="{{ $smswalletdetail['bank_account'] }}" readonly="">
            </div>


          </form>

      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Top-Up</button>
      </div>

    </div>
  </div>
</div>
