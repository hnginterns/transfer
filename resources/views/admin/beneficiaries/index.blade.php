@extends('layouts.admin')
@section('title', 'Manage Beneficiaries ')
@section('subtitle', 'Beneficiaries List')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <br>
        
    <!-- beneficiaries list -->
    @if(!empty($beneficiaries))
   
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Beneficiaries List</h3>
              <a class="btn btn-success pull-right" href="{{ route('beneficiaries.add') }}"> Add New</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <table id="example1" class="table table-bordered table-hover">
                    <!-- Table Headings -->
                    <thead>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Wallet</th>
                        <th>Bank</th>
                        <th>Account Number</th>
                        <th>Created</th>
                        <th>Action</th>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody>
                    @foreach($beneficiaries as $beneficiary)
                        <tr>
                            <td class="table-text">
                                <div>{{$beneficiary->name}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$beneficiary->status}}</div>
                            </td>

                            <td class="table-text">
                                <div>{{$beneficiary->wallet_id}}</div>
                            </td>

                            <td class="table-text">
                                <div>{{$beneficiary->bank_id}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$beneficiary->account_number}}</div>
                            </td>

                                <td class="table-text">
                                <div>{{$beneficiary->created_at}}</div>
                            </td>
                            <td>
                                <a href="{{ route('beneficiaries.details', $beneficiary->id) }}" class="btn btn-success">Details</a>
                                <a href="{{ route('beneficiaries.edit', $beneficiary->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('beneficiaries.delete', $beneficiary->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to archive this beneficiary?')">Archive</a>
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