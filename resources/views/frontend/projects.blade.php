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
