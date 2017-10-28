@extends('layouts.admin')
@section('title', 'Manage Wallets ')
@section('subtitle', 'Wallet List')

@section('content')
<div class="col-sm-12">
    <div class="box">
            <div class="box-header">
              <h3 class="box-title">Wallet List</h3>
              <a href="{{ route('wallets.add') }}" class="btn btn-success pull-right">Add New Wallet </a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

        
    <!-- wallets list -->
    @if(!empty($wallets))
            <!-- /.box-header -->
            <div class="box-body">
               <table id="datatable" class="table table-bordered table-hover">
                    <!-- Table Headings -->
                    <thead>
                        <th>Name</th>
                        <th>Balance</th>
                        <th>Lock Code</th>
                        <th>Status</th>
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
                                <div>
                                    @if ($wallet->archived == 1)
                                        Archived 
                                    @else
                                        Active
                                    @endif
                                </div>
                            </td>
                            <td class="table-text">
                                <div>{{$wallet->created_at}}</div>
                            </td>
                            <td>
                                <a href="{{ route('wallets.details', $wallet->id) }}" class="btn btn-success">Details</a>
                           
                                @if($wallet->archived == 0)
                                  <a href="/admin/{{ $wallet->id }}/archivewallet" type="submit" class="btn btn-md btn-danger" onclick="return confirm('Are you sure to archive this wallet?')">{{ 'Archive Wallet' }}</a>
                                @else
                                  <a href="/admin/{{ $wallet->id }}/activatewallet" type="submit" class="btn btn-md btn-success" onclick="return confirm('Are you sure you want to Activate this wallet?')">{{ 'Activate Wallet' }}</a>
                                @endif

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection