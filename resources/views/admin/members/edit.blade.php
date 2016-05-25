@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.member.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.member.management') }}
    </h1>
@stop

@section('content')
<div class="box box-success">
	<div class="box-header with-border">
		<h3 class="box-title">Update Member</h3>
		<div class="box-tools pull-left" style="margin-left: 20px">
		  <a href="{{ url('admin/members') }}" class="btn btn-primary pull-right btn-sm">Go Back</a>
		</div>
	</div>
	<div class="box-body">
    {!! Form::model($member, [
        'method' => 'PATCH',
        'url' => ['admin/members', $member->id],
        'class' => 'form-horizontal'
    ]) !!}
			
			
            <div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
                {!! Form::label('firstname', 'Firstname: ', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('firstname', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
                {!! Form::label('lastname', 'Lastname: ', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('lastname', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('middlename') ? 'has-error' : ''}}">
                {!! Form::label('middlename', 'Middlename: ', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('middlename', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('middlename', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('birthdate') ? 'has-error' : ''}}">
                {!! Form::label('birthdate', 'Birthdate: ', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::date('birthdate', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('birthdate', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('cellphonenumber') ? 'has-error' : ''}}">
                {!! Form::label('cellphonenumber', 'CellphoneNumber: ', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('cellphonenumber', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('cellphonenumber', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
                {!! Form::label('gender', 'Gender: ', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('gender', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                {!! Form::label('status', 'Status: ', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('religion') ? 'has-error' : ''}}">
                {!! Form::label('religion', 'Religion: ', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('religion', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('religion', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('placeofbirth') ? 'has-error' : ''}}">
                {!! Form::label('placeofbirth', 'Place Of Birth: ', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('placeofbirth', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('placeofbirth', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('jcisenatorialno') ? 'has-error' : ''}}">
                {!! Form::label('jcisenatorialno', 'JCI Senatorial No: ', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::text('jcisenatorialno', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('jcisenatorialno', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dateofinduction') ? 'has-error' : ''}}">
                {!! Form::label('dateofinduction', 'Date Of Induction: ', ['class' => 'col-sm-5 control-label']) !!}
                <div class="col-sm-4">
                    {!! Form::date('dateofinduction', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('dateofinduction', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

	</div>
	<div class="box-footer">
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-3">
				{!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
			</div>
		</div>
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

@stop