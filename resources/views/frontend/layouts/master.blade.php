<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{ csrf_token() }}" />

        <title>@yield('title', app_name())</title>

        <!-- Meta -->
        <meta name="description" content="@yield('meta_description', 'Default Description')">
        <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
        @yield('meta')

        <!-- Styles -->
        @yield('before-styles-end')
        {!! Html::style(elixir('css/frontend.css')) !!}
		  
        @yield('after-styles-end')
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
		  <link href="{!! asset('/dist_pagination/css/jplist.demo-pages.min.css') !!}" rel="stylesheet" type="text/css" />
		  <link rel="stylesheet" type="text/css" href="{!! asset('/slider/css/slider.css') !!}">
			 <script type="text/javascript" src="{!! asset('/slider/js/jquery-1.11.3.min.js') !!}"></script>
		 <script type="text/javascript" src="{!! asset('/slider/js/jssor.slider.mini.js') !!}"></script>
		 <!-- use jssor.slider.debug.js instead for debug -->
		 <script type="text/javascript" src="{!! asset('/slider/js/slider.js') !!}"></script>

    
		 <!-- jQuery lib 
		<script src="{!! asset('/build/js/jquery-1.11.1.min.js') !!}"></script>-->
		
		 <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
			<!-- jPList core js and css  -->
		 <link href="{!! asset('/dist_pagination/css/jplist.core.min.css') !!}" rel="stylesheet" type="text/css" />
		 <script src="{!! asset('dist_pagination/js/jplist.core.min.js') !!}"></script>

		 <!-- jPList sort bundle -->
		 <script src="{!! asset('/dist_pagination/js/jplist.sort-bundle.min.js') !!}"></script>

		 <!-- jPList textbox filter control -->
		 <script src="{!! asset('/dist_pagination/js/jplist.textbox-filter.min.js') !!}"></script>
		 <link href="{!! asset('/dist_pagination/css/jplist.textbox-filter.min.css') !!}" rel="stylesheet" type="text/css" />

		 <!-- jPList pagination bundle -->
		 <script src="{!! asset('/dist_pagination/js/jplist.pagination-bundle.min.js') !!}"></script>
		 <link href="{!! asset('/dist_pagination/css/jplist.pagination-bundle.min.css') !!}" rel="stylesheet" type="text/css" />

		 <!-- jPList history bundle -->
		 <script src="{!! asset('/dist_pagination/js/jplist.history-bundle.min.js') !!}"></script>
		 <link href="{!! asset('/dist_pagination/css/jplist.history-bundle.min.css') !!}" rel="stylesheet" type="text/css" />

		 <!-- jPList toggle bundle -->
		 <script src="{!! asset('/dist_pagination/js/jplist.filter-toggle-bundle.min.js') !!}"></script>
		 <link href="{!! asset('/dist_pagination/css/jplist.filter-toggle-bundle.min.css') !!}" rel="stylesheet" type="text/css" />
		   <script>
        $('document').ready(function(){

            $('#demo').jplist({
                itemsBox: '.list'
                ,itemPath: '.list-item'
                ,panelPath: '.jplist-panel'
            });
        });
    </script>
    </head>
    <body id="app-layout" >

        @include('frontend.includes.nav')
			<div class="page-wrapper">
					@include('includes.partials.messages')
					@yield('content')
			 <!-- container -->
			</div>
        <!-- JavaScripts -->
       <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="{{asset('js/vendor/jquery/jquery-2.1.4.min.js')}}"><\/script>')</script>
		   -->
        {!! Html::script('js/vendor/bootstrap/bootstrap.min.js') !!}

        @yield('before-scripts-end')
        {!! Html::script(elixir('js/frontend.js')) !!}
        @yield('after-scripts-end')

        @include('includes.partials.ga')
    </body>
</html>