<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Wallet Transfer</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>

  <style>
    @import url('https://fonts.googleapis.com/css?family=Nunito+Sans');


    .search {
        margin-right: 50px !important;
    }

    .transfer-icon {
        height: 100px;
    }

    .upper {
        text-transform: uppercase;
    }

    .side-item.active {
        color: var(--hue-color);
    }

    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        border-top: 2px solid rgb(197, 195, 195);
        /* Set the fixed height of the footer here */
        height: 60px;
        line-height: 60px;
        /* Vertically center the text there */
        background-color: white;
    }

    .company {
        font-weight: bold;
        font-size: 17px;
    }

    .login-box {
      margin: auto;
      /* width: 60%; */
      /* display: flex; */
      /* flex-direction: column; */
      align-items: center;
      justify-content: center;
      margin-top: 1%;
      /*padding: 60px 0 80px;*/
  }

    .admin-login>.form-group>.form-control:focus,
    .cus-input:focus {
        border-color: #fd8032;
    }

    .admin-login>.form-group>.form-control,
    .cus-input {
        border-radius: 0;
        border: none;
        border-bottom: 2px solid grey;
    }

    .form-holder {
        margin-top: 20px;
    }

    .sign-in {
        color: #fd8032;
        font-weight: bold;
        font-size: 32px;
        margin-bottom: 15px;
    }

    i.fa-window-close {
      font-size: 20px;
      color: #fff;
      margin: 20px;
      display: none;
    }

    .promise {
        font-size: 15px;
        font-weight: 500;
        opacity: 0.8;
        letter-spacing: 0.02rem;
        text-align: center;
    }

    .intro {
        color: black;
        margin-bottom: 25px;
        font-weight: bold;
        font-size: 30px;
    }

    .admin-login>.form-group>label {
        color: white;
    }

    .admin-login>.form-group {
        text-align: left;
        margin-bottom: 30px;
    }

    .form-group {
        margin-bottom: 1.2rem;
    }

    .admin-login {
        text-align: center;
        width: 70%;
        margin-top: 20px;
    }

    .admin-login>button {
        background: #FD8032;
        padding: 10px 80px;
        border-radius: 63px;
        border-color: #FD8032;
        box-shadow: 0 4px 4px rgba(0, 0, 0, 0.25);
        cursor: pointer;
    }

    .admin-login>button:hover,
    .admin-login>button:focus {
        background: rgb(252, 251, 250);
        color: #FD8032;
        border-color: #FD8032;
        border-width: 2px;
    }

    .forgot-holder {
        margin-top: 15px;
    }

    #emailHelp {
        opacity: 0;
    }

    .forgot-holder {
        margin-top: 15px;
    }

    .forgot-password {
        color: black !important;
        font-size: 12px;
        margin-bottom: 0;
        opacity: 0.7;
        cursor: pointer;
    }

    @media screen and (max-width: 750px) {
        .login-box {
            width: 100%;
           margin-top: 0%;
           padding: 0px !important;
           margin-bottom: 40px !important;
        }
        .admin-login {
            width: 100%;
        }
        .intro{
            margin-bottom: 20px;
        }
        .sign-in {
            font-size: 18px;
        }
        .company {
            font-size: 14px
        }
        .promise {
            font-size: 12px;
        }

    }

    @media screen and (max-width:768px) {
      #sidebar {
      padding: 0;
      position: absolute;
      /*left: -238px;*/
      top: 30px;
      }
      .wallet-container {
        display: inline;
        flex-wrap: initial;
        justify-content: center;
        padding: 0px;
        }
      .navbar-form .form-control {
        display: inline-block;
        width: auto;
        vertical-align: middle;
        display: none;
      }
      .navbar-nav {
        margin: 7.5px -15px;
        display: none;
      }
      .profile {
        display: none;
      }
      .navbar-form.navbar-right {
        display: none;
      }
    }

    @media screen and (max-width:768px) {
        .hidden-sm {
            display: none;
        }
    }

    body {
      font-family: Nunito Sans;
    }

    nav {
      border-radius: 0 !important;
    }

    .menu {
      padding-top: 22px;
      box-sizing: border-box;
    }

    .menu-item {
      color: white;
      text-decoration: none !important;
    }

    .menu ul {
      display: flex;
      list-style: none;
      justify-content: space-around;
      padding: 0;
    }

    .menu li {
      width: 140px;
      height: 50px;
      background-color: #FD8032;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 2px;
    }

    .menu li:hover {
      background-color: #25313F;
      color: white;
    }

    /*.wallet-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 30px;
    }*/

    .wallet {
      position: relative;
      width: 300px;
      height: 150px;
      background: #333333;
      margin: 15px;
      cursor: pointer;
      box-shadow: -2px 4px 4px rgba(0, 0, 0, 0.15);
    }

    .wallet:hover {
      box-shadow: none;
    }

    .wallet .currency {
      position: absolute;
      width: 41px;
      height: 21px;
      left: 255px;
      top: 2px;


      font-style: normal;
      font-weight: bold;
      line-height: normal;
      font-size: 17px;
      letter-spacing: 0.68px;

      color: #FFFFFF;
    }

    .wallet-img {
      position: absolute;
      width: 63px;
      height: 77px;
      left: 130px;
      top: 33px;
    }

    .wallet .id {
      position: absolute;
      height: 14px;
      left: 5px;
      top: 130px;
      color: white;
    }

    .wallet .num {
      position: absolute;
      left: 7px;
      top: 5px;
      color: white;
    }

    .wallet .balance {
      position: absolute;
      width: 115px;
      left: 200px;
      top: 125px;
      color: white;
    }

    .profile {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: gray;
      margin-top: 4px;
      margin-left: 100px;
      margin-right: 100px;
    }

    .profile-info {
      color: white;
      padding: 5px;
      line-height: 5.5px;
      margin-top: 10px;
    }

    .active-sidebar {
      background-color: #C1D6DD;
    }

    .nav-search {
      margin-right: auto;
      margin-left: auto;
    }

    .navbar-brand {
      font-family: Nunito Sans;
      font-style: normal;
      font-weight: 800;
      line-height: normal;
      font-size: 20px;
      color: #FFFFFF !important;
    }

    .navbar-header img {
      width: 24px;
      height: 24px;
    }

    #sidebar {
      /* margin: 0 !important; */
      width: 200px;
      height: 500px;
      text-align: center;
      border-right: 1px solid rgb(192, 190, 190);
      margin-top: 30px;
      padding: 0;
    }

    .navbar-toggle {
      display: block;
      float: left;
    }

    .navbar {
      height: 50px;
      background: #25313F;
      box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }



    @media screen and (max-width:768px) {
      #sidebar {
        width: 250px !important;
        height: 200vh;
      padding: 0;
      position: absolute;
      left: -1000px;
      top: 20px;
      }
      i.fa-window-close {
        font-size: 20px;
        color: #fff;
        margin-bottom: 20px;
        display: block;
      }
      .n
      .navbar-form .form-control {
        display: inline-block;
        width: auto;
        vertical-align: middle;
        display: none;
      }
      .navbar-nav {
        margin: 7.5px -15px;
        display: none;
      }
      .profile {
        display: none;
      }
      .navbar-form.navbar-right {
        display: none;
      }
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">

        <a class="navbar-brand" href="#"> <span><img src="img/logo.png" alt=""></span>   PaysFund</a>

        <button type="button" id="navb" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
          aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      </div>

      <ul class="nav navbar-nav">
        <li><a href="#" style="color:white; font-size:18px;">Wallet Transfer</a></li>
      </ul>

      <div class="profile navbar-right"></div>
      <div class="navbar-form navbar-right">
        <input type="text" class="form-control" placeholder="Search">
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">

      <div class="col-sm-2" id="sidebar">

        <i class="fa fa-window-close" id="close" aria-hidden="true"></i>

        <ul class="nav nav-stacked">
          <li class="side-item"><a href="/dashboard">Dashboard</a></li>
          <li class="side-items">
              <a href="/wallet-view" class="side-item">Wallet View</a>
          </li>
          <li class="side-items">
              <a href="/transfer-to-wallet" class="active-sidebar">Wallet Transfer</a>
          </li>

           <li class="side-items">
              <a href="/transfer-to-bank" class="side-item">Bank Transfer</a>
          </li>

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

      <div class="col-sm-12 col-md-10">
        <div class="container-fluid">

          <div class="wallet-container">

            <div class="col-sm-8 col-md-offset-2 main-content">
                <div class="login-box" style="">
                    <img src="/svg/naira.svg" alt="no preview" class="transfer-icon">
                    <h4 class="intro" style="font-size: 20px;">Transfer to Wallet account </h4>
                    <form class="admin-login" action="/transferWallet" method="GET">
                        <div class="form-group">
                            <select class="form-control cus-input" name="sourceWallet">

                              
                                <option>Select sender Wallet</option>
                                    @foreach($wallets as $wallet)
                                     <option value="{{ $wallet->wallet_code }}">{{ $wallet->wallet_name}}</option>
                                    @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <select class="form-control cus-input" name="recipientWallet">

                              
                                <option>Select recipient wallet</option>
                                    @foreach($wallets as $wallet)
                                     <option value="{{ $wallet->wallet_code }}">{{ $wallet->wallet_name}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control cus-input" name="lock" placeholder="lock code">
                        </div>

                        <div class="form-group" style="margin-top: 50px;">
                            <input type="number" class="form-control cus-input" name="amount" id="amount" placeholder="Amount">
                        </div>
                        <button type="submit" class="btn btn-primary">Transfer</button>

                    </form>
                </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer">
      <div class="container" style="text-align:center">
          <span class="text-muted company">2017 TransferFunds - All Rights Reserved</span>
      </div>
  </footer>
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
