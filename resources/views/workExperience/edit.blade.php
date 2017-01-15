@extends('layouts.app')
@section('content')

    {!! Form::model($userWorkExperience , ['method' => 'PATCH' , 'action' => ['WorkExperienceController@update' , $userWorkExperience->id]]) !!}

    <div class="form-group">
        {!! Form::label('job_title','Job Title:') !!}
        {!! Form::text('job_title',null,['class' =>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('company_name' , 'Company Name:') !!}
        {!! Form::text('company_name',null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('job_description' , 'Job Description:') !!}
        {!! Form::text('job_description',null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('start_date','Start Date:') !!}
        {!! Form::selectMonth('start_date[month]',null,['class' => 'field']) !!}
        {!! Form::selectYear('start_date[year]',Carbon\Carbon::now()->year, (new Carbon\Carbon('100 years ago'))->year,$userWorkExperience->start_date['year'], ['class' => 'field']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('end_date' ,'End Date:') !!}
        {!! Form::selectMonth('end_date[month]',null,['class' => 'field']) !!}
        {!! Form::selectYear('end_date[year]',Carbon\Carbon::now()->year, (new Carbon\Carbon('100 years ago'))->year,$userWorkExperience->end_date['year'], ['class' => 'field']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update Work Experience', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop