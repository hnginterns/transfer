@extends('layouts.admin')
@section('title', 'Manage User')
@section('subtitle', 'Users List')
@section('content')

<div class="col-sm-12">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users List</h3>
              <a href="{{action('Admin\UsersController@create')}}" class="btn btn-success pull-right">Add User </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

	
  
    <table id="datatable" class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Account Number</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{$user['id']}}</td>
        <td>{{$user['username']}}</td>
        <td>{{$user['email']}}</td>
        <td>{{$user['first_name']}}</td>
        <td>{{$user['last_name']}}</td>
        <td><a href="{{ action('UsermgtController@edit', $user['id']) }}" class="btn btn-warning">Edit</a></td>
        <td>

        @if( $user['deleted_at'] == null)
			  <form action="{{url('admin/users/banUser/')}}/{{ $user['id'] }}" method="post">
            {{csrf_field()}}
            <button class="btn btn-danger" type="submit">Ban</button>
        </form>
        @else
        <form action="{{url('admin/users/unbanUser/')}}/{{ $user['id'] }}" method="post">
            {{csrf_field()}}
            <button class="btn btn-success" type="submit">Unban</button>
        </form>
        @endif
        </td>
        <td>

        @if( $user['is_admin'] == 0)
        <form action="{{url('admin/users/makeAdmin/')}}/{{ $user['id'] }}" method="post">
            {{csrf_field()}}
            <button class="btn btn-danger" type="submit">Make Admin</button>
        </form>
        @else
        <form action="{{url('admin/users/removeAdmin/')}}/{{ $user['id'] }}" method="post">
            {{csrf_field()}}
            <button class="btn btn-success" type="submit">Remove Admin</button>
        </form>
        @endif
        </td>
      </tr>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
</div>

@endsection