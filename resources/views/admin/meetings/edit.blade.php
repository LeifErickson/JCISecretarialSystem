@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.meeting.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.meeting.management') }}
        <small>{{ trans('labels.backend.access.meeting.edit') }}</small>
    </h1>
@stop

@section('content')
<div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Meeting</h3>
                </div>
                <div class="box-body">
				 {!! Form::model($meeting, [
					  'method' => 'PATCH',
					  'url' => ['admin/events/meetings', $meeting->id],
					  'class' => 'form-horizontal'
				 ]) !!}

            
            <div class="form-group {{ $errors->has('agenda') ? 'has-error' : ''}}">
                {!! Form::label('agenda', 'Agenda: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('agenda', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('agenda', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('type') ? 'has-error' : ''}}">
                {!! Form::label('type', 'Type: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('type', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('datecreated') ? 'has-error' : ''}}">
                {!! Form::label('datecreated', 'Datecreated: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::date('datecreated', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('datecreated', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('dateset') ? 'has-error' : ''}}">
                {!! Form::label('dateset', 'Dateset: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::date('dateset', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('dateset', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('location') ? 'has-error' : ''}}">
                {!! Form::label('location', 'Location: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('location', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('location', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('leadby') ? 'has-error' : ''}}">
                {!! Form::label('leadby', 'Leadby: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('leadby', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('leadby', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('minutetaker') ? 'has-error' : ''}}">
                {!! Form::label('minutetaker', 'Minutetaker: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('minutetaker', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('minutetaker', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('started') ? 'has-error' : ''}}">
                {!! Form::label('started', 'Started: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('started', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('started', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('ended') ? 'has-error' : ''}}">
                {!! Form::label('ended', 'Ended: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::text('ended', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('ended', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
				<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                {!! Form::label('description', 'Description: ', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-8">
                    {!! Form::textarea('description', null, ['id'=>'editor1','class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
			</div>
	<div class="box-footer">
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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
	</div>
</div>
@stop

@section('after-scripts-end')
	<script src="{{ URL::asset('ckeditor/ckeditor.js') }}"></script>
		 
		 
		<script>
			// Replace the <textarea id="editor1"> with a CKEditor
			// instance, using default configuration.
			CKEDITOR.replace( 'editor1' );
		</script>
@stop