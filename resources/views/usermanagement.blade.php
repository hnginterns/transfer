<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User Management</title>
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
	
	#plus{
		color: white;
		background-color: green;
		padding: 5px;
		padding-top: 0;
		padding-bottom: 0;
		border-radius: 50%;
		cursor: pointer;
	}
	
	#add{
		margin-top: 30px;
	}
	
	.users ul {
      list-style: none;
	  margin-top: 15px;
    }
	
	.users li {
	  display: flex;	
      margin: 0 10px;
	  margin-bottom: 15px;
      padding: 10px 10px;
    }
	
	.image{
		margin-right: 50px;
	}
	
	.Username{
		margin-right: 200px;
	}
	
	select{
		border: none;
		padding-bottom: 5px;
		margin-right: 100px;
		cursor: pointer;
	}
	
	select option{
		color: red;
	}
	
	.removeuser{
		color: #FF6200;
		text-decoration: underline;
		cursor: pointer;
		right: 100px;
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

    .profile-info{
      color: white;
      padding: 5px;
      line-height: 5.5px;
      margin-top: 10px;
    }

    .active-sidebar a{
      	color: #FF6200;  
    }
	
    .nav-search {
      margin-right: auto;
      margin-left: auto;
    }

    #sidebar {
      margin: 0 !important;
      /* padding: 0 !important; */
      width: 200px;
      height: 100%;
    }
	
	#walletlist {
      list-style-type: none;
	  
    }
	
	#maincontent{
		border-left: 0.5px solid gray;
		padding: 50px;
		padding-top: 20px;
	}
	
	#numbers{
		color: #FF6200;
		float: right;
	}
	
	#activenum{
		padding-left: 4px;
		padding-right: 4px;
		border-width: 1px;
		border-style: solid;
		border-color: #FF6200;
		background-color: #FEFEFE;
		margin-right:4px;
		cursor: pointer;
	}
	
	#dots{
		padding-left: 6px;
		padding-right: 6px;
		border-width: 1px;
		border-style: solid;
		border-color: #FF6200;
		background-color: #FEFEFE;
		margin-right:4px;
	}
	
	.num{
		padding-left: 4px;
		padding-right: 4px;
		border-width: 1px;
		border-style: solid;
		border-color: #FF6200;
		background-color: #FF6200;
		color: #FEFEFE;
		margin-right:4px;
		cursor: pointer;
	}
  </style>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">TransferRules</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li class="active"><a href="#">Manage Users</a></li>
          </ul>

          <div class="profile navbar-right"></div>
          <div class="navbar-form navbar-right">
              <input type="text" class="form-control" placeholder="Search">
            </div>
        </div>
      </nav>

  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-2" >
          <ul id="sidebar" class="nav nav-stacked">
              <li><a href="#">Dashboard</a></li>
              <li><a href="#">Transactions</a></li>
              <li><a href="#">Beneficiaries</a></li>
			  <p>Admin</p>
			  <li class="active-sidebar">
				<a href="#">Manage Users</a>
			    <ul id="walletlist"><li>Salary wallet<li></ul>
			  </li>
          </ul>
	  </div>
      <div class="col-sm-10" id="maincontent">
		<div class="row">
			<h2>Users</h2>
			<h4 id="add"><span id="plus">+</span> Add Users</h4>
		</div>	
		<div class="users">
			<ul>
				<li>
					<div class="row">
					<div class="col-sm-1">
						<div class="image"><img src ="img/pic.jpeg" style="border-radius: 50%" height="65px" width="65px" alt="profile picture"></div>
					</div>
					<div class="col-sm-5">	
						<h3 class="Username">Sam Esidem</h3>
					</div>
					<div class="col-sm-3">		
						<h3>
						  <select>
							<option value="Admin">Admin</option>
							<option value="Payee">Payee</option>
							<option value="Manager">Manager</option>
						  </select>
						</h3>
					</div>
					<div class="col-sm-3">
						<h3 class="removeuser">Remove User</h3>
					</div>
					</div>
				</li>
				<li>
					<div class="row">
					<div class="col-sm-1">
						<div class="image"><img src ="img/pic.jpeg" style="border-radius: 50%" height="65px" width="65px" alt="profile picture"></div>
					</div>
					<div class="col-sm-5">	
						<h3 class="Username">Sam Esidem</h3>
					</div>
					<div class="col-sm-3">		
						<h3>
						  <select>
							<option value="Admin">Admin</option>
							<option value="Payee">Payee</option>
							<option value="Manager">Manager</option>
						  </select>
						</h3>
					</div>
					<div class="col-sm-3">
						<h3 class="removeuser">Remove User</h3>
					</div>
					</div>
				</li>
				<li>
					<div class="row">
					<div class="col-sm-1">
						<div class="image"><img src ="img/pic.jpeg" style="border-radius: 50%" height="65px" width="65px" alt="profile picture"></div>
					</div>
					<div class="col-sm-5">	
						<h3 class="Username">Sam Esidem</h3>
					</div>
					<div class="col-sm-3">		
						<h3>
						  <select>
							<option value="Admin">Admin</option>
							<option value="Payee">Payee</option>
							<option value="Manager">Manager</option>
						  </select>
						</h3>
					</div>
					<div class="col-sm-3">
						<h3 class="removeuser">Remove User</h3>
					</div>
					</div>
				</li>
				<li>
					<div class="row">
					<div class="col-sm-1">
						<div class="image"><img src ="img/pic.jpeg" style="border-radius: 50%" height="65px" width="65px" alt="profile picture"></div>
					</div>
					<div class="col-sm-5">	
						<h3 class="Username">Sam Esidem</h3>
					</div>
					<div class="col-sm-3">		
						<h3>
						  <select>
							<option value="Admin">Admin</option>
							<option value="Payee">Payee</option>
							<option value="Manager">Manager</option>
						  </select>
						</h3>
					</div>
					<div class="col-sm-3">
						<h3 class="removeuser">Remove User</h3>
					</div>
					</div>
				</li>
			</ul>
		</div>
		<div id="numbers"><h4><span id="activenum">1</span><span class="num">2</span><span id="dots">...</span><span class="num">20</span></h4></div>
    </div>
    </div>
  </div>
</body>

</html>