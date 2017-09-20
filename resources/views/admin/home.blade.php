<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Wallet Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
    crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
    crossorigin="anonymous"></script>

  <style>
    @import url('https://fonts.googleapis.com/css?family=Nunito+Sans');
    body {
      font-family: Nunito Sans;
    }

    nav {
      border-radius: 0 !important;
    }

    .menu {
      padding-top: 22px;
    }

    .menu-item {
      color: white;
      text-decoration: none !important;
    }

    .menu ul {
      display: flex;
      list-style: none;
    }

    .menu li {
      margin: 0 10px;
      width: 141px;
      height: 52px;
      padding: 10px 10px;
      background-color: #FD8032;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 4px;
    }

    .wallet-container {
      display: flex;
      flex-wrap: wrap;
      padding-top: 35px;
      justify-content: center;
    }

    .wallet {
      position: relative;
      width: 324px;
      height: 150px;
      background: #333333;
      margin: 15px;
    }

    .wallet .currency {
      position: absolute;
      width: 41px;
      height: 21px;
      left: 280px;
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
      left: 225px;
      top: 125px;
      color: white;
    }

    .profile {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background: gray;
      margin-top: 4px;
    }

    .profile-info{
      color: white;
      padding: 5px;
      line-height: 5.5px;
      margin-top: 10px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">TransferFunds</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li>
        <li><a href="#">Page 3</a></li>
        <li>
          <div class="profile"></div>
        </li>
        <li>
          <div class="profile-info">
            <p>Mr John Doe</p>
            <p>Log Out</p>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="menu">
      <ul>
        <li>
          <a href="" class="menu-item">Wallets</a>
        </li>
        <li>
          <a href="" class="menu-item">Transactions</a>
        </li>
        <li>
          <a href="" class="menu-item">Pay Bills</a>
        </li>
        <li>
          <a href="" class="menu-item">Lorem</a>
        </li>
        <li>
          <a href="" class="menu-item">Lorem</a>
        </li>
        <li>
          <a href="" class="menu-item">Accounts</a>
        </li>
        <li>
          <a href="" class="menu-item">Lorem</a>
        </li>
      </ul>
    </div>
    <div class="wallet-container">
      <div class="wallet">
        <p class="num">001</p>
        <p class="currency">NGN</p>
        <img src="img/wallet-i.svg" alt="" class="wallet-img">
        <p class="id">ID: 0125665</p>
        <div class="balance">₦5,263,200.00</div>
      </div>

      <div class="wallet">
        <p class="num">001</p>
        <p class="currency">NGN</p>
        <img src="img/wallet-i.svg" alt="" class="wallet-img">
        <p class="id">ID: 0125665</p>
        <div class="balance">₦5,263,200.00</div>
      </div>

      <div class="wallet">
        <p class="num">001</p>
        <p class="currency">NGN</p>
        <img src="img/wallet-i.svg" alt="" class="wallet-img">
        <p class="id">ID: 0125665</p>
        <div class="balance">₦5,263,200.00</div>
      </div>

      <div class="wallet">
        <p class="num">001</p>
        <p class="currency">NGN</p>
        <img src="img/wallet-i.svg" alt="" class="wallet-img">
        <p class="id">ID: 0125665</p>
        <div class="balance">₦5,263,200.00</div>
      </div>

      <div class="wallet">
        <p class="num">001</p>
        <p class="currency">NGN</p>
        <img src="img/wallet-i.svg" alt="" class="wallet-img">
        <p class="id">ID: 0125665</p>
        <div class="balance">₦5,263,200.00</div>
      </div>

      <div class="wallet">
        <p class="num">001</p>
        <p class="currency">NGN</p>
        <img src="img/wallet-i.svg" alt="" class="wallet-img">
        <p class="id">ID: 0125665</p>
        <div class="balance">₦5,263,200.00</div>
      </div>

      <div class="wallet">
        <p class="num">001</p>
        <p class="currency">NGN</p>
        <img src="img/wallet-i.svg" alt="" class="wallet-img">
        <p class="id">ID: 0125665</p>
        <div class="balance">₦5,263,200.00</div>
      </div>

      <div class="wallet">
        <p class="num">001</p>
        <p class="currency">NGN</p>
        <img src="img/wallet-i.svg" alt="" class="wallet-img">
        <p class="id">ID: 0125665</p>
        <div class="balance">₦5,263,200.00</div>
      </div>
    </div>
  </div>
</body>

</html>