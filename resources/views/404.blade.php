<!DOCTYPE html>
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
    .bg-coral{
      
      width: fit-content;
    /* color: #E57679; */
    color: white;
    border: none;
    background: #39689C;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    padding: 10px 15px;
    border-radius: 63px;
    transition: background 1s, color 2s;
    z-index: 100
    }
	 .bg-blue{
      background-color: #222c37;
      width: fit-content;
    /* color: #E57679; */
    color: white;
    border: none;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    padding: 10px 15px;
    border-radius: 63px;
    transition: background 1s, color 2s;
    z-index: 100
    }
    .bg-coral:hover, .bg-blue:hover {
box-shadow: 0px 8px 8px rgba(0, 0, 0, 0.25);
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
  .main h2{
    margin-top: 0;
  }
	  h2, h4, .blue{
		  color: #222c37;
		  }
	  p{
		  color: #686969:
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
      text-decoration: none;
      color: #fff;
      padding: 5px 20px;
      margin: 5px 9%;
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
    <h1>AHHH, YOU DON MISS ROAD OOO </h1>

    <img src="https://fixmynigeria.com/img/icons/404-2.jpg" >
    <!--<div class="error">4 <span class="ghost"> </span>4</div>
    -->
    
		<p> Sorry, We all do sometimes. The requested page could not be found.
    <br> Check the options below or feel free to</p>

    <h4><a class="blue" href="#">REPORT THIS ISSUE</a></h4>

    <div class="navigate">
      <a class="bg-coral" href="/admin">GO TO DASHBOARD</a>
      <a class="bg-blue" href="/">GO TO HOMEPAGE</a>
    </div>
	</div>
</body>
</html>


