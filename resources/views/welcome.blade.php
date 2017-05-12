@extends('layouts.app')

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
                    <div class="panel panel-default">
                        <div class="panel-heading">Touil Ahmed Imad</div>

                        <div class="panel-body">
                            You are a precious friend
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
