@extends('backend.layouts.master')

@section('page-header')
    <h1>
       Events
        <small></small>
    </h1>
@stop

@section('content')
	@if(session()->has('data'))
		 <div class="alert alert-success alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  {{ session('data') }}
		 </div>
	@endif
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
										<td><a href='events/viewEvent/".$id."' >".$row->name."</td>
										<td>
											<a href='events/editEvent/".$id."' > <button data-placement='top' data-toggle='tooltip' data-original-title='Update'  class='btn btn-primary btn-xs'>Update</button></a> /
											<a href='events/deleteEvent/".$id."' > <button id='delete'  data-event-id='".$id."' data-placement='top' data-toggle='tooltip' data-original-title='Delete'  class='btn btn-danger btn-xs'>Delete</button></a> /
											<a href='attendance/eventsAttendance/".$id."' > <button data-placement='top' data-toggle='tooltip' data-original-title='Attendance'  class='btn btn-success btn-xs'>Attendance</button></a> /
											<a href='../post/event/".$id."' > <button data-placement='top' data-toggle='tooltip' data-original-title='Attendance'  class='btn btn-primary btn-xs'>Preview</button></a> 
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
	<script type="text/javascript">
      $('#delete').on('click', function(e){
      {
       event.preventDefault();
       var self = $(this)
       swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this data!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel it!",   
        closeOnConfirm: false,  
        closeOnCancel: false
         }, 
         function(isConfirm)
         {   
            if (isConfirm)
             {     
                swal("Deleted!", "The data will be deleted in a moment.", "success"); 
					 var id = self.attr("data-event-id");
					 location.href = 'events/deleteEvent/'+id;
            }
             else 
            {     
                swal("Cancelled", "The data is safe :)", "error");   
                return false;
            } 
        });

      }
    });
    </script>
	
	<script>
		 $(document).ready(function() {
			  $('#dataTables-events').DataTable({
						 responsive: true
			  });
		 });
	</script>
@stop