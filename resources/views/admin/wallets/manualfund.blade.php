@extends('layouts.admin')
@section('title', 'Manule Fund Wallet')
@section('subtitle', 'Fund Wallet')

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
                Fund <strong>{{ $wallet->name }} </strong>  Wallet Manually <a href="{{ route('wallets.details', $wallet->id) }}" class="label label-primary pull-right">Back</a>
            </div>
            
                <div class="panel-body">

                <form action="{{ route('wallets.manualfund.store', $wallet->id) }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <input type="hidden" name="method" value="Manual Funding">
                    <input type="hidden" name="status" value="Completed">
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="wallet_id" value="{{ $wallet->id }}">
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Wallet Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="wallet" id="wallet" class="form-control" value="{{ $wallet->name }}" disabled="disabled">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Reason</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" class="form-control" v>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Amount</label>
                        <div class="col-sm-10">
                            <input type="text" name="amount" id="amount" class="form-control" v>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" >Comment</label>
                        <div class="col-sm-10">
                            
                            <textarea name="comment" id="comment" class="form-control"></textarea>

                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" value="Fund Wallet" />
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection