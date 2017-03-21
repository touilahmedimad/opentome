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
                <img src="{{ asset('storage/avatars/'.Auth::user()->avatar)}}" alt="" class="img-responsive img-circle  center-block" width="150" height="150" />
              </div>
              <div class="panel-footer">
                <h3>{{ Auth::user()->name }} <small>{{ Auth::user()->username}}</small></h3>
                <p>{{ Auth::user()->bio }}</p>
                <a href="#">Read More</a>
              </div>
        </di>
    </div>
</div>
@endsection
