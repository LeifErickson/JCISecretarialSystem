@extends('backend.layouts.master')

@section('page-header')
    <h1>
        {!! app_name() !!}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h1>
@stop

@section('content')
<ul class="nav nav-tabs">
	<li class="active"><a data-toggle="tab" href="#home">Calendar of Events</a></li>
	<li><a data-toggle="tab" href="#menu1">Last 120 Registrations</a></li>
	<li><a data-toggle="tab" href="#menu2">Last 120 Projects</a></li>
</ul>
<div class="tab-content">
	<div id="home" class="tab-pane fade in active">
    <div class="box box-success">
        <div class="box-header with-border">
        <h3 class="box-title">Calendar of Events</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div id='calendar'></div>
        </div><!-- /.box-body -->
    </div><!--box box-success-->
	</div>
	<div id="menu1" class="tab-pane fade">
    <div class="box box-success">
        <div class="box-header with-border">
            <!-- <h3 class="box-title">{{ trans('strings.backend.dashboard.welcome') }} {!! access()->user()->name !!}!</h3> -->
            <h3 class="box-title">Last 120 Registrations</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            <div id="chart-div"></div>
            @areachart('membersTable', 'chart-div', true)
        </div><!-- /.box-body -->
    </div><!--box box-success-->
	</div>
	<div id="menu2" class="tab-pane fade">
		<div class="box box-success">
		  <div class="box-header with-border">
		  <h3 class="box-title">Last 120 Projects </h3>
				<div class="box-tools pull-right">
					 <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div><!-- /.box tools -->
		  </div><!-- /.box-header -->
		  <div class="box-body">
				<div id="chart2-div"></div>
				@linechart('projectsTable', 'chart2-div', true)
		  </div><!-- /.box-body -->
		</div><!--box box-success-->
	 </div>
 </div>  
@stop
