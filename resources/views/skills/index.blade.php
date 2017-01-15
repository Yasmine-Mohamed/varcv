@extends('layouts.app')
@section('content')

    <h1>Skills</h1>
    <hr>
    <a href="{{ route('skills.create') }}" class="btn btn-primary">Add Skill</a>
    <hr>
    @foreach($skills as $skill)
        <h4>{{ $skill->skill_id }} -- {{ $skill->level_id }}</h4>
        <h4>{{ $skill->working_years }}</h4>
        <a href="{{ route('skills.edit' , $skill->skill_id ) }}" class="btn btn-warning">Edit Skill</a>
        <hr>
    @endforeach
@stop