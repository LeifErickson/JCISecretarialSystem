@extends('frontend.layouts.master')
@include('frontend.includes.header')
@section('content')
<div class="container" style="margin-top:-50px;">
   <div class="row">
			<div class="col-lg-12">
						<div class="col-md-8 ">
							<div class="col-md-12">
										<?php foreach($data as $events){?>
											<div class="col-md-12" style="margin-bottom: 15px;border-radius: 5px;">
												<div class="page-header"  style="margin-left:10px">
													<h2><a style="color:black;" href="post/event/<?php echo $events->id; ?>" ><?php echo $events->name; ?></a></h2>
													<h5><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo date("M j, Y", strtotime($events->created_at)); ?></h5>
												
												</div>
												<div class="page-body">
													<?php 
														$string = $events->description;
														echo $string;
													?>
												</div>
												<div class="page-footer">
												
												</div>
												
											</div>
											
										<?php }?>
										<?php foreach($projects as $events){?>
											<div class="col-md-12" style="margin-bottom: 15px;border-radius: 5px;">
												<div class="page-header"  style="margin-left:10px">
													<h2><a style="color:black;" href="post/event/<?php echo $events->id; ?>" ><?php echo $events->name; ?></a></h2>
													<h5><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo date("M j, Y", strtotime($events->created_at)); ?></h5>
												
												</div>
												<div class="page-body">
													<?php 
														$string = $events->description;
														echo $string;
													?>
												</div>
												<div class="page-footer">
												
												</div>
												
											</div>
											
										<?php }?>
										<?php foreach($upcoming_Meeting as $events){?>
											<div class="col-md-12" style="margin-bottom: 15px;border-radius: 5px;">
												<div class="page-header"  style="margin-left:10px">
													<h2><a style="color:black;" href="post/event/<?php echo $events->id; ?>" ><?php echo $events->title; ?></a></h2>
													<h5><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo date("M j, Y", strtotime($events->created_at)); ?></h5>
												
												</div>
												<div class="page-body">
													<?php 
														$string = $events->description;
														echo $string;
													?>
												</div>
												<div class="page-footer">
												
												</div>
												
											</div>
											
										<?php }?>
							</div>
						</div><!-- panel -->
						@include('frontend.includes.sidebar')
        </div><!-- col-md-10 -->
       

   </div><!--row-->
</div>
@stop

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
    </script>
@stop