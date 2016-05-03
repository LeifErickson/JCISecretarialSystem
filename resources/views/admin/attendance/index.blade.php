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
							$eventType = $type[0];
							
							
							
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
				foreach($info as $row){ 
					$event_id = $row->id;
					
				?>
				
			<div class="box-body">
				<label>Name : </label><?php echo " ".$row->name; ?></br>
				<label >Date Created : </label><?php echo  " ".$row->year; ?></br>
				<label >Description: </label><?php echo  " ".$row->description; ?></br>
				<label >Sponsored by: </label>
			<?php } 
				$name = "";
				foreach($sponsors as $row){ 
					$name = $row->firstname." ".$row->lastname;
					echo $name."</br>";
				}
				?>
			</div>
			<div class="box-footer">
				<button title='Add Attendance' data-toggle='modal' data-target='#add' class="btn btn-block btn-info">Add </button>
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
				<h4 class="modal-title">Add Member  <small></small></h4>
			</div>
			<div class="modal-body">
				<input autocomplete="off"  data-toggle="dropdown" type="text" size="30" placeholder="Enter Name..." class="form-control" onkeyup="showResult(this.value,<?php echo $id;?>,'<?php echo $eventType; ?>')">
				<div id="livesearch" >
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('after-scripts-end')
	
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
		function showResult(str,p_id,type) {
			
			 if (str.length==0) { 
				 document.getElementById("livesearch").innerHTML="";
				 document.getElementById("livesearch").style.border="0px";
				 return;
			  } 
			  if (window.XMLHttpRequest) {
				 // code for IE7+, Firefox, Chrome, Opera, Safari
				 xmlhttp=new XMLHttpRequest();
			  } else {  // code for IE6, IE5
				 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  
			  xmlhttp.onreadystatechange=function() {
				 if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById("livesearch").innerHTML= xmlhttp.responseText;
				 }
			  }
			  
			  xmlhttp.open("GET","../searchPage/"+p_id+"/"+str+"/"+type+"",true);
			  xmlhttp.send();
			  
			}
	 </script>
@endsection