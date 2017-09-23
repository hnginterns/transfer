@extends('layouts.admin')
@section('content')
<div class="col-sm-10">
  @if (Session::has('messages'))
      {!! Session::get('messages') !!}
  @endif
  <form method="post" action="{{url('admin/users/store')}}">
    <div class="form-group row">
      {{csrf_field()}}
      <label for="username" class="col-sm-2 col-form-label col-form-label-lg">Username</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="username" placeholder="Username" 
        name="username">
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Email" name="email">
      </div>
    </div>

    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Firstname</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Firstname" name="first_name">
      </div>
    </div>

    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Lastname</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Lastname" name="last_name">
      </div>
    </div>


    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Account Number</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Acount Number" name="account_number">
      </div>
    </div>

    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Password" name="password">
      </div>
    </div>

    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Confirm Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Confirm Password" name="confirmpassword">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-2"></div>
      <input type="submit" class="btn btn-primary">
    </div>
  </form>
</div>
@endsection