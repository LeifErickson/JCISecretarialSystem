<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#frontend-navbar-collapse">
                <span class="sr-only">{{ trans('labels.general.toggle_navigation') }}</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a style="font-weight:bold;font-family: initial;"class="navbar-brand" href="{!! route('frontend.index') !!}">
               {!! app_name() !!}  
            </a>
        </div><!--navbar-header-->

        <div class="collapse navbar-collapse" id="frontend-navbar-collapse">
				<ul class="nav navbar-nav">
                <li class="{{ Active::pattern('/') }}"><a style="font-weight:normal;" href="{!! url('/') !!}">Home</a></li>
					 
					 <li class="{{ Active::pattern('activeMembers') }}" ><a style="font-weight:normal;" href="{!! url('activeMembers') !!}">Active Members</a></li>
					 
					 <li><a style="font-weight:normal;" href="http://www.jciiligan.org/">About Us</a></li>
					 <li><a style="font-weight:normal;" href="#" data-toggle="modal" data-target="#myModal" >Gallery</a></li>
					 <li><a style="font-weight:normal;" href="http://www.jciiligan.org/news-updates/">News and Updates</a></li>
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">

                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li>{!! link_to('login', trans('navs.frontend.login')) !!}</li>
                @else
							
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li>{!! link_to_route('frontend.user.dashboard', trans('navs.frontend.dashboard')) !!}</li>

                            @if (access()->user()->canChangePassword())
                                <li>{!! link_to_route('auth.password.change', trans('navs.frontend.user.change_password')) !!}</li>
                            @endif

                            @permission('view-backend')
                                <li>{!! link_to_route('admin.dashboard', trans('navs.frontend.user.administration')) !!}</li>
                            @endauth

                            <li>{!! link_to_route('auth.logout', trans('navs.general.logout')) !!}</li>
                        </ul>
                    </li>
                @endif

            </ul>
        </div><!--navbar-collapse-->
    </div><!--container-->
</nav>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg" >
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title" style="color:#FE9322;"><i class="glyphicon glyphicon-film"></i> Gallery</h4>
			</div>
			<div class="modal-body" style="padding: 0px;">
				<div id="jssor_1" style="position: relative; margin: 10px auto 20px auto; top: 0px; left: 0px; width: 810px; height: 300px; overflow: hidden; visibility: hidden; background-color: #000000;">
				  <!-- Loading Screen -->
				  <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
						<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
						<div style="position:absolute;display:block;background:url('{!! asset('/slider/img/loading.gif')!!}') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
				  </div>
			  <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
					
						 <?php
					
								$URL = fopen(asset('/FrontEndImages/gallery/url.txt'), "r") or die("Unable to open file!");
								//$text =  fread($URL,filesize("url.txt"));
								$text = array();
								$count = 0;
								while(!feof($URL)) {
								 $text[$count] = fgets($URL);
								  echo "
										<div data-p='112.50' style='display: none;'>	 
											 <img data-u='image' src='$text[$count]' />
											 <div data-u='thumb'>
												  <img class='i' src='$text[$count]' />
												  <div class='t'>JCI Image ".($count+1)."</div>
												  
											 </div>
										</div>
								  ";
								 $count++;
								}
								fclose($URL);
							?>
					<!--
					<div data-p="112.50" style="display: none;">	 
						 <img data-u="image" src="{!! asset('/slider/img/002.jpg') !!}" />
						 <div data-u="thumb">
							  <img class="i" src="{!! asset('/slider/img/thumb-002.jpg') !!}" />
							  <div class="t">Banner Rotator</div>
							  <div class="c">360+ touch swipe slideshow effects</div>
						 </div>
					</div>
					<div data-p="112.50" style="display: none;">
						 <img data-u="image" src="{!! asset('/slider/img/003.jpg') !!}" />
						 <div data-u="thumb">
							  <img class="i" src="{!! asset('/slider/img/thumb-003.jpg') !!}" />
							  <div class="t">Image Gallery</div>
							  <div class="c">Image gallery with thumbnail navigation</div>
						 </div>
					</div>
					<div data-p="112.50" style="display: none;">
						 <img data-u="image" src="{!! asset('/slider/img/004.jpg') !!}" />
						 <div data-u="thumb">
							  <img class="i" src="{!! asset('/slider/img/thumb-004.jpg') !!}" />
							  <div class="t">Carousel</div>
							  <div class="c">Touch swipe, mobile device optimized</div>
						 </div>
					</div>
					<div data-p="112.50" style="display: none;">
						 <img data-u="image" src="{!! asset('/slider/img/005.jpg') !!}" />
						 <div data-u="thumb">
							  <img class="i" src="{!! asset('/slider/img/thumb-005.jpg') !!}" />
							  <div class="t">Themes</div>
							  <div class="c">30+ professional themems + growing</div>
						 </div>
					</div>
					<div data-p="112.50" style="display: none;">
						 <img data-u="image" src="{!! asset('/slider/img/006.jpg') !!}" />
						 <div data-u="thumb">
							  <img class="i" src="{!! asset('/slider/img/thumb-006.jpg') !!}" />
							  <div class="t">Tab Slider</div>
							  <div class="c">Tab slider with auto play options</div>
						 </div>
					</div>
					-->
					<a data-u="ad" href="http://www.jssor.com" style="display:none">Bootstrap Slider</a>
			  
			  </div>
			  <!-- Thumbnail Navigator -->
			  <div data-u="thumbnavigator" class="jssort11" style="position:absolute;right:5px;top:0px;font-family:Arial, Helvetica, sans-serif;-moz-user-select:none;-webkit-user-select:none;-ms-user-select:none;user-select:none;width:200px;height:300px;" data-autocenter="2">
					<!-- Thumbnail Item Skin Begin -->
					<div data-u="slides" style="cursor: default;">
						 <div data-u="prototype" class="p">
							  <div data-u="thumbnailtemplate" class="tp"></div>
						 </div>
					</div>
					<!-- Thumbnail Item Skin End -->
			  </div>
			  <!-- Arrow Navigator -->
			  <span data-u="arrowleft" class="jssora02l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
			  <span data-u="arrowright" class="jssora02r" style="top:0px;right:218px;width:55px;height:55px;" data-autocenter="2"></span>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>