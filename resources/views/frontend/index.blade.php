@extends('frontend.layouts.master')
@include('frontend.includes.header')
@section('content')
<div class="container" style="margin-top:-50px;">
   <div class="row">
			<div class="col-lg-12">
						<div class="col-md-8 ">
							<div class="col-md-12">
										<?php foreach($data as $events){?>
											<div class="col-md-12" style="background-color:rgb(43, 169, 230);margin-bottom: 15px;border-radius: 5px;">
												<div class="page-header"  style="margin-left:10px">
													<h2><a style="color:white;" href="#"><?php echo $events->name?></a></h2>
													<h5><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo date("M j, Y", strtotime($events->created_at));?></h5>
												
												</div>
												<div class="page-body">
													<?php 
													$string = $events->description;
													echo substr($string, 0, -1); ?>
												</div>
												<div class="page-footer">
												
												</div>
												
											</div>
											
										<?php }?>
							</div>
						</div><!-- panel -->
						<div class="col-md-4">
							<div class="panel panel-default">
								 <div class="panel-heading">
									<div class="page-header">  <h3><i class="glyphicon glyphicon-calendar">
										</i> Upcoming Events</h3>
									</div>
									  <ul>
											<li><a href="#" >Event 1</a></li>
											<li><a href="#" >Event 2</a></li>
											<li><a href="#" >Event 3</a></li>
									  </ul>
								 </div>
							</div><!-- panel -->
						</div>
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