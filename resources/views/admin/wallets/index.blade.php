@extends('layouts.admin')
@section('title', 'Manage Wallets ')
@section('subtitle', 'Wallet List')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <br>
        
    <!-- wallets list -->
    @if(!empty($wallets))
   
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Wallet List</h3>
              <a class="btn btn-success pull-right" href="{{ route('wallets.add') }}"> Add New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="datatable" class="table table-bordered table-hover">
                    <!-- Table Headings -->
                    <thead>
                        <th>Name</th>
                        <th>Balance</th>
                        <th>Lock Code</th>
                        <th>Rule</th>
                        <th>Created</th>
                        <th>Action</th>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody>
                    @foreach($wallets as $wallet)
                        <tr>
                            <td class="table-text">
                                <div>{{ $wallet->wallet_name }}</div>
                            </td>
                            <td class="table-text">
                                <div>{{ $wallet->balance }}</div>
                            </td>

                            <td class="table-text">
                                <div>{{$wallet->lock_code}}</div>
                            </td>

                            <td class="table-text">
                                <div>{{$wallet->status}}</div>
                            </td>

                                <td class="table-text">
                                <div>{{$wallet->created_at}}</div>
                            </td>
                            <td>
                                <a href="{{ route('wallets.details', $wallet->id) }}" class="btn btn-success">Details</a>
                                <a href="{{ route('wallets.edit', $wallet->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('wallets.delete', $wallet->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to archive this wallet?')">Archive</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
</div>
@endsection