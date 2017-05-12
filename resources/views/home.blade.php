@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        @if(session('status'))
          <div class="alert alert-success">
            {{ session('status') }}
          </div>
        @endif
        @foreach($testimonials as $testimonial)
          <div class="panel panel-default">
            <div class="panel-body">
              <div id="widget{{$testimonial->id}}">
                <p><strong>{{$testimonial->pseudo}}</strong>&nbsp<small>{{ $testimonial->created_at->diffForHumans()}}</small></p>
                <p class="text-justify">{{$testimonial->message}}</p>
              </div>
              <button class="btn btn-danger pull-right" data-toggle="modal" href="#deletemodal{{$testimonial->id}}">{{ __('messages.delete') }}</button>
              <div class="modal fade" id="deletemodal{{$testimonial->id}}">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Warning !</h4>
                    </div>
                    <div class="modal-body">
                        <b>Are you sure you want to delete:</b>
                      {{ $testimonial->message }}
                    </div>
                    <div class="modal-footer">
                      <form action="{{ route('deleteTestimonial') }}" method="post">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="hidden" value="{{$testimonial->id}}" name="id">
                        <input type="hidden" name="_method" value="delete">
                        {{ csrf_field() }}
                        <button class="btn btn-danger">Yes</buttonl>
                      </form>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
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
