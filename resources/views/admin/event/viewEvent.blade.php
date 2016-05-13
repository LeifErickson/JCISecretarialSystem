@extends('backend.layouts.master')

@section('page-header')
    <h1>
        Event
    </h1>
	 
@stop
@section('content')
	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title">View Event</h3>
			<div class="box-tools pull-left" style="margin-left: 20px">
			  <a href="{{ url('admin/events') }}" class="btn btn-primary pull-right btn-sm">Go Back</a>
			</div>
		</div>
		<div class="box-body">
			<table class="table table-bordered">
				<?php foreach($events as $event) {?>
					<tr>
						<td class="col-md-3" ><label>Event Title: </label></td>
						<td><?php echo $event->name; ?></td>
					</tr>
					<tr>
						<td class="col-md-3" ><label>Date Held: </label></td>
						<td><?php echo $event->year; ?></td>
					</tr>
					<tr>
						<td class="col-md-3" ><label>Organizer: </label></td>
						<td><?php echo $event->organizer; ?></td>
					</tr>
					<tr>
						<td class="col-md-3" ><label>Sponsors: </label></td>
						<td>
					<?php foreach($sponsors as $sponsor) {?>
						<?php echo "- ".$sponsor->name."</br>"; ?>
					<?php } ?>
						</td>
					</tr>
					<tr>
						<td class="col-md-3" ><label>Description: </label></td>
						<td><?php echo $event->description; ?></td>
					</tr>
				<?php } ?>
			</table>
			
		</div>
@stop