@extends('layouts.admin')
@section('content')
<div class="col-sm-10">

	<a href="Admin\UsersController@create">Add User </a>
  
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{$user['id']}}</td>
        <td>{{$user['username']}}</td>
        <td>{{$user['email']}}</td>
        <td><a href="{{action('Admin\UsersController@edit', $user['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>

			<form action="{{action('Admin\UsersController@destroy', $user['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>



        </td>
      </tr>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection