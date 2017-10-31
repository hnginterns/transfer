<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Sign In</title>

    <link href="/css/bootstrap.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans" rel="stylesheet">

    <link href="/css/signin.css" rel="stylesheet">

</head>



<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid">



            <a class="navbar-brand" href="#">

        <a href="{{url('/')}}">  <img src="/img/HNGlogo.png" width="120" height="40"alt=""></a>
               

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

                        <a class="nav-link" href="{{url('/')}}">Home

                            <span class="sr-only">(current)</span>

                        </a>

                    </li>

                   

                    <li class="nav-item active">

                        <a href="{{ route('admin.login') }}"class="nav-link">Admin login</a>


                    </li>

                </ul>

            </div>

        </div>

    </nav>



    <main>

        <div class="container">

            <div class="login-box">

                <h4 class="intro">Forgot Password </h4>


                <h6 class="promise">Enter you email address and you will receive a secure<br>link to reset your password shortly</h6>
                @if (Session::has('messages'))
                    {!! Session::get('messages') !!}
                @endif
                <form class="admin-login"  method="POST" action="{{ route('password.email') }}">

                    {{ csrf_field() }}
                    <div class="form-group">
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email / Username">
 
                         @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif


                    </div>
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </form>

            </div>



        </div>



    </main>

    <footer class="footer">

        <div class="container" style="text-align:center">

            <span class="text-muted company">2017 TransferFunds - All Rights Reserved</span>

        </div>

    </footer>

    <script src="/js/jquery.js"></script>

    <script src="/js/bootstrap.js"></script>

</body>



</html>
