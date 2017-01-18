@extends('layouts.app')
@section('content')

    <h1>Work Experience </h1>
    <hr>
    <a href="{{ route('workExperience.create') }}" class="btn btn-primary">Add Work</a>
    <hr>
    <div class="container">
        <div class="row">
            @foreach($userWorkExperience as $value)
                <div class="col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <h4>Title: {{ $value->job_title }}</h4>
                            <h4>Company: {{ $value->company_name }}</h4>
                            <h4>Start Date: {{ date("F", mktime(0, 0, 0, $value->start_date['month'], 1)) }} {{ $value->start_date['year'] }}</h4>
                            <h4>End Date: {{ date("F", mktime(0, 0, 0, $value->end_date['month'], 1)) }} {{ $value->end_date['year'] }}</h4>
                            <p>Job Desc: {{ $value->job_description }}</p>
                            <a href="{{ route('workExperience.edit' , $value->id ) }}" class="btn btn-warning">Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@stop