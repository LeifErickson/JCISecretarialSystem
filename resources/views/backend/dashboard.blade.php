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

@section('after-scripts-end')
<script>
$(document).ready(function() 
{
    

// page is now ready, initialize the calendar...

$('#calendar').fullCalendar({
    eventRender: function (event, element) 
    {
        element.popover(
        {
            title: 'Event Name: ' + event.title,
            placement:'auto',
            html:true,
            trigger : 'click',
            animation : 'true', 
            container: 'body',
            content: 'ID: ' + event.id +" <br> " + 'Type: ' + event.type
        });

        $('body').on('click', function (e) 
        {
            if (!element.is(e.target) && element.has(e.target).length === 0 && $('.popover').has(e.target).length === 0)
                element.popover('hide');
        });
      },

    <?php  
    echo "eventSources:[".$variable2.",".$variable3."]";

    ?>

//     eventRender: function (event, element) {
//     element.popover({
//         title: event.name,
//         placement: 'right',
//         content: + '<br />Start: ' + event.starts_at + '<br />End: ' + event.ends_at + '<br />Description: ' + event.description,
//     });
// }
    // put your options and callbacks here
})

});
</script>
@stop