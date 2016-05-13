@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.project.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.project.management') }}
    </h1>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Update Project</h3>

            <div class="box-tools pull-right">
                <a href="{{ url('admin/events/projects/') }}" class="btn btn-primary pull-right btn-sm">Go Back</a>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
			  @include('core-templates::common.errors')

			  <div class="row">
					{!! Form::model($project, ['route' => ['admin.events.projects.update', $project->id], 'method' => 'put']) !!}

					@include('projects.fields')
					
					<!-- Submit Field -->
					<div class="form-group col-sm-12">
						 {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
						 <a href="{!! route('admin.events.projects.index') !!}" class="btn btn-default">Cancel</a>
					</div>

					{!! Form::close() !!}
			  </div>
		  </div>
@stop

@section('after-scripts-end')
	<script src="{{ URL::asset('ckeditor/ckeditor.js') }}"></script>
		 
		 
		<script>
			// Replace the <textarea id="editor1"> with a CKEditor
			// instance, using default configuration.
			CKEDITOR.replace( 'editor1' );
		</script>
@stop