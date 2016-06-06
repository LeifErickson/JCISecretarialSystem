@extends('frontend.layouts.master')

@section('content')
	@include('frontend.includes.header')
	<div class="container" style="margin-top:-50px;">
		<div class="row">
			<div class="col-lg-12">
				@include('frontend.projects')
				@include('frontend.events')
				
			</div>
		</div>
	</div>
	
	@include('frontend.includes.footer')
@stop


@section('after-scripts-end')
    <script>
        //Being injected from FrontendController
        console.log(test);
		  
    </script>
@stop