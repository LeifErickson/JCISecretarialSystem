@extends('frontend.layouts.master')
@include('frontend.includes.header')
@section('content')
<div class="container" style="margin-top:-50px;">
   <div class="row">
			<div class="col-lg-12">
				<div class="box">
					<div class="center">
						<div class="page-header"  style="margin-left:10px">
							<h2>Active Members</h2>
						</div>
						<div class="box-body" style="margin-top: -40px;margin-bottom: 20px;">
							<table class="table table-hover table-responsive " id="dataTables-members" >
								<thead style="margin-top: -55px;">
									<th>Name</th>
									<th>Membership Type</th>
									<th>Member Since</th>
								</thead>
							  <tbody>
									<?php foreach($activeMember as $active){?>
										<tr>
											<td><?php echo $active->firstname." ".$active->lastname[0]." ".$active->lastname; ?></td>
											<td><?php echo $active->membershiptype; ?></td>
											<td><?php echo date("d M Y ",strtotime($active->membersince)); ?></td>
										</tr>	
									<?php }?>	
								</tbody>
							</table>
						</div><!-- panel -->
					</div>
				</div>
        </div><!-- col-md-10 -->
   </div><!--row-->
</div>
@stop

@section('after-scripts-end')
	<link href="{!! asset('/build/css/bootstrap.css') !!}" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.11.2.js"></script>
	
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
	</script>
@stop