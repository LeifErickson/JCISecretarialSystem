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
			<div class="box-header with-border">
            Event table      
			</div><!-- /.box-header -->
        <div class="box-body">
             <table class="table">
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
						?>
					</tbody>
				</table>
        </div><!-- /.box-body -->
		  <div class="box-footer clearfix">
				<ul class="pagination pagination-sm no-margin pull-right">
					<?php echo $data->render(); ?>
				</ul>
			</div>
		</div><!--box box-success-->
	</div>
@endsection