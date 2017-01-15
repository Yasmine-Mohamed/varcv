@extends('layouts.app')
@section('content')
    <h1>User Education</h1>
    <hr>
    {!! Form::open(['url' => 'education']) !!}
    <div class="form-group">
        {!! Form::label('education_name','Education Name:') !!}
        {!! Form::text('education_name',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('education_field','Education Field:') !!}
        {!! Form::text('education_field',null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('graduation_date','Graduation Date:') !!}
        {!! Form::selectYear('graduation_date[year]',Carbon\Carbon::now()->year, (new Carbon\Carbon('100 years ago'))->year, null, ['class' => 'field']) !!}
        {!! Form::selectMonth('graduation_date[month]',null,['class' => 'field']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('grade','Grade:') !!}
        {!! Form::text('grade',null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add Education', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop