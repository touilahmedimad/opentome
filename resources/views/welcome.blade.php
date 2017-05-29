@extends('layouts.app')
@section('title')
    {{ __('messages.home') }}
    @endsection

@section('content')
    <div class="container">
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                            {!! Voyager::setting('home_text') !!}
                    </div>
                </div>
            </div>
    </div>
@endsection
