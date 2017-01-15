@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <a class="btn btn-primary" href="{{ route('login', ['google']) }}">Google+</a>
                    <a class="btn btn-primary" href="{{ route('login', ['facebook']) }}">Facebook</a>
                    <a class="btn btn-primary" href="{{ route('login', ['linkedin']) }}">LinkedIn</a>
                    <a class="btn btn-primary" href="{{ route('login', ['twitter']) }}">Twitter</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
