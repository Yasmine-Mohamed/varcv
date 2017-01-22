@extends('layouts.app')
@section('content')
    <h1>Skills</h1>
    <hr>
    <a href="{{ route('skills.create') }}" class="btn btn-primary">Add Skill</a>
    <hr>

    <div class="container">
        <div class="row">
            @foreach($authUserSkills as $authUserSkill)
             <div class="col-md-4">
                 <div class="thumbnail">
                     <div class="caption">
                         @foreach($authUserSkill->skills as $skill)
                            <h4>Skill: {{ $skill->skill_name }}</h4>
                         @endforeach
                         @foreach($authUserSkill->levels as $level)
                             <h4>Level: {{ $level->level_name }}</h4>
                         @endforeach
                         @if(!empty( $authUserSkill->working_years))
                            <h4>Working Years: {{ $authUserSkill->working_years }}</h4>
                         @endif
                         <a href="{{ route('skills.edit' , $authUserSkill->id ) }}" class="btn btn-warning">Edit Skill</a>
                     </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@stop