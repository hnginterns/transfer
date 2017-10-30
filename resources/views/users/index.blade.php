@extends('layouts.admin')
@section('title', 'Manage User')
@section('subtitle', 'Users List')
@section('content')

<div class="col-sm-12">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users List</h3>
              <a href="{{action('User\UsermgtController@create')}}" class="btn btn-success pull-right">Add User </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
	
    <div class="table-responsive">
        <table class="table table-condensed table-striped" id="datatable">
            <thead>
              <tr>
                <th>S/N</th>
                <th>Name</th>
                <th>Email</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Action</th>
                <th></th>
                <th></th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{$loop->iteration }}</td>
                <td>{{$user['username']}}</td>
                <td>{{$user['email']}}</td>
                <td>{{$user['first_name']}}</td>
                <td>{{$user['last_name']}}</td>
                <td><a href="{{ action('User\UsermgtController@edit', $user['id']) }}" class="btn btn-primary">Edit</a></td>
                <td>

                @if( $user['deleted_at'] == null)
                <form action="{{url('admin/users/banUser/')}}/{{ $user['id'] }}" method="post">
                    {{csrf_field()}}
                    <button class="btn btn-warning" type="submit">Ban</button>
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
                  <td>
                <form action="{{config('app.url')}}/admin/users/{{$user['id']}}" onsubmit="return confirm('Are you sure you want to delete this user permanently?')" method="post">
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger" type="submit">Delete User</button>
                </form>
                </td>
              </tr>
              @endforeach
            </tbody>
      </table>
    </div>
    
</div>
</div>
</div>

@endsection
