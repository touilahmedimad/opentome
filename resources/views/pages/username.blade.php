@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-heading">
            <img src="{{ Storage::url($user->avatar)}}" height=200 width=200 class="img-responsive img-circle center-block" alt="">
            <h2 class="text-center">{{ $user->name }}</h2>
            <h4 class="text-center">{{ $user->bio }}</h4>
          </div>

          <div class="panel-body">
            <form class="" action="{{ route('storeTestimonial')}}" method="post">
              <input type="hidden" name="id" value="{{ $user->id }}">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="">{{ __('messages.message')}}</label>
                <textarea type="text" class="form-control" name="message" id="" placeholder="">
                </textarea>
                @if($errors->has('message'))
                  <span class="help-block">
                    <strong>{{ $errors->first('message')}}</strong>
                  </span>
                @endif
              </div>
              <div class="form-group">
                <label for="">{{ __('messages.pseudo')}}</label>
                <input type="text" class="form-control" id="" placeholder="Anonyme" name="pseudo">
                <p class="help-block">{{ __('messages.help_pseudo_field')}}</p>
              </div>
              @if(session('status'))
                <div class="alert alert-success">
                  {{ session('status')}}
                </div>
              @endif
              <div class="text-center">
                <button type="submit" class="btn btn-success text-center">
                  Save
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
