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
    .main .error{
      opacity: 79%;
      color: #4f4f4f;
      font-weight: bolder;
      font-size: 150px;
    }    
    .main .error span.ghost{
      color: #000;
      letter-spacing: 10px;
      text-align: center;
      font-size: 30px;
      height: 70px;
}
    .main .error span.ghost:before{
        content: "\f111   \f111";
        color: #fff;
        font-size: 23px;
        font-family: FontAwesome;
        margin-top: 30px;
        margin-left: 5px;
        z-index: 30;
        position: absolute;
    }
    .main .error span.ghost:after{
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
        margin-top: 10px;
        margin-left: -16px;
        margin-right: 16px;
        margin-bottom: 35px;
		
	}
  .main h2{
    margin-top: 0;
  }
    .coral{
      color: #ff6200;
    }
    a{ 
      text-decoration: none;
    }
    .main .navigate{  
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center; 
    }
    .main .navigate a{
      border-radius: 25px;
      font-size: 18px;
      text-decoration: none;
      color: #fff;
      background-color: #ff6200;
      padding: 5px 20px;
      margin: 5px 9%;
      box-shadow: 0 5px 5px 2px rgba(0,0,0,0.14);
    }
    .main .navigate a:hover{
      opacity: 0.9;
    }
    @media (max-width: 500px){
      .main .error{
        font-size: 80px;
      }
      .main .error span.ghost:before{
        font-size: 12px;
        margin-left: 0px;
      }
      .main .error span.ghost:after{
        margin-left: -10px;
        margin-right: 10px;
        width: 65px;
        height: 75px;
        margin-bottom: 15px;
      }
      .main .navigate a{
        font-size: 14px;
      }
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
    
    <h4><a class="coral" href="#">REPORT THIS ISSUE</a></h4>
    
    <div class="navigate">
      <a href="#">GO TO DASHBOARD</a>
      <a href="#">GO TO HOMEPAGE</a>
    </div>
	</div>
</body>
</html>
