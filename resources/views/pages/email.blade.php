@extends('layouts.app')
@section('title')
    {{ __('messages.update_email')}}
    @endsection
@section('content')
    <div class="container">
        @if(session('status_error'))
            <div class="alert alert-danger">
                {{ session('status_error') }}
            </div>
        @endif
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
        <form action="{{ route('postEmail') }}" method="post" role="form">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="" class="col-sm-2 control-label"> Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="" name="password" placeholder="">
                    @if($errors->has('password'))
                        <span class="help-block">
                            {{ $errors->first('password') }}
                        </span>
                        @endif
                </div>
            </div>
            <br></br>
            <div class="form-group">
                <label for="" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="email" placeholder="" value="{{ $user->email }}">
                    @if($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection