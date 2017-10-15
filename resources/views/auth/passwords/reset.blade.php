
@extends('layouts.head')

    @section('title')
        Forgot Password
    @endsection

    @section('head')
        <!-- external scripts and meta tags goes here-->
        <link rel="stylesheet" type="text/css" href="/css/forgot.css">
    @endsection


@section('skin')
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
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">

                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home">Get Started</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link sign-up" data-toggle="modal" href="/signin">Sign In</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <div class="container">
            <div class="login-box">
                <h4 class="intro-sub">Enter email and new password</h4>
                <p class="writeup"></p>
                <form class="admin-login"  method="POST"  method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password">Email address</label>
                        <input type="password" name="password" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="password-confirm">Email address</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password-confirm" aria-describedby="Confirm Password" placeholder="Confirm Password">
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
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

@endsection
