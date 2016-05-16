<div class="col-md-4">
	<div class="col-md-12">
		<div class="col-md-12" style="margin-bottom: 15px;border-radius: 5px;">
			<div class="page-header">  
				<h3><i class="glyphicon glyphicon-calendar"></i> Upcoming Events</h3>
				<h4><span class="glyphicon glyphicon-time"></span> Date & Time:  <small id="date"></small></h4>
			</div>
			<div class="page-body">
					 <ul>	
					<?php foreach($upcoming_Events as $events){?>
							<li><a  href="post/event/<?php echo $events->id; ?>" ><?php echo $events->name; ?></a></li>				
					<?php }?>
					<?php foreach($upcoming_Meeting as $meeting){?>
							<li><a  href="post/meeting/<?php echo $meeting->id; ?>" ><?php echo $meeting->agenda; ?></a></li>				
					<?php }?>
				  </ul>
			</div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="col-md-12" style="margin-bottom: 15px;border-radius: 5px;">
			<div class="page-header">  
				<h3><i class="glyphicon glyphicon-star"></i> Projects</h3>
			</div>
			<div class="page-body">
					 <ul>	
					<?php foreach($projects as $projects){?>
							<li><a  href="post/project/<?php echo $projects->id; ?>" ><?php echo $projects->name; ?></a></li>				
					<?php }?>
				  </ul>
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