<style media="screen">
    .inner-holder {
        background: #222d32;
        color: #b8c7ce;
        padding: 13px 15px;
        border-radius: 3px;
    }
    .beneficiary-container {
      padding: 30px;
      align: right;
    }

    .btn-primary {
        color: #b8c7ce;
        background-color: transparent !important;
        /*border-color: white !important;*/
        border: none !important;
        font-size: 12.5px;
    }

    i.fa.fa-plus {
      color: white;
      font-weight: 500;
    }

    .btn-success {
        background-color: #00a65a;
        border-color: #04864a;
        margin-left: 30px;
        padding: 10px !important;
    }

    i.fa {
      color: #b8c7ce;
    }

    .fa-trash-o:hover {
      color: #b32913;
    }

    .fa-eye:hover {
      color: #fff;
    }

    .flex {
      display: flex;
    }

    .float {
      flex: 1;
    }

    .beneficiary-row.row {
      margin-bottom: 30px;
    }

    h5.beneficiary-name {
      margin-bottom: 20px;
    }

    @media screen and (max-width:768px) {

      .single-beneficiary-holder.col-md-3 {
          margin-bottom: 20px;
          padding: 0px;
      }
    }
</style>

@extends('layouts.admin')

@section('content')


<center><div class="container-fluid">

  <div class="beneficiary-container">

      <div class="beneficiary-row row">
        <div class="single-beneficiary-holder col-md-6">
            <div class="inner-holder">
                <div class="flex">
                  <center><h4>Fund Main Wallet</h4>
                <h5 class="beneficiary-name"><b>Fund: </b> Wallet Name</h5>
                <span class="float"><a href="transaction-history"><button type="submit" class="btn btn-success btn-xs">view history</button></a></span>
              </div>
                <form action="fund" method="POST">
                  {{ csrf_field() }}
                  <input type="text" name="fname"  class="form-control input-defaulted" placeholder="First Name" required>     
                  <br><input type="text" name="lname"  class="form-control" placeholder="Last Name" required>       
                  <br><input type="text" name="phone"  class="form-control" placeholder="+2348031234567" required>       
                  <br><input type="email" name="emailaddr"  class="form-control" placeholder="Email Address" required>       
                  <br><input type="number" name="card_no"  class="form-control" placeholder="Card No." required>       
                  <br><input type="number" name="cvv"  class="form-control" placeholder="CVV" required>                  
                  <br><input type="number" name="expiry_year" class="form-control " placeholder="Expiry Year" required>
                  <br><input type="number" name="expiry_month" class="form-control" placeholder="Expiry Month" required>
                  <br><input type="number" name="pin" class="form-control" placeholder="PIN" required>
                  <br><input type="number" name="amount" class="form-control" placeholder="Amount" required>
                  <br><button type="submit" class="btn btn-info" name="button">Fund</button>
                  <button type="button" class="btn btn-danger" name="button">Cancel</button>
                </form>                
            </div>
        </div>
      </div>


    </div>
   @if (session('otp'))
   <script type="text/javascript">
        $(document).ready(function() {
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
              <form action="otp" method="POST">
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
