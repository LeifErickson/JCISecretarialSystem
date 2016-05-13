@extends('frontend.layouts.master')
@section('content')
<div class="container">
   <div class="row">
		<div class="col-lg-12">
			<div class="col-lg-9">
				<div class="col-lg-12">
					<?php foreach($data as $row){?>
						<div class="panel panel-info">
							<div class="panel-heading">
								<h2><?php echo $row->name; ?></h2>
								<h5><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo date("M j, Y", strtotime($row->created_at)); ?></h5>
								<a href="{{ URL::previous() }}" ><< BACK </a>
								<?php $organizer = $row->description; ?>
							</div>

							<div class="panel-body panel-info">
								<?php 
								$string = $row->description;
								echo $string;
								 ?>
							</div>
						</div>
					<?php }?>
				</div>
			 </div>
			 <div class="col-lg-3">
				<div class="col-lg-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>Organized By:</h4>
						</div>
						<div class="panel-body">
								<?php 
								echo $organizer;
								 ?>
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>Sponsored By:</h4>
						</div>
						<div class="panel-body">
							<ul>
							<?php foreach($sponsor as $p){?>
								
								<?php 
								echo "<li>".$p->name."</li>";
								 ?>
							<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
   </div><!--row-->
</div>
@stop

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
    </script>
@stop