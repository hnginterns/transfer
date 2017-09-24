@extends('layouts.admin')
@section('content')
<div class="col-sm-10">

	<a href="{{action('Admin\UsersController@create')}}" class="btn btn-success">Add User </a>
  
    <table class="table table-striped">
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
        <td>{{$user['account_number']}}</td>
        <td><a href="{{action('Admin\UsersController@edit', $user['id'])}}" class="btn btn-warning">Edit</a></td>
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
@endsection