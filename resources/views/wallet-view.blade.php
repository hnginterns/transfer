<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PaysFund Wallet View Account</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
header{
	width:100%;
	background-color:#25313F;
	height:70px;
	padding-top:15px;
	}
	div.bgcolor{
		background-color:#25313F;
	}
span.bars{
padding-top:7px;
color:#FFF;
font-size:24px;
margin-right: 30px;
}
	.padding{
	padding-top:5px;
	}
	span.logo{
	font-size:24px;
	font-weight: 700;
	color:#fff;}
	span.white{
		margin-top:15px;
		color:#FFF;
		font-weight:600;
		}	div.profile{
		width:40px;
		height:40px;
		background-color:#BDBDBD;
		border-radius:25px;
		}
		.search{
			text-align:center;
			border-radius:3px;
			border:solid;
			border-width:1px;
			padding:5px;
			}
		.sidebar{
			position:fixed;
			border-right:solid;
			border-width:1px;
			border-color:#E0E0E0;
			height:100%;
			}
		.centerImg{
			margin-left:45%;
			margin-top:2%;
			}
			    .title{
				   color:#25313F;
				   font-weight:600;
				   }
				   .first-block{
					font-weight:600;
					padding:10px;
					}
				   .form-color{
					background-color:#FFD0B3;
					border-radius:0 !important;
					border-color:#FFD0B3;
					width:400px;
					}
					.form-text-color{
					background-color:#FF6200;
					border-radius:0 !important;
					border-color:#FF6200;
					}
					div.form{
					margin-left:25%;
			        margin-top:2%;
					}
					.btn-edit{
					background-color:#25313F !important;
					border-radius:20px !important;
					font-weight:600;
					color:#fff;
					padding:10px;
					margin-left:5%;
					}
					.dashGrey{
						color:#828282;
						font-weight:600;
						padding-left:60px;
						font-size:18px;
						margin-bottom: 15px;
						margin-top: 15px;
						text-align:left;
						}
					.dashBlue{
						color:#25313E;
						font-weight:600;
						font-size:18px;
						padding-left:40px;
						padding-top:4px;
						padding-bottom:4px;
						text-align:left;
						}
						.dashboard{
							position:fixed;

							left:0px;
							top:100px;
							}
							div.content{
								margin-top:60px;
								margin-left:15%;
								padding-bottom: 3%;
							}
							div.awesome{
								font-size: 40px;
								border-radius: 5px;
								width:50px;
								height:50px;
								background-color: #FF6200;
								color:#FFF;
								padding-right:9px;

							}
							div.HighLighted{
								background-color: #C1D6DD;
								width:202px;
							}
							div.orange-box{
								background-color:#FF6200;
								padding:5px;
							}
							div.blue-circle{
								background-color: #25313F;
								width:180px;
								height:180px;
								border-radius: 90px;
								padding-top:40px;
								padding-left:17px;
								margin-left: 17%;
							}
							.side-header{
								color:#25313F;
								font-weight: 500;
							}
							.side-content{
								color:#25313F;
								font-weight: 700;
								font-size: 20px;

							}

</style>
</head>
<body>
<header><div class="container">
<div class="row bgcolor">
<div class="col-sm-3 col-xs-6"align="left"><a href='/userdashboard'><span class="logo">PaysFund</span></a></div>
<div class="col-sm-1 col-xs-6" align="right"><span class="bars"><i class="fa fa-bars" aria-hidden="true"></i></span></div>
<div class="col-sm-3 padding hidden-sm hidden-xs"><a href='wallet-view'><span class="white ">Wallet View</span></a></div>
<div class="col-sm-3 padding hidden-sm hidden-xs"><input type="text" class="search form-control" placeholder="Search"/></div>
<div class="col-sm-1 hidden-sm hidden-xs"></div>
<div class="col-sm-1 hidden-sm hidden-xs"><div class="profile"></div></div>
</div>
</div></header>
<div class="container"><div class="row"><div class="col-md-1 sidebar hidden-sm hidden-xs">
<div class="dashboard">
<div class="dashGrey"><a href="userdashboard">Dashboard</a></div>
<br />
<div class="dashBlue HighLighted"><a href="wallet-view">Wallet View</a></div>
<br />
</div>
</div>
<div class="col-md-11 main-section">
  <div class="content">
    <div class="row">
      <div class="col-md-4">
<div class="blue-circle"><img src="http://www.ravcontest.com/HNGpoints/image/W1.png" alt="icon"/></div>
<div align="center" class="left-content">
  <h5 class="side-header">Wallet 1</h5>
<br/>
<h5 class="side-header">Wallet S/N</h5>
<p class="side-content">0001</p>
<br/>
<h5 class="side-header">Wallet Id</h5>
<p class="side-content">id 2334556</p>
<br/>
<h5 class="side-header">Currency Type</h5>
<p class="side-content">NGN</p>
<br/>
<h5 class="side-header">Balance</h5>
<p class="side-content">134,455,667.78</p>
<br/>
</div>
      </div>
      <div class="col-md-8">
<div class="orange-box"><h4 class="title" align="center">TRANSACTION HISTORY</h4></div>
  <table class="table" style="width:100%;">
    <thead>
      <tr>
        <th>Trans id</th>
        <th>Trans Amount</th>
        <th>Trans Date</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td></td>
        <td></td>
        <td></td>
           <td></td>

      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
           <td></td>

      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
           <td></td>

      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
           <td></td>

      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
           <td></td>

      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
           <td></td>

      </tr>
         <tr>
        <td></td>
        <td></td>
        <td></td>
           <td></td>

      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
           <td></td>

      </tr>
         <tr>
        <td></td>
        <td></td>
        <td></td>
           <td></td>

      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
           <td></td>

      </tr>
         <tr>
        <td></td>
        <td></td>
        <td></td>
           <td></td>

      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
           <td></td>

      </tr>
         <tr>
        <td></td>
        <td></td>
        <td></td>
           <td></td>

      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
           <td></td>

      </tr>
         <tr>
        <td></td>
        <td></td>
        <td></td>
           <td></td>

      </tr>
      <tr>
        <td></td>
        <td></td>
        <td></td>
           <td></td>

      </tr>

    </tbody>
  </table>
  <div align="center">
  <a href="transfer-to-wallet" class="btn btn-default btn-edit">Transfer to Wallet</a><a href="transfer-to-bank" class="btn btn-default btn-edit">Transfer to Bank</a><button class="btn btn-default btn-edit">DKGIU</button><button class="btn btn-default btn-edit">RKSNBT</button>
  </div> </div>
    </div>
  </div>
</div></div>
<footer></footer>
</body>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>
