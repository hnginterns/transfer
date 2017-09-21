@extends('layouts.head')

    @section('title')
        Add Account
    @endsection

    @section('head')
        <!-- external scripts and meta tags goes here-->
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="/css/addaccount.css">
    @endsection


@section('skin')
<!-- HEADER BEGINS -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> TransferRules
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav navbar-left" style="margin-left:10px;">
                      <span class="navbar-toggler-icon"></span>
            </ul>
            <ul class="navbar-nav navbar-right">
                <li class="nav-item search">
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control" style="margin-right: 50px;" id="search" class="" name="search">
                    </form>
                </li>
                <li class="nav-item">
                  <div class="user-img" style="width: 40px; height: 40px; border-radius: 100%; background: #BDBDBD; margin-right: 20px;"></div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!--HEADER ENDS -->


<div class="container-fluid">
 <div class="row">

 <div class="col-sm-12 remove-padding">
    <div class="col-sm-2 remove-padding">
      <nav>
        <a href="" id="indent">Dashboard</a>
        <a href="" id="indent">Campaigns</a>
        <a href="">Wallet View</a>
        <a href="" id="selected">Acounts</a>
      </nav>


    </div>


    <div class="col-sm-6  sidebar-line">

      <img src="/img/bank.png" width="100px" height="100px">
      <h3>Add Benaficiary Wallets</h3>

      <label>Wallet Name</label><br>
      <select name="wallet-name">
        <option>---select Beneficiary---</option>
        <option>Peter Pere</option>
      </select><br>

      <label>Wallet ID</label><br>
     <input type="text" name="wallet-id"><br>

     <button class="pull-right">Add Wallet</button>

     <br>

      <h3 class="abba">Add Benaficiary Bank Account</h3>

      <label>Country</label><br>
      <select name="country">
        <option>---select Country---</option>
        <option>Nigeria</option>
        <option>Ghana</option>
        <option>Togo</option>
      </select><br>

      <label>Bank Name</label><br>
      <select name="bank-name">
        <option>---select Bank---</option>
        <option>First Bank</option>
        <option>GT Bank</option>
        <option>FCMB</option>
      </select><br>

      <label>Account No</label><br>
     <input type="text" name="accoiunt-number"><br>

     <button class="pull-right">Add Accounts</button>
    </div>
 </div>

 </div>
</div>
</body>
</html>
@endsection
