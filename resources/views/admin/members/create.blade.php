@extends('layouts.master')

@section('content')

    <h1>Create New Member</h1>
    <hr/>

    {!! Form::open(['url' => 'admin/members', 'class' => 'form-horizontal']) !!}

                <div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
                {!! Form::label('firstname', 'Firstname: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('firstname', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
                {!! Form::label('lastname', 'Lastname: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('lastname', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('middlename') ? 'has-error' : ''}}">
                {!! Form::label('middlename', 'Middlename: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('middlename', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('middlename', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('birthdate') ? 'has-error' : ''}}">
                {!! Form::label('birthdate', 'Birthdate: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('birthdate', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('birthdate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('contractno') ? 'has-error' : ''}}">
                {!! Form::label('contractno', 'Contractno: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('contractno', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('contractno', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
                {!! Form::label('gender', 'Gender: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('gender', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                {!! Form::label('status', 'Status: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('religion') ? 'has-error' : ''}}">
                {!! Form::label('religion', 'Religion: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('religion', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('religion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('placeofbirth') ? 'has-error' : ''}}">
                {!! Form::label('placeofbirth', 'Placeofbirth: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('placeofbirth', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('placeofbirth', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('jcisenatorialno') ? 'has-error' : ''}}">
                {!! Form::label('jcisenatorialno', 'Jcisenatorialno: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('jcisenatorialno', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('jcisenatorialno', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dateofinduction') ? 'has-error' : ''}}">
                {!! Form::label('dateofinduction', 'Dateofinduction: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::date('dateofinduction', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('dateofinduction', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection