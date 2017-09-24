@extends('layouts.admin')

@section('content')

<?php

$totalusers = count($users);
$totalwallets = count($wallets);

?>

	<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$totalwallets}}</h3>

              <p>Total Wallets</p>
            </div>
            <div class="icon">
              <i class="fa fa-briefcase"></i>
            </div>
<<<<<<< HEAD
            <a href="{{ url('/admin/managewallet') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
=======
            <a href="{{url('admin/managewallet')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
>>>>>>> ce301993408f435fd755b751c9f6fc4597bedadd
          </div>
        </div>
        <!-- ./col -->



      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$totalusers}}</h3>

              <p>Total Users</p>
            </div>
            <div class="icon">
              <i class="fa fa-users"></i>
            </div>
            <a href="{{url('admin/users')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->


<<<<<<< HEAD
=======
<div class="row">
        <div class="col-md-10">

               <table class="table table-striped">
			    <thead>
			      <tr>
			        <th>ID</th>
			        <th>Username</th>
			        <th>Email</th>
			        <th>Firstname</th>
			        <th>Lastname</th>
			        
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
  </div>



>>>>>>> ce301993408f435fd755b751c9f6fc4597bedadd

  </section>



@endsection
