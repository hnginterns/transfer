<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">   
	<title>404</title>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  
  <style>
    body{
      font-family: lato;
      height: 100%;
      margin-top: 7%;
    }
		.main{
      bottom: 0;
      width: 90%;
			text-align: center;
			margin: auto;
		}
    .error{
      opacity: 79%;
      color: #4f4f4f;
      font-weight: bolder;
      font-size: 150px;
    }
    .error span.ghost{
      color: #000;
      letter-spacing: 10px;
      text-align: center;
      font-size: 30px;
      height: 70px;
}
    .ghost:before{
        content: "\f111   \f111";
        color: #fff;
        font-size: 25px;
        font-family: FontAwesome;
        /*background-color: #fff;*/
        margin-top: 30px;
        z-index: 3;
        position: absolute;
    }
    .ghost:after{
		background: 
					linear-gradient(-45deg, transparent 16px, #4f4f4f 0), 
					linear-gradient(45deg, transparent 16px, #4f4f4f  0);
        background-repeat: repeat-x;
		    background-position: left bottom;
        background-size: 22px 120px;
        content: "";
        display: inline-block;
		    width: 110px;
		    height: 120px;
        border-top-left-radius: 50px;
        border-top-right-radius: 50px;
        position: relative;
        margin-left: -18px;
        margin-right: 15px;
        margin-bottom: 35px;
		
	}
    .coral{
      color: #ff6200;
    }
    a{ 
      text-decoration: none;
    }
    .navigate{
      border-radius: 25px;
      font-size: 18px;
      text-decoration: none;
      color: #fff;
      background-color: #ff6200;
      padding: 5px 20px;
      margin: 0 9%;
      box-shadow: 0 16px 24px 2px rgba(0,0,0,0.14),0 6px 30px 5px rgba(0,0,0,0.12),0 8px 10px -5px rgba(0,0,0,0.3);	
    }
    .navigate:hover{
      opacity: 0.9;
    }
	</style>
</head>
<body>
	<div class="main">
    <h2>WHOOPS!</h2>
    <div class="error">4 <span class="ghost"> </span>4</div>
    <h2>ERROR</h2>

		<p> Sorry the page you are looking for cannot be accessed.
      <br> Check the options below or feel free to</p>
    <h4 ><a class="coral" href="#">REPORT THIS ISSUE</a></h4>
    <a class="navigate" href="#">GO TO DASHBOARD</a>
    <a class="navigate" href="#">GO TO HOMEPAGE</a>
	</div>
</body>
</html>
