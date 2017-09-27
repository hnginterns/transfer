
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Wallet Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="/css/dashboard-style.css">
</head>

<body>
    @section('content', 'Dashboard')
    @include('users/user-nav')

      <div class="col-md-10">
        <div class="row">
          @foreach($wallets as $wallet)
            <div class="col-md-4">
              <div class="panel panel-info">
                <div class="panel-heading">
                  <i class="fa fa-money"></i> Wallet ID: <i class="fa fa-lock"></i> {{ $wallet->id }}
                  <span class="pull-right"><i class="fa fa-money"></i>
                    ₦ {{ $wallet->balance }}
                  </span>
                </div>
                <div class="panel-body">
                  <p class="lead">NGN</p>
                  <img src="http://www.casumobonus.com/wp-content/uploads/2017/05/e-wallet-casumo.png" width="40%" height="30%" alt="Wallet Photo">
                  <hr />
                  <p class="small">Wallet Code: {{ $wallet->wallet_code}}</p>
                    @foreach($transaction as $transact)
                      @if($transact['uref'] == $wallet->wallet_code)
                        ₦ {{ $transact['balance']}}
                      @endif
                    @endforeach
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {

        $('#navb').click(function() {

            $('#sidebar').animate({
                left: "0px",
                "z-index": 10000
            }, 200).css(
              "background-color" , "rgb(37, 49, 63)",
              "height" , "200vh"
            );

            $('a.side-item').css(
                "color" , "#fff"
            );
        });

        $('#close').click(function() {

            $('#sidebar').animate({
                left: "-1000px",
                "z-index": 10000
            }, 200);
        });
      });
  </script>
</body>

</html>