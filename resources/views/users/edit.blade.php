@extends('layouts.admin')
@section('title', 'Manage User')
@section('subtitle', 'Update User Details')
@section('content')

<div class="col-sm-6 col-md-offset-2">

  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Editing {{$user->username}} </h3>
              <a href="{{url('admin/users')}}" class="btn btn-primary pull-right">Users List </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">   

  <form method="post" action="{{ action('User\UsermgtController@update', $id)}}">
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
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="First Name" name="first_name" value="{{$user->first_name}}">
      </div>
    </div>

    <div class="form-group row">
      <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Lastname</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="Last Name" name="last_name" value="{{$user->last_name}}">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
</div>
</div>
</div>

@endsection
