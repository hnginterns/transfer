@extends('layouts.admin')
@section('content')
<div class="col-sm-10">
  <form method="post" action="{{url('admin/users')}}">
    <div class="form-group row">
      {{csrf_field()}}
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Name" name="username">
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Email</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Email" name="email">
      </div>
    </div>

    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Password" name="password">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-2"></div>
      <input type="submit" class="btn btn-primary">
    </div>
  </form>
</div>
@endsection