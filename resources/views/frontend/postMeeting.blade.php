@extends('frontend.layouts.master')
@section('content')
   <div class="row">
			<div class="col-md-8 col-md-offset-2">
					<?php foreach($data as $row){?>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h2><?php echo $row->agenda; ?></h2>
								<h5><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo date("M j, Y", strtotime($row->created_at)); ?></h5>
							</div>

							<div class="panel-body">
								<?php 
								$string = $row->description;
								echo $string;
								 ?>
							</div>
							<div class="panel-footer">
								<a href="{{ URL::previous() }}" ><button >Back</button></a>
							</div>
						</div>
					<?php }?>
        </div><!-- col-md-10 -->
       

   </div><!--row-->
@stop

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
    </script>
@stop