<div class="col-md-4" >
	<div class="box">
		<div class="center">
			<div class="col-md-12" >
				<div class="col-md-12" style="margin-bottom: 15px;border-radius: 5px;">
					<div class="page-header">  
						<h3 ><i class="glyphicon glyphicon-calendar"></i> Events And Meetings</h3>
						<!-- <h4><span class="glyphicon glyphicon-time"></span> Date & Time:  <small id="date"></small></h4>-->
					</div>
					<div class="page-body myautoscroll" >
							<?php foreach($upcoming_Meeting as $meeting){?>
									<a  href="post/meeting/<?php echo $meeting->id; ?>" >
									<div class="alert alert-sidebar">
										<div class="row" style="margin-top:0px">
											<div class="col-xs-3">
												<div class="col-xs-12" style="color:#fe9322;font-size: 35px;padding-bottom:10px;padding-top: 5px;"><?php echo date("d",strtotime($meeting->dateset)); ?></div>
												<div class="col-xs-12" style="font-size: 20px;font-weight:normal;"><?php echo date("M",strtotime($meeting->dateset)); ?></div>
												</ul>
											</div>
											<div class="col-xs-9">
												<h5 style="text-transform:uppercase;font-weight: bold;margin-top:0px"><?php echo $meeting->title; ?></h5>
												<ul style="list-style-type: none;padding:0; margin:0;">
													<li>
														<i class="fa fa-clock-o"><?php echo " ".$meeting->started; ?></i>
													</li>
													<li>
														<i class="fa fa-map-marker"><?php echo " ".$meeting->location; ?></i>
													</li>
												</ul>
											</div>
										</div>
									</div>
									</a>
							<?php }?>
							<?php foreach($upcoming_Events as $events){?>
									<a  href="post/event/<?php echo $events->id; ?>" >
									<div class="alert alert-sidebar">
										<div class="row" style="margin-top:0px">
											<div class="col-xs-3">
												<div class="col-xs-12" style="color:#fe9322;font-size: 35px;padding-bottom:10px;padding-top: 5px;"><?php echo date("d",strtotime($events->year)); ?></div>
												<div class="col-xs-12" style="font-size: 20px;font-weight:normal;"><?php echo date("M",strtotime($events->year)); ?></div>
												</ul>
											</div>
											<div class="col-xs-9">
												<h5 style="text-transform:uppercase;font-weight: bold;margin-top:0px"><?php echo $events->name; ?></h5>
												<ul style="list-style-type: none;padding:0; margin:0;">
													<li>
														<i class="fa fa-clock-o"><?php echo " ".$events->time; ?></i>
													</li>
													<li>
														<i class="fa fa-map-marker"><?php echo " ".$events->location; ?></i>
													</li>
												</ul>
											</div>
										</div>
									</div>
									</a>
							<?php }?>
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