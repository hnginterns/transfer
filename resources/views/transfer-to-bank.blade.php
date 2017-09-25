<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Bank Transfer</title>
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
            margin-top: 10%;
            padding: 40px 0 60px;
        }
        .admin-login {
            width: 80%;
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
        .hidden-sm {
            display: none;
        }
    }

    @media screen and (max-width:768px) {
      #sidebar {
      padding: 0;
      position: absolute;
      left: -238px;
      top: 30px;
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

    .wallet-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 30px;
    }

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

    i.fa-window-close {
      font-size: 20px;
      color: #fff;
      margin: 20px;
      display: none;
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
        <li><a href="#" style="color:white; font-size:18px;">Bank Transfer</a></li>
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
              <a href="/transfer-to-wallet" class="side-item">Wallet Transfer</a>
          </li>

           <li class="side-items">
              <a href="/transfer-to-bank" class="active-sidebar">Bank Transfer</a>
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

      <div class="col-sm-10">
        <div class="container-fluid">

          <div class="wallet-container">

            <div class="col-md-offset-2 col-md-10 main-content">
              <div class="login-box" style="">
                  <img src="/svg/naira.svg" alt="no preview" class="transfer-icon">
                  <h4 class="intro" style="font-size: 20px;">Transfer to bank account </h4>
                  <form class="admin-login" action="/transferAccount" method="POST">
                  {{csrf_field()}}
                    <div class="row">
                      <div class="col col-lg-6 form-holder">
                        <select class="form-control cus-input" name="beneficiary_id">
                          <option>Select Beneficiary</option>
                            @foreach($beneficiary as $key => $beneficiaries)
                              <option value="{{$beneficiaries->id}}">{{$beneficiaries->name}}</option>
                            @endforeach
                        </select>
                        </div>
                      <div class="col col-lg-6 form-holder">
                          <div class="form-group" style="margin: 30px 0;">
                              <input type="text" class="form-control cus-input" name="sender_name" id="senderName" placeholder="Sender's Name">
                          </div>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col col-lg-6 form-holder">
                        <div class="form-group">
                            <input type="text" class="form-control cus-input" name="lock_code" id="lockCode" placeholder="Lock code">
                        </div>
                      </div>
                      
                      <div class="col col-lg-6 form-holder">
                        <div class="form-group">
                            <input type="text" class="form-control cus-input" name="naration" id="naration" placeholder="naration (optional)">
                        </div>
                      </div>
                    </div>
                      <div class="row">
                        <div class="col col-lg-6 form-holder">
                          <div class="form-group">
                              <input type="number" class="form-control cus-input" name="amount" id="amount" placeholder="Amount">
                          </div>
                        </div>
                        <div class="col col-lg-6 form-holder">
                          <div class="form-group">
                            <input type="text" class="form-control cus-input" name="reference" id="amount" placeholder="reference">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col col-lg-6 form-holder">
                            <div class="form-group">
                                <input disabled type="text" class="form-control cus-input" value="{{$wallet->wallet_name}}" name="wallet_name" id="wallet_name">
                            </div>
                         </div>
                         <div class="col col-lg-6 form-holder">
                            <div class="form-group">
                                <input disabled type="text" class="form-control cus-input" value="{{$wallet->balance}}" name="wallet_balance" id="wallet_balance">
                            </div>
                         </div>
                      </div>

                      <button type="submit" class="btn btn-primary">Transfer</button>

                  </form>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div><br><br><br><br>

  @include('success');
  @include('failed');

  <footer class="navbar navbar-fixed-bottom" style="background-color:white;border-top:solid 2px grey;">
      <div class="container" style="text-align:center">
          <span class="text-muted company">2017 TransferFunds - All Rights Reserved</span>
      </div>
  </footer>

  <script src="/css/jquery.js"></script>
  <script src="/css/bootstrap.js"></script>
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
