@extends('backend.layouts.master')

@section('page-header')
    <h1>
       Attendance Monitoring
    </h1>
@endsection
@section('content')
	<div class="col-md-12">
		<div class="box">
			<div class="box-header with-border">
				<form >
				<h3 class="box-title" >Event Name: <?php 
						foreach($title as $row){
							echo $row->name; 
						}
				?> 
				</h3>
			</div>
			<div class="box-body">
             <table class="table" id="dataTables-events">
					<thead>
						 <th>ID</th>
						 <th>Name</th>
						 <th>
							<form action="test.php">
							<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							  Events Name <span class="caret"></span>
							</button>
							
							<ul class="dropdown-menu" role="menu">
								<?php
									foreach($events as $row){
											echo "<li><a href='./".$row->id."' >".$row->name."</a></li>";
									}
								?>
							</ul>
							</form>
						 </th>
					</thead>
					<tbody id="events_table">
						<?php
							
							foreach($attendance as $row){
								$check = "";
								if($row->Present == 1)
									$check = "<td class='bg-green'>Present</td>";
								else
									$check = "<td  class='bg-red' >Absent</td>";
								echo "<tr>
												<td>".$row->id ."</td>
												<td>".$row->firstname ." ".$row->lastname ."</td>
												".$check."
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