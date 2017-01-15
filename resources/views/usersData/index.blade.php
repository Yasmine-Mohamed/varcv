@extends('layouts.app')
@section('content')
    <h1>Data</h1>
    <hr>
    @if(empty($userData && $userPhone))
        <a href="{{ route('user.create') }}" class="btn btn-primary">Create Data</a>
    @else
        <h4>{{ $userData->first_name }} {{ $userData->middle_name }} {{ $userData->last_name }}</h4>
        <h4>{{ $userData->business_email }}</h4>
        <h4>{{ $userData->address }}</h4>
        <h4>{{ $userData->birthday }}</h4>
        <h4>{{ $userPhone->phone }}</h4>
        <hr>
        <a href="{{ route('user.edit' , $userData->id ) }}" class="btn btn-warning">Edit Data</a>
    @endif

@stop
