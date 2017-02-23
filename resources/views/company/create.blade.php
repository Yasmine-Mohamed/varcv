@extends('layouts.app')
@section('content')
    {!! Form::open(['url' => 'company']) !!}

    <div class="form-group">
        {!! Form::label('company_name','Company Name : ') !!}
        {!! Form::text('company_name',null, ['class' => 'form-control']) !!}
        <br>
        {!! Form::label('owner_name','Owner: ') !!}
        {!! Form::text('owner_name', null, ['class' => 'form-control']) !!}
        <br>
        {!! Form::label('industry_field','Industry Field : ') !!}
        {!! Form::text('industry_field', null, ['class' => 'form-control']) !!}
        <br>
        {!! Form::label('address','Address : ') !!}
        {!! Form::text('address', null, ['class' => 'form-control']) !!}
        <br>
        {!! Form::label('foundation_date','Foundation Date : ') !!}
        {!! Form::input('date','industry_field',date('Y-m-d'), ['class' => 'form-control']) !!}
        <br>
        {!! Form::label('current_employees_num','Current Employees Num : ') !!}
        {!! Form::text('current_employees_num', null, ['class' => 'form-control']) !!}
        <br>
        {!! Form::label('skills','Skills:') !!}
        {!! Form::select('skills[]',$skills ,null, ['id' => 'skills','class'=>'form-control', 'multiple']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Add Data', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

@stop
@section ('footer')
    <script>
        $('#skills').select2({
            placeholder: 'Choose a tag'
        });
    </script>
@endsection