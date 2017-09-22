<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Sign In</title>

    <link href="css/bootstrap.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">

    <link href="css/signin.css" rel="stylesheet">

</head>



<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid">



            <a class="navbar-brand" href="#">

                <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> TransferRules

            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"

                aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>



            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">



                </ul>

                <ul class="navbar-nav">

                    <li class="nav-item">

                        <a class="nav-link" href="/home">Home

                            <span class="sr-only">(current)</span>

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="/about">About</a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link" href="/home">Get Started</a>

                    </li>

                    <li class="nav-item active">

                        <a class="nav-link" data-toggle="modal" href="/manager">Sign In</a>

                    </li>

                </ul>

            </div>

        </div>

    </nav>



    <main>

        <div class="container">

            <div class="login-box">

                <h4 class="intro">Welcome </h4>

                <h3 class="sign-in">Sign In to your PaysFund Account</h3>

                <h6 class="promise">It is simple and easy to control your account -<br> Keep your password secret</h6>

                <form class="admin-login">

                    <div class="form-group">

                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                    </div>

                    <div class="form-group">

                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>

                    <div class="forgot-holder">

                        <a class="forgot-password">Forgot Password?</a>

                    </div>

                </form>

            </div>



        </div>



    </main>

    <footer class="footer">

        <div class="container" style="text-align:center">

            <span class="text-muted company">2017 TransferFunds - All Rights Reserved</span>

        </div>

    </footer>

    <script src="js/jquery.js"></script>

    <script src="js/bootstrap.js"></script>

</body>



</html>
