@extends('layouts.head')

    @section('title')
        Sign in
    @endsection

    @section('head')
        <!-- external scripts and meta tags goes here-->
        <link rel="stylesheet" type="text/css" href="/css/sigin.css">

         <style type="text/css">
            html {
                font-family: 'Nunito Sans', sans-serif;
                position: relative;
                min-height: 100%;
            }

            :root {
                --hue-color: #fd8032;
            }

            body {
                margin-bottom: 60px;
                font-family: 'Nunito Sans', sans-serif;
            }

            .navbar {
                box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            }

            .bg-dark {
                background-color: #333333 !important;
            }

            .navbar-dark .navbar-nav .active>.nav-link {
                color: white;
                border: 2px solid #FD8032;
                border-radius: 64px;
                padding: 2px 25px;
                background: #fd8032;
            }

            .user-img {
                border-radius: 25px;
            }

            .nav-link.active {
                color: white;
            }

            .sidebar-toggle {
                border: 1px solid white;
                border-radius: 2px;
                background: transparent;
            }

            .sidebar-toggle>span {
                height: 1.7em;
                width: 1.7em;
            }

            .search {
                margin-right: 50px !important;
            }

            .side-bar {
                border-right: 1px solid rgb(192, 190, 190);
            }

            .main-content {}

            .transfer-icon {
                height: 100px;
            }

            .sidy {
                padding: 50px 15px;
            }

            .nav-list {
                list-style: none;
            }

            .side-items {
                margin-bottom: 20px;
            }

            .side-item {
                color: rgb(56, 53, 53);
                font-weight: bold;
                font-size: 16px;
                opacity: 0.6;
            }

            .side-item:hover {
                color: var(--hue-color);
                text-decoration: none;
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

            .navbar-dark .navbar-nav .nav-link {
                padding: 5px 10px;
            }

            li.nav-item {
                margin: 5px 10px;
            }

            .login-box {
                margin: auto;
                width: 60%;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                margin-top: 1%;
                padding: 60px 0 80px;
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
    </style>
    @endsection

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

            <a class="navbar-brand" href="/userdashboard">
                <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> PaysFund
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item hidden-sm">
                        <button class="sidebar-toggle" type="button">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/wallet-view">Wallet View</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item search">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                        </form>
                    </li>
                    <li class="nav-item">
                        <img width="40" height="40" class="user-img" src="http://static2.uk.businessinsider.com/image/551d3821dd0895ef498b4580-480/man-in-a-suit.jpg">
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container-fluid">
            <div class="row">
                <div class="col col-lg-2 side-bar hidden-sm hidden-xs">
                    <div class="sidy">
                        <ul class="nav-list">
                            <li class="side-items upper">
                                <a href="/dashboard" class="side-item">Dashboard</a>
                            </li>
                            <li class="side-items">
                                <a href="/wallet-view" class="side-item active">Wallet View</a>
                            </li>
                            <li class="side-items">
                                <a href="/" class="side-item">Accounts</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col col-lg-10 main-content">
                    <div class="login-box" style="margin-top: 20px; padding-top: 30px;">
                        <img src="/svg/naira.svg" alt="no preview" class="transfer-icon">
                        <h4 class="intro" style="font-size: 20px;">Transfer to bank account </h4>
                        <form class="admin-login">
                            <div class="form-group" style="margin: 30px 0;">
                                <input type="text" class="form-control cus-input" id="benName" placeholder="Beneficiary Name">
                            </div>
                            <div class="row">
                                <div class="col col-lg-6 form-holder">
                                    <div class="form-group">
                                        <select class="form-control cus-input">
                                            <option>Beneficiary Bank</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col col-lg-6 form-holder">
                                    <div class="form-group">
                                        <input type="text" class="form-control cus-input" id="benAcc" placeholder="Beneficiary Account No">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" style="margin: 30px 0;">
                                <input type="number" class="form-control cus-input" id="amount" placeholder="Amount">
                            </div>
                            <button type="submit" class="btn btn-primary">Transfer</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <footer class="footer">
        <div class="container" style="text-align:center">
            <span class="text-muted company">2017 TransferFunds - All Rights Reserved</span>
        </div>
    </footer>
    <script src="/css/jquery.js"></script>
    <script src="/css/bootstrap.js"></script>
</body>

</html>
