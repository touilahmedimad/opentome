@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('status_error'))
            <div class="alert alert-danger">
                {{ session('status_error') }}
            </div>
        @endif
        <form class="form-horizontal" action="{{ route('postPassword')}}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Old Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputEmail3"  name="old_password">
                    @if($errors->has('old_password'))
                        <span class="help-block">
                  <strong>{{ $errors->first('old_password')}}</strong>
                </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">New Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputEmail3" name="password" >
                    @if($errors->has('password'))
                        <span class="help-block">
                  <strong>{{ $errors->first('password')}}</strong>
                </span>
                    @endif
                </div>
            </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Confirm Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputEmail3" name="password_confirmation">
            @if($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('password_confirmation')}}</strong>
                </span>
            @endif
        </div>
    </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">Save</button>
                </div>
            </div>
        </form>
        </div>
    </div>
    @endsection