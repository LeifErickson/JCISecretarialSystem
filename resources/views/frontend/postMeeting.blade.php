@extends('frontend.layouts.master')
@section('content')
<div class="container">
   <div class="row">
		<?php foreach($data as $row){?>
			<div class="col-lg-12">
				<div class="col-lg-9">
					<div class="col-lg-12">
						<div class="panel panel-info">
							<div class="panel-heading">
								<h2><?php echo $row->title; ?></h2>
								<h5><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo date("M j, Y", strtotime($row->created_at)); ?></h5>
								<a href="{{ URL::previous() }}" ><< BACK </a>
								
							</div>
							<div class="panel-body">
								<h4 style="font-weight: bolder;">Agenda :</h4>
								<p>
									<?php 
									echo $row->agenda;
									 ?>
								</p>
								 </hr>
								 <h4 style="font-weight: bolder;">Location :</h4>
								<p>
									<?php 
									echo $row->location;
									 ?>
								</p>
								 </hr>
								 <h4 style="font-weight: bolder;">Description :</h4>
								<p>
									<?php 
									echo $row->description;
									 ?>
								</p>
								 </hr>
								 
								 
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-3">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>Information:</h4>
						</div>
						<div class="panel-body">
								<h4 class="page-header" >Lead By:</h4>
								<?php 
								echo "- ".$row->leadby;
								 ?>
								 <h4 class="page-header" >Date Set:</h4>
								<?php 
								echo date("M j, Y", strtotime($row->dateset));
								 ?>
						</div>
					</div>
				</div>
			</div>
       </div><!-- col-md-10 -->
		<?php }?>
   </div><!--row-->
</div><!--container-->
@stop

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
    </script>
@stop