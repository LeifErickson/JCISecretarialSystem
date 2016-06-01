@extends('frontend.layouts.master')
@include('frontend.includes.header')
@section('content')
<div class="container" style="margin-top:-50px;">
   <div class="row">
			<div class="col-lg-12">
						<!--<div class="col-md-8 " >
							<div class="col-md-12">
									
							</div>
						</div>--><!-- panel -->
						@include('frontend.projects')
						@include('frontend.events')
						
        </div><!-- col-md-10 -->
       

   </div><!--row-->
</div>
@stop

@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
		  
    </script>
@stop