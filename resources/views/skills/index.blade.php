@extends('layouts.app')
@section('content')
    <h1>Skills</h1>
    <hr>
    <a href="{{ route('skills.create') }}" class="btn btn-primary">Add Skill</a>
    <hr>
    <div class="container">
        <div class="row">
                @foreach($skills as $skill)
                <div class="col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h4>Skill: {{ $skill->skill_name }}</h4>
                            @foreach($skill->levels as $level)
                            <h4>Level: {{ $level->level_name }}</h4>
                            @endforeach
                            <h4>Working Years: {{ $skill->pivot->working_years }}</h4>
                            <a href="{{ route('skills.edit' , $skill->pivot->skill_id ) }}" class="btn btn-warning">Edit Skill</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop