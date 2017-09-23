@extends('layouts.admin')
@section('content')
<div class="col-sm-10">
  
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)
      <tr>
        <td>{{$user['id']}}</td>
        <td>{{$user['name']}}</td>
        <td>{{$user['email']}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection