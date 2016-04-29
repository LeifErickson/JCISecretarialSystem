@extends('backend.layouts.master')

@section('page-header')
    <h1>
       Events
        <small></small>
    </h1>
@endsection
@section('content')
	<div class="col-md-12">
		<div class="box">
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
											<td><a href='attendance/".$id."'>".$row->name."</a></td>
											<td>
												<a  class='btn btn-xs btn-primary'  href='event/EditProject/".$id."'><i class='fa fa-pencil' title='' data-placement='top' data-toggle='tooltip' data-original-title='Update'></i></a>
												<a  class='btn btn-xs btn-danger'  href='event/deleteEvent/".$id."'><i class='fa fa-trash' title='' data-placement='top' data-toggle='tooltip' data-original-title='Delete'></i></a>
											</td>
										</tr>";
							}
						?>
					</tbody>
				</table>
        </div><!-- /.box-body -->
		</div><!--box box-success-->
	</div>
	
@endsection
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
@endsection