@extends('layouts.app')
@section('content')

    <h1>Education</h1>
    <hr>
    <a href="{{ route('education.create') }}" class="btn btn-primary">Add Education</a>
    <hr>
    @foreach($userEducationNode as $value)
        <h4>{{ $value->education_name }} {{ $value->education_field }}</h4>
        <h4>{{ date("F", mktime(0, 0, 0, $value->graduation_date['month'], 1)) }} {{ $value->graduation_date['year'] }}</h4>
        <h4>{{ $value->grade }}</h4>
        <a href="{{ route('education.edit' , $value->id ) }}" class="btn btn-warning">Edit Data</a>
        <hr>
    @endforeach
@stop