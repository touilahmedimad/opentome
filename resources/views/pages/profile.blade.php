@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-2">

            <img src="{{ Storage::url(Auth::user()->avatar)}}" alt="" class="img-responsive img-circle" width="200" height="200">
          </div>
          <div class="col-md-10">
            <br/>
            <br/>
            <form class="form-inline {{ $errors->has('avatar') ? 'has-error' : ''}}" action="{{ route('updatePicture')}}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <input type="file" class="form-control" name="avatar" value="">
                {{ csrf_field()}}
              </div>
              <button type="submit" class="btn btn-default">
                save
              </button>
              @if(session('status'))
                <br/><br/>
                <div class="alert alert-success">
                  {{ session('status') }}
                </div>
              @endif
              @if ($errors->has('avatar'))
                <span class="help-block">
                  <strong>{{ $errors->first('avatar') }}</strong>
                </span>
              @endif
            </form>
          </div>
        </div>
        <form class="form-horizontal" action="{{ route('updateProfile')}}" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" name="name" value="{{ Auth::user()->name}}">
              @if($errors->has('name'))
                <span class="help-block">
                  <strong>{{ $errors->first('name')}}</strong>
                </span>
              @endif
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">biographie</label>
            <div class="col-sm-10">
              <textarea type="text" class="form-control" id="inputEmail3" name="bio">{{ Auth::user()->bio }}</textarea>
              @if($errors->has('bio'))
                <span class="help-block">
                  <strong>{{ $errors->first('bio')}} </strong>
                </span>
              @endif
              @if(session('updated_profile'))
                <br/>
                <span class="alert alert-success">
                  <strong>{{ session('updated_profile')}}</strong>
                </span>
                <br/><br/>
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
    </di>
  </div>
@endsection
