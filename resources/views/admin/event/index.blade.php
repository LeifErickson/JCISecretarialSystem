@extends('backend.layouts.master')

@section('page-header')
    <h1>
       Event Management
        <small></small>
    </h1>
@endsection
@section('content')
	<div class="col-md-8">
	  <div class="box">
        <div class="box-header with-border">
            
            
        </div><!-- /.box-header -->
        <div class="box-body">
             <table class="table table-bordered table-hover">
					<thead>
						<tr>
							 <th>ID</th>
							 <th>Title</th>
							 <th>Date Created</th>
						</tr>
					</thead>
					<tbody>
						<?php
							foreach($data as $row){
								$id = $row->id;
								echo "<tr>
											<td>".$id."</td>
											<td>".$row->name."</td>
											<td>".$row->year."</td>
											<td><a href='event/EditProject/".$id."'>Edit</a></td>
											<td><a href='event/deleteEvent/".$id."'>Delete</a></td>
										<tr>";
							}
							echo $data->render();
						?>
					</tbody>
				</table>
        </div><!-- /.box-body -->
		</div><!--box box-success-->
	</div>
@endsection


@section('after-scripts-end')
		 <script src="{{ URL::asset('tables/jquery/dist/jquery.min.js') }}"></script>
		 <script src="{{ URL::asset('tables/datatables/media/js/jquery.dataTables.min.js') }}"></script>
		 <script src="{{ URL::asset('tables/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
		 
		<script>
		 $(document).ready(function() {
			  $('#dataTables-example').DataTable({
						 responsive: true
			  });
		 });
		</script>
@stop