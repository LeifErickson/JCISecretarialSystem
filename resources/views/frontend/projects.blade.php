<div class="col-md-8" >
	<div class="box">
		<div class="center">
			<div class="col-md-12" >
				<div class="col-md-12" style="margin-bottom: 15px;border-radius: 5px;">
					<div class="page-header">  
						<h3 ><i class="glyphicon glyphicon-calendar"></i> Projects
						<!-- <h4><span class="glyphicon glyphicon-time"></span> Date & Time:  <small id="date"></small></h4>-->
						
								<small style="float:right;">
								<a  style="background: transparent;color:black;" href="#project" data-slide="prev">
									<i style="opacity:1;" class="glyphicon glyphicon-triangle-left"></i>
								</a>
								<a  style="background: transparent;color:black;" href="#project" data-slide="next">
									<i style="opacity:1;" class="glyphicon glyphicon-triangle-right"></i>
								</a>
								</small>
						</h3>
					</div>
					<div class="page-body" >
							<div id="project" class="carousel myautoscroll" style="background: white;">
								
								<div class="carousel-inner" style="max-height:400px;margin-left:auto;margin-right:auto;">
									<?php 
									$first = 0;
									foreach($projects as $projects){
										if($first == 0){
											echo "<div class='item active'>
													<a  href='post/project/".$projects->id."' ><h4 style='color:#fe9322;text-transform:uppercase;font-weight:bold;'>".$projects->name."</h4></a>
													".$projects->description."
													
													<ul style='list-style-type: none;padding:0; margin:0;'>
													<li>
														<i class='glyphicon glyphicon-user'></i> ".$projects->numberofvolunteers."
													</li>
												</ul>
												</div>";
										}	else {
											echo "<div class='item'>
												<a  href='post/project/<?php echo $projects->id; ?>' >".$projects->name."</a>
												</div>";
										
										}
									}?>
									
									<div class="item">
										<img width="1500px"   src="http://i.lv3.hbo.com/custom-assets/enrichments/series/wotn/images/bonusshorts/header-poverty-and-obesity-when-healthy-food-isnt-an-option.jpg" class="img-responsive">
										<p>
											Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
										</p>
									</div>
									<div class="item">
										<img width="1500px" src="http://www.jciiligan.org/wp-content/uploads/2013/07/6.jpg" class="img-responsive">
										
										<p>
											Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
										</p>
									</div>
								</div>
							
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@section('after-scripts-end')
<script>
	var myVar = setInterval(timeToday ,1000);
	function timeToday() {
		var d = new Date();
		var hour = d.getHours() % 12;
		var mins = d.getMinutes();
		var sec = d.getSeconds();
		var period = "";
		if(d.getHours() >= 12) period = "PM"; else period = "AM"
			
		var time = hour +" : "+ mins + " : "+sec+" "+period;
		 document.getElementById("date").innerHTML = d.toDateString()+" "+time;
	}
</script>
@stop