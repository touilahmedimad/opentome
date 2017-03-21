@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-2">
            <img src="storage/avatars/{{ Auth::user()->avatar}}" alt="" class="img-responsive img-circle" width="200" height="200">
          </div>
          <div class="col-md-10">
            <br/>
            <br/>
            <form class="form-inline" action="index.html" method="post">
              <div class="form-group">
                <input type="file" class="form-control" name="" value="">
              </div>
              <button type="submit" class="btn btn-default">
                save
              </button>
            </form>
          </div>
        </div>
        <form class="form-horizontal">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" value="{{ Auth::user()->name}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="inputEmail3" value="{{ Auth::user()->email}}">
            </div>
          </div>
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">biographie</label>
            <div class="col-sm-10">
              <textarea type="email" class="form-control" id="inputEmail3">{{ Auth::user()->bio }}</textarea>
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
