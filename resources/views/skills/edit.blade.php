@extends('layouts.app')
@section('content')
    {!! Form::model($userSkill ,['method' => 'PATCH' , 'action' => ['SkillsController@update' , $userSkill->skill_id ]] ) !!}
    <div class="form-group">
        {!! Form::label('workSkills','Work Skills : ') !!}
        {!! Form::select('skill_id',$workSkills, null, ['class' => 'form-control']) !!}
        <br>
        {!! Form::label('levels','Skill Level : ') !!}
        {!! Form::select('level_id',$levels, null, ['class' => 'form-control']) !!}
        <br>
        {!! Form::label('working_years','Working Years : ') !!}
        {!! Form::text('working_years', null, ['class' => 'form-control']) !!}
    </div>

    <hr>
    {{--<div class="form-group">--}}
    {{--{!! Form::label('personalSkills','Personal Skills : ') !!}--}}
    {{--{!! Form::select('skill_id',$personalSkills, null, ['class' => 'form-control']) !!}--}}
    {{--</div>--}}

    <div class="form-group">
        {!! Form::submit('Update Skill', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
@stop