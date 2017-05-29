@extends('layouts.app')
@section('title')
    {{ $page->title }}
    @endsection

@section('content')
    <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                            {!! $page->body !!}
                    </div>
                </div>
            </div>
    </div>
@endsection
