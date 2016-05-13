<div style="margin-right:auto;margin-left:auto;margin-top: 50px;">
		<div id="myCarousel" class="carousel" style="background-color:black">
			<ol class="carousel-indicators">
				<li data-target="myCarousel" data-slide-to = "0" class="active" ></li>
				<li data-target="myCarousel" data-slide-to = "1" ></li>
				<li data-target="myCarousel" data-slide-to = "2" ></li>
			</ol>
			<div class="carousel-inner" style="max-height:400px;margin-left:auto;margin-right:auto;">
				<div class="item active">
					<img  src="{{asset('images/1.png')}}" class="img-responsive">
				</div>
				<div class="item">
					<img  src="{{asset('images/2.jpg')}}" class="img-responsive">
				</div>
				<div class="item">
					<img  src="{{asset('images/3.png')}}" class="img-responsive">
				</div>
				
					<!--
					<div class="carousel-caption">
						<h1>JCI IS THE BEST</h1>
					</div>-->
			</div>
			<a class="carousel-control left" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="carousel-control right" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>
</div>
<hr>