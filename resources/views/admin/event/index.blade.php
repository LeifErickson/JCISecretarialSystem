@extends('backend.layouts.master')

@section('page-header')
    <h1>
       Events
        <small></small>
    </h1>
@endsection
@section('content')
	<div class="col-md-8">
		<div class="box">
        <div class="box-body">
             <table class="table">
					<thead>
						<tr>
							 <th>ID</th>
							 <th>Title</th>
							 <th>Date Created</th>
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
											<td>".$row->year."</td>
											<td>
												<a  class='btn btn-xs btn-primary'  href='event/EditProject/".$id."'><i class='fa fa-pencil' title='' data-placement='top' data-toggle='tooltip' data-original-title='Delete'></i></a>
												<a  class='btn btn-xs btn-danger'  href='event/deleteEvent/".$id."'><i class='fa fa-trash' title='' data-placement='top' data-toggle='tooltip' data-original-title='Delete'></i></a>
											</td>
										<tr>";
							}
						?>
					</tbody>
				</table>
        </div><!-- /.box-body -->
		  <div class="box-footer clearfix">
				<ul class="pagination pagination-sm no-margin pull-right">
					<?php echo $data->render(); ?>
				</ul>
				<div class="row">
					<div class="col-sm-5">
						<div id="example2_info" class="dataTables_info" role="status" aria-live="polite">Total Event(s): <?php echo $data->count(); ?> row(s)</div>
					</div>
				</div>
			</div>
		</div><!--box box-success-->
	</div>
	
@endsection