@extends('layouts.admin')
@section('title', 'Add New Beneficiary ')
@section('subtitle', 'Create Beneficiary')

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
                Add a New Wallet <a href="{{ route('beneficiaries.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                <form action="{{ route('beneficiaries.insert') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}


                    <div class="form-group">
                        <label class="control-label col-sm-2" >Wallet</label>
                        <div class="col-sm-10">
                            <select name="wallet_id" id="wallet_id">
                                
                                @foreach ($wallets as $wallet)
                                <option value="{{$wallet->id}}">{{$wallet->name}}</option>
                                @endforeach


                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Beneficiary Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Bank Name</label>
                        <div class="col-sm-10">
                            <select name="bank_id" id="bank_id">
                                
                                <option value="1"> GTBank</option>
                            </select>

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-sm-2" >Account Number</label>
                        <div class="col-sm-10">
                            <input type="text" name="account_number" id="account_number" class="form-control">
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