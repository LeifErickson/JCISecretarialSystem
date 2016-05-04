@extends('backend.layouts.master')

@section('page-header')
    <h1>
       Events
        <small></small>
    </h1>
@stop
@section('content')
	<div class="box box-success">
		<div class="box-header with-border">
			  <h3 class="box-title">Events</h3>
			  <div class="box-tools pull-right">
                <a href="events/add" class="btn btn-primary pull-right btn-sm">Add Other Event</a>
            </div>
		</div>
		<div class="box-body">
			 <table class="table" id="dataTables-events">
				<thead>
					<tr>
						 <th>ID</th>
						 <th>Title</th>
						 <th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach($data as $row){
							$id = $row->id;
							echo "<tr>
										<td>".$id."</td>
										<td>".$row->name."</td>
										<td>
											<a href='events/EditProject/".$id."' > <button data-placement='top' data-toggle='tooltip' data-original-title='Update'  class='btn btn-primary btn-xs'>Update</button></a> /
											<a href='events/deleteEvent/".$id."' > <button onclick='return confirm(\"Are you want to delete?\")' data-placement='top' data-toggle='tooltip' data-original-title='Delete'  class='btn btn-danger btn-xs'>Delete</button></a> /
											<a href='attendance/eventsAttendance/".$id."' > <button data-placement='top' data-toggle='tooltip' data-original-title='Attendance'  class='btn btn-success btn-xs'>Attendance</button></a> 
										</td>
									</tr>";
						}
					?>
				</tbody>
			</table>
	  </div><!-- /.box-body -->
	</div><!--box box-success-->
@stop
@section('after-scripts-end')

	<link href="{{ asset('tables/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('tables/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
	<script src="{{ asset('tables/datatables/media/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('tables/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
	<script>
		 $(document).ready(function() {
			  $('#dataTables-events').DataTable({
						 responsive: true
			  });
		 });
	</script>
@stop