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
