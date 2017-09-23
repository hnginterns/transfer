<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Account</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <style>

#mobile {
display: none;
            }

            body {
    text-align: center;
            height: 100%;
            width: 100%;
            }
            /* HEADER STYLES */
            .header {
    background-color: #4F4F4F;
            }

            .navbar {
    background: #4F4F4F;
    border: none;
    border-radius: 0px;
            padding: 10px 20px;
            color: white;
            }

            .navbar-brand {
    color: white !important;
            }

            #profile-pic {
            width: 50px;
            height: 50px;
            border-radius: 25px;
            background: #BDBDBD;
            }

            #search {
            margin: 10px 100px 0px 0px;
            text-align: center;
            height: 35px;
            width: 300px;
            border-radius: 4px;
            border-style: none;
            outline-style: none;
            }

            .fa-navicon {
    font-size: 22px;
            margin-right: 30px;
            }

            /* CARD STYLES */
            #cards {
            margin-bottom: 80px;
            margin-top: 50px;
            }

            #card-1,
            #card-2,
            #card-3 {
            display: inline-flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
            background: #4F4F4F;
            color: white;
            padding: 18px 50px;
            }

            #card-3 {
            background: #FF6200;
            margin-left: 50px;
            }

            #card-1 {
            background: white;
            color: black;
            }

            #card-1 div p,
            #card-2 div p,
            #card-3 div p {
            margin: 0px;
            padding: 0px;
            font-weight: bold;
            text-align: left;
            }

            .fa-money,
            .fa-bar-chart {
    font-size: 30px;
            margin-right: 20px;
            }

            #side-nav {
            transition: all 2s;
            background: white;
            width: 350px;
            height: 100%;
            position: fixed;
            top: 0%;
            z-index: 1000;
            left: -30%;
            }

            #side-nav #title {
            padding: 21px 20px;
            background: #4F4F4F;
            color: white;
            font-size: 20px;
            font-weight: bold;
            }

            #side-nav #title p {
            display: inline;
            margin-right: 50px;
            }

            #side-nav #menus {
            margin-top: 60px;
            }

            #side-nav #menus li {
            list-style: none;
            text-align: left;
            margin: 20px 10px;
            }

            #side-nav #menus a {
            text-decoration: none;
            font-size: 14px;
            text-transform: uppercase;
            color: black;
            }

            #menus {
            width: 100%;
            }

            #menus .active {
            background: #C1D6DD;
            padding: 10px 20px;
            }

            .fa-university {
    float: left;
    text-align: left;
                font-size: 56px;
                padding: 25px;
                margin-left: 100px;
                border-radius: 120px;
                background: #FD8032;
                color: white;
            }

            #wallet .heading {
                margin-top: 100px;
            }

            #beneficiary .heading {
                margin: 0px !important;
                padding: 0px !important;
            }

            .fa-plus {
    float: right;
    margin-right: 0px;
                padding: 10px;
                border-radius: 5px;
                font-size: 20px;
                background: #FD8032;
                color: white;
            }

            #base-container {
                text-align: center;
            }

            #base-container td {
                padding: 15px 70px;
                border-bottom: 1px solid #333333;
            }

            #wallet {
                margin-top: 150px;
                padding: 10px 80px;
            }

            #beneficiary {
                padding: 10px 90px;
            }

            #beneficiary-table td {
            padding: 15px 60px;
            }

            #wallet .title {
            }

            .title {
    padding-top: 20px;
                padding-bottom: 0px;
                text-align: left !important;
                font-size: 18px;
                font-weight: bold;
            }

            .fa-plus {
    margin-bottom: 40px;
            }

            table {
    margin-top: 0px;
                margin-bottom: 100px;
                padding-top: 0px;
            }

            .title {
    float: left;
    margin-bottom: 20px;
            }

            .table-header {
    font-weight: bold;
            }

            /* RESPONSIVE STYLE */
            @media (max-width: 1000px) {
    #mobile {
    display: inline;
}

            #side-nav {
                transition: all 2s;
                background: white;
                width: 250px;
                height: 100%;
                position: fixed;
                top: 0%;
                z-index: 1000;
                left: -100%;
            }

            #side-nav #title {
                padding: 23px 30px;
                background: #4F4F4F;
                color: white;
                font-size: 16px;
                font-weight: bold;
            }

            #side-nav #title p {
                display: inline;
                margin-right: 50px;
            }

            #side-nav #menus {
                margin-top: 60px;
            }

            #side-nav #menus li {
                list-style: none;
                text-align: left;
                margin: 20px 10px;
            }

            #side-nav #menus a {
                text-decoration: none;
                font-size: 14px;
                text-transform: uppercase;
                color: black;
            }

            #menus {
                width: 100%;
            }

            #menus .active {
                background: #C1D6DD;
                padding: 10px 20px;
            }

            .fa-university {
    float: left;
    text-align: left;
                font-size: 36px;
                padding: 25px;
                margin-left: 20px;
                border-radius: 120px;
                background: #FD8032;
                color: white;
            }

            .fa-plus {
    float: right;
    margin-right: 20px;
                padding: 10px;
                border-radius: 5px;
                font-size: 20px;
                background: #FD8032;
                color: white;
            }

            #wallet {
                margin-top: 150px;
                padding: 10px 10px;
            }

            #wallet td {
            font-size: 10px;
            padding: 15px 15px;
            }

            #beneficiary {
                padding: 10px 10px;
            }

            #beneficiary-table td {
            font-size: 10px;
            padding: 15px 10px;
            }

            #wallet .title {
            }

            .title {
    padding-top: 20px;
                padding-bottom: 0px;
                text-align: left !important;
                font-size: 12px;
                font-weight: bold;
            }

            .fa-plus {
    margin-bottom: 40px;
            }

            table {
    margin-top: 0px;
                margin-bottom: 100px;
                padding-top: 0px;
            }

            .title {
    float: left;
}
            }

    </style>
