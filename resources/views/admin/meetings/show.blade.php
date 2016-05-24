@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.meeting.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.meeting.management') }}
        <small>{{ trans('labels.backend.access.meeting.show') }}</small>
    </h1>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h2 class="box-title">Meeting History</h2>

            <div class="box-tools pull-right">
                <a href="{{{ URL::previous() }}}" class="btn btn-primary pull-right btn-sm">Go Back</a>
            </div>
        </div><!-- /.box-header -->
		<div class="box-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped table-hover">
					<tr>
						<td class="col-md-3" >{!! Form::label('id', 'ID:') !!}</td>
						<td>{!! $meeting->id !!}</td>
					</tr> 
					<tr>
						<td class="col-md-3" >{!! Form::label('title', 'Title:') !!}</td>
						<td>{!! $meeting->title !!}</td>
					</tr> 
					<tr>
						<td class="col-md-3" >{!! Form::label('eventtype', 'Event Type:') !!}</td>
						<td>{!! $meeting->eventtype !!}</td>
					</tr> 
					<tr>
						<td class="col-md-3" >{!! Form::label('description', 'Description:') !!}</td>
						<td>{!! $meeting->description !!}</td>
					</tr> 
					<tr>
						<td class="col-md-3" >{!! Form::label('agenda', 'Agenda:') !!}</td>
						<td>{!! $meeting->agenda !!}</td>
					</tr> 
					<tr>
						<td class="col-md-3" >{!! Form::label('type', 'Type:') !!}</td>
						<td>{!! $meeting->type !!}</td>
					</tr> 
					<tr>
						<td class="col-md-3" >{!! Form::label('datecreated', 'Date Created:') !!}</td>
						<td>{!! $meeting->datecreated !!}</td>
					</tr> 
					<tr>
						<td class="col-md-3" >{!! Form::label('dateset', 'Date Set:') !!}</td>
						<td>{!! $meeting->dateset !!}</td>
					</tr> 
					<tr>
						<td class="col-md-3" >{!! Form::label('location', 'Location:') !!}</td>
						<td>{!! $meeting->location !!}</td>
					</tr> 
					<tr>
						<td class="col-md-3" >{!! Form::label('leadby', 'Lead By:') !!}</td>
						<td>{!! $meeting->leadby !!}</td>
					</tr> 
					<tr>
						<td class="col-md-3" >{!! Form::label('minutetaker', 'Minutetaker:') !!}</td>
						<td>{!! $meeting->minutetaker !!}</td>
					</tr> 
					<tr>
						<td class="col-md-3" >{!! Form::label('started', 'Started:') !!}</td>
						<td>{!! $meeting->started !!}</td>
					</tr> 
					<tr>
						<td class="col-md-3" >{!! Form::label('ended', 'Ended:') !!}</td>
						<td>{!! $meeting->ended !!}</td>
					</tr> 
					<tr>
						<td class="col-md-3" >{!! Form::label('created_at', 'created At:') !!}</td>
						<td>{!! $meeting->created_at !!}</td>
					</tr> 
					<tr>
						<td class="col-md-3" >{!! Form::label('updated_at', 'Updated At:') !!}</td>
						<td>{!! $meeting->updated_at !!}</td>
					</tr> 
				</table>
			</div>
	
		 </div>
	 <!--
	
            <thead>
                <tr>
                    <th>ID.</th> <th>Title</th><th>Description</th><th>Agenda</th><th>Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $meeting->id }}</td> <td> {{ $meeting->title }} </td> <td> {{ $meeting->description }} </td><td> {{ $meeting->agenda }} </td><td> {{ $meeting->type }} </td>
                </tr>
            </tbody>    
     -->   
@stop