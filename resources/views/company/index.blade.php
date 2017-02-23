@extends('layouts.app')
@section('content')
    <h1>Company Data</h1>
    <hr>
    <a href="{{ route('company.create') }}" class="btn btn-primary">Add Data</a>
    <hr>
@stop