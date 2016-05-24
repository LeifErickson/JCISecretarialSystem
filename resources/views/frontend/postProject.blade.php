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
								<h3><?php echo $row->name; ?></h3>
								<h5><span class="glyphicon glyphicon-time"></span> Posted on: <?php echo date("M j, Y", strtotime($row->created_at)); ?></h5>
								<a href="{{ URL::previous() }}" ><< BACK </a>
							</div>

							<div class="panel-body panel-info">
								<div class="col-md-12">
								<h4 style="font-weight: bolder;">Objectives :</h4>
								<p>
									<?php 
									echo $row->objectives;
									 ?>
								</p>
								<h4 style="font-weight: bolder;" >Description :</h4>
								<p>
									<?php 
									echo $row->description;
									 ?>
								</p>
								<h4 style="font-weight: bolder;" >Recommendation :</h4>
								<p>
									<?php 
									echo $row->recommendation;
									 ?>
								</p>
								<hr>
								</div>
								<div class="col-md-12">
								<h4 style="font-weight: bolder;" >Project Money Involve :</h4>
									<p class="col-md-6">
										<?php 
										echo "Total Annual Income: ".$row->totalincomeannual;
										 ?>
									</p>
									<p class="col-md-6" >
										<?php 
										echo "Actual Expenditures: ".$row->expendituresactual;
										 ?>
									</p>
									<p  class="col-md-6" >
										<?php 
										echo "Total Income Projected: ".$row->totalincomeprojected;
										 ?>
									</p>
									<p class="col-md-6">
										<?php 
										echo "Expenditures Projected: ".$row->expendituresprojected;
										 ?>
									</p>
								</div>
								<div class="col-md-12">
									<hr>
									<h4 style="font-weight: bolder;" >Approved By :</h4>
									<p>
										<?php 
										echo "President: ".$row->approvedbychapterpresident;
										echo "\t Chairman: ".$row->approvedbychairman;
										 ?>
									</p>
								</div>
							</div>
						</div>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="col-lg-12">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>Information:</h4>
						</div>
						<div class="panel-body">
								<h4 class="page-header" >Chapter:</h4>
								<?php 
								echo "- ".$row->chapter;
								 ?>
								 <h4 class="page-header" >Mailing Address:</h4>
								<?php 
								echo "- ".$row->mailingaddress;
								 ?>
								 <h4 class="page-header" >National Organization:</h4>
								<?php 
								echo "- ".$row->nationalorganization;
								 ?>
								 <h4 class="page-header" >Number of Volunters:</h4>
								<?php 
								echo $row->numberofvolunteers;
								 ?>
								 <h4 class="page-header" >Dates:</h4>
								<?php 
								echo "Date Begin: ".date("M j, Y", strtotime($row->datebegun));
								echo "</br>Date Completed: ".date("M j, Y", strtotime($row->datecompleted));
								 ?>
						</div>
					</div>
				</div>
			</div>
			<?php }?>
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