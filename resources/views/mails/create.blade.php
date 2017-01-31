@extends('layouts.app')
@section('content')
    {!! Form::open(['action' => 'MailsController@sendMail','files' => true]) !!}

    <div class="form-group">
        {!! Form::label('to','To:') !!}
        {!! Form::text('to',null,['class' =>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('from','From:') !!}
        {!! Form::text('from',null,['class' =>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('subject','Subject:') !!}
        {!! Form::text('subject',null,['class' =>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cover_letter','Cover Letter:') !!}
        {!! Form::textarea('cover_letter',null,['class' =>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('file','Attachment:') !!}
        {!! Form::file('file') !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Send Mail', ['class' => 'btn btn-primary form-control']) !!}
    </div>

    {!! Form::close() !!}
@stop