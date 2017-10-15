@extends('layouts.page')

    @section('title')
        Forgot Password
    @endsection

    @section('head')
        <!-- external scripts and meta tags goes here-->
        <link rel="stylesheet" type="text/css" href="/css/forgot.css">
    @endsection


@section('content')
    
    <main>
        <div class="container">
            <div class="login-box">
                <h4 class="intro-sub">Forgot Password</h4>
                <p class="writeup">Enter you email address and we will send you a link to reset your password shortly</p>
                <form class="admin-login"  method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
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

@endsection
