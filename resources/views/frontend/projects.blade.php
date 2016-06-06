<div class="col-md-8" >
	<div class="box">
		<div class="center">
			<div class="col-md-12" >
				<div class="col-md-12" style="margin-bottom: 15px;border-radius: 5px;">
					
					<div class="line-bottom">  
						<h3> 
							Projects
							<div style="float:right;">
								<a style="color:black;"><i style="cursor:pointer;background:#ddd;" class="glyphicon glyphicon-chevron-left"  href="#project" data-slide="prev" ></i></a>
								<a style="color:black;"><i style="cursor:pointer;background:#ddd;" class="glyphicon glyphicon-chevron-right"  href="#project"  data-slide="next"></i></a>
							</div>
						</h3>
					</div>
					<div class="page-body" >
						<div id="project" class="carousel myautoscroll" style="max-height: 500px;background: white;">
							<div class="carousel-inner" style="margin-left:auto;margin-right:auto;">
								<?php 
								$first = 0;
								foreach($projects as $projects){
									if($first == 0){
										echo "<div class='item active' >
													<div style='padding:15px;background:#FAFAFA;'>
														<a  href='post/project/".$projects->id."' ><h4 style='color:#fe9322;text-transform:uppercase;font-weight:bold;'>".$projects->name."
														<small style='float: right;text-transform: capitalize;'><i class='glyphicon glyphicon-time'></i> Date Posted: ".date('M d, Y', strtotime($projects->created_at))."</small>
														
														
														</h4></a>
														
														<hr>
														".$projects->description."
														
														<hr>
														<i class='glyphicon glyphicon-user'> Volunteers: </i> ".$projects->numberofvolunteers."
													</div>
												</div>";
											$first = 1;
									}	else {
										echo "<div class='item' >
													<div style='background:#FAFAFA;padding-bottom:10px;'>
														<a  href='post/project/".$projects->id."' ><h4 style='color:#fe9322;text-transform:uppercase;font-weight:bold;'>".$projects->name."
														<small style='float: right;text-transform: capitalize;'><i class='glyphicon glyphicon-time'></i> Date Posted: ".date('M d, Y', strtotime($projects->created_at))."</small>
														</h4></a>
														
														<hr>
														".$projects->description."
														
														<hr>
														<i class='glyphicon glyphicon-user'> Volunteers: </i> ".$projects->numberofvolunteers."
													</div>
												</div>";
									}
								}?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
