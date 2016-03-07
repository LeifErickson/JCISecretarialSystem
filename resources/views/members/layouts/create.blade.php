
@extends('members/layouts/masters/template')
@section('content')
    <h1>New Member</h1>
    {!! Form::open(['url' => 'members']) !!}
    <div class="form-group">
        {!! Form::label('FirstName', 'FirstName:') !!}
        {!! Form::text('firstname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('LastName', 'LastName:') !!}
        {!! Form::text('lastname',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('MiddleName', 'MiddleName:') !!}
        {!! Form::text('middlename',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('BirthDate', 'BirthDate:') !!}
        <div class="form-row show-inputbtns">
        <input type="date" data-date-inline-picker="false" name="birthdate" data-date-open-on-focus="true" />
        </div>
    </div>
    <div class="form-group">
        {!! Form::label('Contact No', 'Contact No:') !!}
        {!! Form::text('contactno',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Gender', 'Gender:') !!}
        {!! Form::text('gender',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Status', 'Status:') !!}
        {!! Form::text('status',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Religion', 'Religion:') !!}
        {!! Form::text('religion',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Place of Birth', 'Place of Birth:') !!}
        {!! Form::text('placeofbirth',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('JCI Senatorial No.', 'JCI Senatorial No') !!}
        {!! Form::text('jcisenatorialno',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Date of Induction', 'Date of Induction') !!}
        <div class="form-row show-inputbtns">
        <input type="date" data-date-inline-picker="false" name="dateofinduction" data-date-open-on-focus="true" />
        </div>
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}
@stop