</head>
<body>
<span id="mobile"></span>
  <div class="header">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span class="fa fa-navicon"></span> Wallet View</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><input type="text" id="search" placeholder="Search"></li>
              <li><div id="profile-pic"> </div></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
  </div>

  <!-- HHEADER END -->

  <!-- SIDE NAV -->
  <div id="side-nav">
    <div id="title">
      <p>Transfer Rules</p>
      <span class="fa fa-arrow-left"></span>
    </div>
    <div id="menus">
      <li><a href="manager">Dashboard</a></li>
      <li><a href="wallet-view">Wallet View</a></li>
      <li class="active"><a href="view-accounts">Accounts</a></li>
    </div>
  </div>

    <span class="fa fa-university"></span>
  <div id="base-container">
    <div id="wallet">
        <span class="title">Beneficiary Wallets</span><a href="#"><span class="fa fa-plus"></span></a>

        <table id="wallet-table">
            <tr class="table-header">
                <td>Name</td>
                <td>Wallet</td>
                <td>Wallet id</td>
                <td>Country</td>
                <td>Email</td>
                <td>Date created</td>
            </tr>
            <tr>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
            </tr>
            <tr>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
            </tr>
            <tr>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
            </tr>
            <tr>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
            </tr>
        </table>
    </div>

    <div id="beneficiary">
        <span class="title">Beneficiary bank accounts</span> <a href="#"><span class="fa fa-plus"></span></a>

        <table id="beneficiary-table">
            <tr class="table-header">
                <td>Name</td>
                <td>Bank name</td>
                <td>Acc. No</td>
                <td>Acc. type</td>
                <td>Country</td>
                <td>Email</td>
                <td>Date created</td>
            </tr>
            <tr>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
            </tr>
            <tr>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
            </tr>
            <tr>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
            </tr>
            <tr>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
                <td>lorem</td>
            </tr>
        </table>
    </div>
  </div>

  <!-- <script src="js/script.js"></script> -->
  <script>
$(document).ready(() => {
    // SIDE NAVBAR

    // Checking to see if on mobile
    if ($('#mobile').css('display') == 'none') {
        $('.navbar-brand').click((e) => {
            e.preventDefault();
            console.log();
            $('#side-nav').css('left', '0%');
        });

            $('.fa-arrow-left').click((e) => {
            $('#side-nav').css('left', '-30%');
        });
            } else {
        $('.navbar-brand').click((e) => {
            e.preventDefault();
            console.log();
            $('#side-nav').css('left', '-0%');
        });

            $('.fa-arrow-left').click((e) => {
            $('#side-nav').css('left', '-100%');
        });
            }

});

  </script>
</body>
</body>
</html>
