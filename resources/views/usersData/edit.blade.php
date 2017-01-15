@extends('layouts.app')
@section('content')
    {!! Form::model($userData ,['method' => 'PATCH' , 'action' => ['DataUserController@update' , $userData->id ]] ) !!}
    <div class="form-group">
        {!! Form::label('firstName','First Name:') !!}
        {!! Form::text('first_name',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('middleName','Middle Name:') !!}
        {!! Form::text('middle_name',null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('lastName','Last Name:') !!}
        {!! Form::text('last_name',null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('profilePicture','Profile Picture') !!}
        {!! Form::file('profile_picture') !!}
    </div>

    <div class="form-group">
        {!! Form::label('birthDay','BirthDay:') !!}
        {!! Form::input('date','birthday', null ,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('address','Address:') !!}
        {!! Form::text('address', null ,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('businessEmail','Business Email:') !!}
        {!! Form::email('business_email', null , ['class' => 'form-control']) !!}
    </div>

    {{--<div class="form-group">--}}
        {{--{!! Form::label('phone','Mobile Number:') !!}--}}
        {{--{!! Form::number('phone',null , ['class' => 'form-control']) !!}--}}
    {{--</div>--}}

    <div class="form-group">
        {!! Form::submit('Update Data', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}


@stop
