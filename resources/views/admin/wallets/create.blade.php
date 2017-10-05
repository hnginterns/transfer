@extends('layouts.admin')
@section('title', 'Add New Wallet ')
@section('subtitle', 'Create Wallet')

@section('content')
<div class="row">
    <div class="col-lg-12">
    	<br>
        @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach()
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                Add a New Wallet <a href="{{ route('wallets.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('wallets.insert') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Wallet Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Reference Code</label>
                        <div class="col-sm-10">
                            <input type="text" name="ref_code" id="ref_code" class="form-control">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Currency</label>
                        <div class="col-sm-10">
                            <input type="text" name="currency" id="currency" class="form-control">

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Rule</label>
                        <div class="col-sm-10">
                            <select name="rule_id" id="rule_id">
                            	<option value="1">Starter</option>
                            	<option value="2">Premium</option>
                            	<option value="3">Platinum</option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Status</label>
                        <div class="col-sm-10">
                            <select name="status" id="status">
                            	<option value="1">Active</option>
                            	<option value="0">Disabled</option>
                            	
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" value="Add Wallet" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection