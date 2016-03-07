@extends('members/layouts/masters/template')
@section('content')
    <h1>Update Member</h1>
    {!! Form::model($members,['method' => 'PATCH','route'=>['members.update',$members->id]]) !!}
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
        {!! Form::model($members, array('route' => array('members.update', $members->id))) !!}
        {!! Form::label('BirthDate', 'BirthDate:') !!}
        {!! Form::text('birthdate',null,['class'=>'form-control', 'data-date-inline-picker'=>'false', 'data-date-open-on-focus'=>'true']) !!} 
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
        {!! Form::text('dateofinduction',null,['class'=>'form-control', 'data-date-inline-picker'=>'false', 'data-date-open-on-focus'=>'true']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}
@stop