<div class="col-lg-12" style="margin-top:45px;">
</div>
<div style="margin-right:auto;margin-left:auto;">
		<div id="myCarousel" class="carousel">
			<ol class="carousel-indicators">
				<li data-target="myCarousel" data-slide-to = "0" class="active" ></li>
				<li data-target="myCarousel" data-slide-to = "1" ></li>
				<li data-target="myCarousel" data-slide-to = "2" ></li>
			</ol>
			<div class="carousel-inner" style="max-height:400px;margin-left:auto;margin-right:auto;">
				<?php
					
					$URL = fopen(asset('/FrontEndImages/header/url.txt'), "r") or die("Unable to open file!");
					//$text =  fread($URL,filesize("url.txt"));
					$text = array();
					$count = 0;
					while(!feof($URL)) {
					 $text[$count] = fgets($URL);
					 if($count == 0){
					  echo "
						<div class='item active'>
							<img  width='1500px' src='".$text[$count]."' class='img-responsive'>
						</div>
					  ";
					  } else {
						 echo "
						<div class='item'>
							<img  width='1500px' src='".$text[$count]."' class='img-responsive'>
						</div>
					  ";
					  
					  }
					  $count++;
					}
					//dd($text);
					fclose($URL);
				?>
				<!--
				<div class="item active" >
					<img width="1500px"   src="http://www.abc.net.au/radionational/image/6802366-3x2-700x467.jpg" class="img-responsive">
				</div>
				<div class="item">
					<img width="1500px"   src="http://i.lv3.hbo.com/custom-assets/enrichments/series/wotn/images/bonusshorts/header-poverty-and-obesity-when-healthy-food-isnt-an-option.jpg" class="img-responsive">
				</div>
				<div class="item">
					<img width="1500px" src="http://www.jciiligan.org/wp-content/uploads/2013/07/6.jpg" class="img-responsive">
				</div>
				
					
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