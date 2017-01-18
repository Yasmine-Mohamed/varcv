@extends('layouts.app')
@section('content')
    {!! Form::open(['url' => 'skills']) !!}
        <div class="form-group">
            {!! Form::label('workSkills','Work Skills : ') !!}
            {!! Form::select('skill_id',$workSkills, null, ['placeholder' => 'Choose Skill' , 'class' => 'form-control']) !!}
            <br>
            {!! Form::label('levels','Skill Level : ') !!}
            {!! Form::select('level_id', $levels, null, ['placeholder' => 'Choose Level' ,'class' => 'form-control']) !!}
            <br>
            {!! Form::label('working_years','Working Years : ') !!}
            {!! Form::text('working_years', null, ['placeholder' => 'Working Years' ,'class' => 'form-control']) !!}
        </div>

        <hr>
        {{--<div class="form-group">--}}
            {{--{!! Form::label('personalSkills','Personal Skills : ') !!}--}}
            {{--{!! Form::select('skill_id',$personalSkills, null, ['placeholder' => 'Choose Skill','class' => 'form-control']) !!}--}}
        {{--</div>--}}

         <div class="form-group">
            {!! Form::submit('Add Skill', ['class' => 'btn btn-primary form-control']) !!}
        </div>

    {!! Form::close() !!}
@stop