@extends('backend.layouts.master')

@section('page-header')
    <h1>
       Attendance	
        <small></small>
    </h1>
@endsection
@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="box">
        <div class="box-body">
             <table class="table" id="dataTables-members" >
					<thead>
						<tr>
							 <th>Name</th>
							 <th>Date Attended</th>
							 <th>Status</th>
							 <th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$id = $data_id;
							foreach($data as $row){
								
								echo "<tr>
											<td>".$row->lastname.",".$row->firstname." ".$row->middlename."</td>
											<td>".$row->year."</td>
											<td>".$row->status."</td>
											<td>
												<a  class='btn btn-xs btn-danger'  href='deleteattendance/".$row->member_id."'><i class='fa fa-trash' title='' data-placement='top' data-toggle='tooltip' data-original-title='Delete'></i></a>
											</td>
										</tr>";
							}
						?>
					</tbody>
				</table>
        </div><!-- /.box-body -->
		</div><!--box box-success-->
	</div>
	<div class="col-md-4">
		<div class="box">
			<div class="box-header with-border">	
				<h3 class="box-title">Information</h3>
			</div>
			<?php 	
				$project_id =  0;
				foreach($info as $row){ 
					$project_id = $row->id;
				?>
				
			<div class="box-body">
				<label>Name : </label><?php echo " ".$row->name; ?></br>
				<label >Date Created : </label><?php echo  " ".$row->year; ?></br>
				<label >Description: </label><?php echo  " ".$row->description; ?></br>
			</div>
			<?php } ?>
			<div class="box-footer">
				<button title='Update Training' data-toggle='modal' data-target='#add' class="btn btn-block btn-info">Add </button>
			</div>
		</div>
	</div>
</div>
<!-- MODAL -->
<div id="add" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="addModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Update Training  <small></small></h4>
			</div>
			<div class="modal-body">
				<table class="table" id="dataTables-search">
						<thead>
							<th>Name</th>
							<th>Action</th>
						</thead>
						<tbody>
							
							<?php
								foreach($mems as $row){
								echo "<tr>
											<td>".$row->lastname.",".$row->firstname." ".$row->middlename."</td>
											<td><a href='addattendance/$project_id/".$row->id."' class='btn btn-default' >Add</a></td>
										</tr>";
							}
							?>
						</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('after-scripts-end')
	script src="tables/jquery/dist/jquery.min.js"></script>
	<link href="{{ asset('tables/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}" rel="stylesheet">
	<link href="{{ asset('tables/datatables-responsive/css/dataTables.responsive.css') }}" rel="stylesheet">
	<script src="{{ asset('tables/datatables/media/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('tables/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') }}"></script>
	<script>
		 $(document).ready(function() {
			  $('#dataTables-members').DataTable({
						 responsive: true
			  });
		 });
		$(document).ready(function() {
			  $('#dataTables-search').DataTable({
						 responsive: true
			  });
		 });
	 </script>
@endsection