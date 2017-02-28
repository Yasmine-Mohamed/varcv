@extends('layouts.app')
@section('content')
    <h1>Company Data</h1>
    <hr>
    @if(empty($companyData))
        <a href="{{ route('company.create') }}" class="btn btn-primary">Add Data</a>
    <hr>
    @else
        <h4><b>Company Name :</b> {{ $companyData->company_name }}</h4>
        <h4><b>Owner :</b> {{ $companyData->owner_name }}</h4>
        <h4><b>Address :</b> {{ $companyData->address }}</h4>
        <h4><b>Field :</b> {{ $companyData->industry_field }}</h4>
        <h4><b>Foundation Date :</b> {{ $companyData->foundation_date }}</h4>
        <h4><b>Employees Num :</b> {{ $companyData->current_employees_num }}</h4>
        <h4><b>Skills Searched For :</b></h4>
        @foreach($skills as $skill)
            <h4><p>{{ $skill->skill_name }}</p></h4>
        @endforeach
        <hr>
        <a href="{{ route('company.edit' , $companyData->id ) }}" class="btn btn-warning">Edit Data</a>
    @endif
@stop