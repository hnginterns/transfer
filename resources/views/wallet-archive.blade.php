<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PaysFund View Account</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<style>
header{
	width:100%;
	background-color:#25313F;
	height:70px;
	padding-top:15px
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
							body
	{
		margin: 0;
		padding: 0;
		font-family: 'Nunito Sans',sans-serif;
	}

	*
	{
		box-sizing: border-box;
	}
	a
	{
		text-decoration: none;
	}
	.wrapper
	{
		width: 100%;
		overflow: hidden;
		color: #666;
		margin: 10px auto;
	}
	.head,.foot,.sub-head,.body-head
	{
		width: 100%;
		padding: 13px;
		color: #F76126;
		overflow: hidden;
	}
	.align,.main-head,.sup-heads
	{
		float: left;
		vertical-align: middle;
		margin: 0 10px;
		width: 20%;
	}
	.foot
	{
		background: #F76126;
		color: #fff;
		text-align: center;
	}
	.head
	{
		font-weight: 700;
		background: #25313F;
		box-shadow: 0px 3px 2px -3px rgba(0,0,0,.4);
		margin-bottom: 2px;
		font-size: 18px;
		border: solid 1px #ddd;
		border-bottom: 0;
		color: #fff;
	}
	.sub-head
	{
		background: #F76126;
		color: #25313F;
		width:60%;
		margin-left:20%;
		font-weight:700;
		text-align:center;
	}
	.body-head
	{
		/*color: #E2E2E2;*/
		text-align: center;
		font-weight: 700;
		box-shadow: 0px 3px 2px -3px rgba(0,0,0,.4);
	}
	.menu
	{
		vertical-align: middle;
		margin: 0 20px;
		float: left;
	}
	.bck
	{
		display: block;
		margin-right: 10px;
		float: left;
		font-size: 25px;
	}
	.labels
	{
		width: 30%;
		margin: 10px;
		color: #fff;
		font-size: 11px;
		float: left;
		padding: 20px;
	}
	.label1
	{
		color: #25313E;
	}
	.label2
	{
		background: #25313E;
		color: #fff;
	}
	.label3
	{
		background: #FF6200;
		color: #fff;
	}
	.side-nav
	{
		width: 25%;
		float: left;
		margin-right: 1%;
		margin: 0;
		padding: 0;
		background: #fff;
		border-top: 0;
	}
	.side-nav li
	{
		margin: 0;
		padding: 0;
		color: #666;
		display: block;
	}
	.side-nav li a
	{
		display: block;
		padding: 5px 50px;
		color: #828282;
		text-transform: uppercase;
		font-size: 14px;
		font-weight: 700;
	}
	.side-nav li a.active
	{
		color: #5E5E5E;
		margin-top: 30px;
		color: #25313E;
		background: #C1D6DD;
	}
	.morenav
	{
		font-size: 90%;
		margin-top: 12px;
		text-transform: capitalize !important;
	}
	.side-nav li a.active2
	{
		color: #F76126;
	}
	.chart_contain
	{
		overflow: hidden;
		width: 100%;
		position: relative;
		width: 100%;
	}
	.bullet
	{
		margin: 0 10px;
	}
	.amt_label
	{
		position: absolute;
		left: 0;
	}
	.metre
	{
		height: 100%;
		border-right:solid 2px #25313E;
	}
	.green
	{
		color: #27AE60;
	}
	.lists
	{
		margin: 0;
		padding: 0;
		width: 100%;
		background: #fff;
	}
	.lists > li
	{
		display: block;
		margin: 0;
		padding: 25px 50px;
		cursor: pointer;
		color: #4F4F4F;
		border:solid 1px white;
		border-top: 0;
		border-bottom: 0;
	}
	.dropdown-menu
	{
		display: none;
	}
	.lefted
	{
		float: left;
		vertical-align: middle;
		display: inline-block;
		margin: 0 5px 0;
	}
	.lists > li img
	{
		height: 50px;
		width: 50px;
		border-radius: 100%;
		vertical-align: middle;
		float: left;
		margin: 0 20px 0 0;
		background: #eee;
	}
	.btn-default,.btn-group
	{
		border: 0 !important;
	}
	.lists > li:hover
	{
		border:solid 1px #ccc;
		border-top: 0;
		border-bottom: 0;
		box-shadow: 0 3px 2px -2px rgba(0,0,0,.4);
	}
	.spaced
	{
		margin-left: 20px;
		width: 20% !important;
	}
	.mid
	{
	}
	.action-link
	{
		padding-bottom: 5px;
		color: #F76126;
		border-bottom: solid 1px #F76126;
		display: inline-block;
		text-align: center;
		float: right;
		transition: border .3s ease-in-out;
	}
	.action-link:hover
	{
		text-decoration: none;
		border-color: #fff;
		color: #F76126;
	}
	.footnav
	{
		float: right;
		margin: 0;
		padding: 0;
	}
	.footnav li
	{
		padding: 3px 10px;
		margin: 5px;
		overflow: hidden;
		color: #fff;
		background: #F76126;
		border: solid 1px #F76126;
		float: left;
		text-align: center;
		transition: background .3s ease-in;
		cursor: default;
	}
	.action-button
	{
		border: solid 2px #F76126 !important;
		border-radius: 5px !important;
		text-align: center;
		color: #F76126 !important;
		margin: 3px;
		margin-top:300px !important;
		
	}
	.footnav li:hover,.footnav li.active
	{
		border-color: #ccc;
		color: #F76126;
		background: #fff;
	}
	.input-defaulted
	{
		border: solid 1px #666;
		border-radius: 0;
		color: #5E5E5E;
		margin: 10px auto;
		width: 60%;
		text-align: center;
		float: none;
		display: block;
		min-height: 50px;
	}
	.user-name
	{
		width: 30%;
		float: left;
		vertical-align: middle;
		font-size: 21px;
		margin-left: 40px;
	}
	.well2
	{
		overflow: hidden;
		position: relative;
		padding-left: 10%;
		padding-right: 10%;
		min-height: 500px;
		position: relative;
	}
	.well2 p
	{
		position: relative;
		z-index: 1;
	}
	.arch-mark
	{
		font-size: 2500%;
		position: absolute;
		top: 15%;
		left: 30%;
		opacity: .5;
		color: #11EF2E;
	}
	.lead2
	{
		margin-bottom: 30px;
	}
	.well2 .action-button
	{
		position: relative;
		bottom: 0;
		margin:100px auto 30px auto;
		float: none;
		display: block;
		background: inherit;
	}
	.table2 th:last-child
	{
		text-align: right;
		padding-right: 20px;
	}
	.table2 td, .table2 th
	{
		padding-top: 10px !important;
		padding-bottom: 10px !important;
	}
	.search
	{
		background: #fff;
		vertical-align: middle;
		margin: 0 10px;
		text-align: center;
		padding: 5px;
		border: 0;
		border-radius: 3px;
		font-weight: bold;
		color: #BDBDBD;
		width: 100%;
	}
	.form
	{
		display: inline-block;
		width: 20%;
	}
	.prof_left
	{
		width: 40px;
		height: 40px;
		float: right;
		border-radius: 100%;
		margin: 0 10px;
		vertical-align: middle;
		background: #BDBDBD;
	}
	.chart_contain svg
	{
		width: 90%;
		float: right;
	}
	.body
	{
		width: 74%;
		float: left;
		padding: 20px;
		border-left: solid 1px #ccc;
	}
	.body2
	{
		border: solid 1px #ccc;
		border-radius: 5px;
		margin: 10px 0;
		color: #333;
		padding: 20px 40px;
	}
	.body-contain
	{
		background: #fff;
		min-height: 200px;
	}
	.con_text
	{
		font-weight: 700;
	}
	.button
	{
		padding: 10px;
		border: 0;
		margin: 0 5px;
	}
	.body-table, .body-table th,.body-table td
	{
		border: 0;
		padding: 0;
		margin: 0;
		border-collapse: collapse;
		width: 100%;
	}
	.body-table tr:nth-child(odd)
	{
		background: #fff;
	}
	.body-table tr:nth-child(even)
	{
		background: #ccc;
	}
	.body-table th, .body-table td
	{
		padding: 20px;
		color: #666;
	}
	.action
	{
		border-radius: 0;
		color: #F76126;
		margin: 0 5px;
		float: right;
	}
	.red
	{
		color: #fff;
		background: #E74040;
	}
	.blue
	{
		color: #fff;
		background: #1282D9;
	}
	g:hover
	{
		transition: opacity .3s ease-in-out;
		opacity: .7;
	}
	@media (max-width: 768px)
	{
		.lists > li
		{
			width: 100%;
		}
		.search,.side-nav
		{
			display: none;
		}
		.body,.labels
		{
			width: 100%;
		}
		.chart_contain svg
		{
			height: 300px;
		}
	}
	a{
		text-decoration:none !important;}

</style>
</head>
<body>
<header><div class="container">
<div class="row bgcolor">
<div class="col-sm-3 col-xs-6"align="left"><a href='/'><span class="logo">PaysFund</span></a></div>
<div class="col-sm-1 col-xs-6" align="right"><span class="bars"><i class="fa fa-bars" aria-hidden="true"></i></span></div>
<div class="col-sm-3 padding hidden-sm hidden-xs"><a href='/wallet-view'><span class="white ">Wallet View</span></a></div>
<div class="col-sm-3 padding hidden-sm hidden-xs"><input type="text" class="search form-control" placeholder="Search"/></div>
<div class="col-sm-1 hidden-sm hidden-xs"></div>
<div class="col-sm-1 hidden-sm hidden-xs"><div class="profile"></div></div>
</div>
</div></header>
<div class="container"><div class="row"><div class="col-md-1 sidebar hidden-sm hidden-xs">
<div class="dashboard">
<div class="dashGrey"><a href='/dashboard' style="color:#828282;">Dashboard</a></div>
<br />
<div class="dashBlue HighLighted"><a href='/wallet-view' style="color:#25313F;">Wallet View</a></div>
<br />
</div>
</div>
<div class="col-md-11 main-section">
  <div class="content">
    <div class="sub-head lead text-align">Wallet Archive Success!</div>
			<div class="well well2"><i class="fa fa-check-circle arch-mark"></i> 
				<h3 class="text-center lead2">Wallet Archive Success</h3>
				<p><b>Dear Admin,</b></p>
				<p>Archieving of Wallet with ID Number XXXXX has been Successfull Archived</p>
				<button class="btn btn-default action-button" type="button">Recover Wallet</button>
			</div>
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
