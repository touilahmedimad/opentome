@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        @foreach($testimonials as $testimonial)
          <div class="panel panel-default">
            <div class="panel-body">
              <p><strong>{{$testimonial->pseudo}}</strong>&nbsp<small>{{ $testimonial->created_at->diffForHumans()}}</small></p>
              <p class="text-justify">{{$testimonial->message}}</p>
              <button class="btn btn-danger pull-right">{{ __('messages.delete') }}</button>
              <button class="btn btn-info">{{ __('messages.share') }}</button>
            </div>
          </div>
        @endforeach
        {{ $testimonials->links()}}
      </div>
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-body">
            <img src="{{ Storage::url(Auth::user()->avatar)}}" alt="" class="img-responsive img-circle  center-block" width="150" height="150" />
          </div>
          <div class="panel-footer">
            <h3>{{ Auth::user()->name }} <small>{{ Auth::user()->username}}</small></h3>
            <p>{{ Auth::user()->bio }}</p>
            <div class="form-inline">
              <div class="form-group">
                <label for="">{{ __('messages.profile')}}</label>
                <input type="text" class="form-control" id="" placeholder="" disabled value="{{ route('profilePage', ['username' => Auth::user()->username ])}}">
                <a target="_blank" class="btn btn-default" href="https://www.facebook.com/sharer/sharer.php?u={{ route('profilePage', ['username' => Auth::user()->username ])}}">
                  <i class="fa fa-facebook"></i>
                </a>
                <a target="_blank" href="https://twitter.com/intent/tweet?url={{ route('profilePage', ['username'=> Auth::user()->username ])}}" class="btn btn-default">
                  <i class="fa fa-twitter"></i>
                </a>
              </div>
            </div>
          </div>
        </di>
      </div>
    </div>
  @endsection
