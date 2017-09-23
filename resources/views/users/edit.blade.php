@extends('layouts.admin')
@section('content')

<div class="col-sm-10">
  <form method="post" action="{{action('Admin\UsersController@update', $id)}}">
    <div class="form-group row">
      {{csrf_field()}}
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="title" name="username" value="{{$user->username}}">
      </div>
    </div>

    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Email" name="email" value="{{$user->email}}">
      </div>
    </div>

<div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Firstname</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Email" name="first_name" value="{{$user->first_name}}">
      </div>
    </div>

    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Lastname</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Email" name="last_name" value="{{$user->last_name}}">
      </div>
    </div>


    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Account Number</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Account Number" name="account_number" value="{{$user->account_number}}">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
</div>

@endsection
