<div class="col-md-8" >
	<div class="box">
		<div class="center">
			<div class="col-md-12" >
				<div class="col-md-12" style="margin-bottom: 15px;border-radius: 5px;">
					<div class="page-header">  
						<h3 > Projects
						<!-- <h4><span class="glyphicon glyphicon-time"></span> Date & Time:  <small id="date"></small></h4>-->
						
								<small style="float:right;">
								<a  style="background: transparent;color:black;" href="#project" data-slide="prev">
									<button><i style="opacity:1;" class="glyphicon glyphicon-triangle-left"></i></button>
								</a>
								<a  style="background: transparent;color:black;" href="#project" data-slide="next">
									<button ><i style="opacity:1;" type="button" class="glyphicon glyphicon-triangle-right"></i></button>
								</a>
								</small>
						</h3>
					</div>
					<div class="page-body" >
						<div id="project" class="carousel myautoscroll" style="max-height: 500px;background: white;">
							<div class="carousel-inner" style="margin-left:auto;margin-right:auto;">
								<?php 
								$first = 0;
								foreach($projects as $projects){
									if($first == 0){
										echo "<div class='item active'>
												<a  href='post/project/".$projects->id."' ><h4 style='color:#fe9322;text-transform:uppercase;font-weight:bold;'>".$projects->name."</h4></a>
												<div class='col-md-12'>".$projects->description."</div>
												
												<ul style='list-style-type: none;padding:0; margin:0;'>
													<li>
														<i class='glyphicon glyphicon-user'> Volunteers: </i> ".$projects->numberofvolunteers."
													</li>
												</ul>
											</div>";
											$first = 1;
									}	else {
										echo "<div class='item'>
												<a  href='post/project/".$projects->id."' ><h4 style='color:#fe9322;text-transform:uppercase;font-weight:bold;'>".$projects->name."</h4></a>
												<div class='col-md-12'>".$projects->description."</div>
												
												<ul style='list-style-type: none;padding:0; margin:0;'>
													<li>
														<i class='glyphicon glyphicon-user'> Volunteers: </i> ".$projects->numberofvolunteers."
													</li>
												</ul>
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
