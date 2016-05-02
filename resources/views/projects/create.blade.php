@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.project.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.project.management') }}
        <small>{{ trans('labels.backend.access.project.active') }}</small>
    </h1>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Projects</h3>

            <div class="box-tools pull-right">
                <a href="{{ url('admin/events/projects/') }}" class="btn btn-primary pull-right btn-sm">Go Back</a>
            </div>
        </div><!-- /.box-header -->
    <div class="row">
        <div class="col-sm-12">
            <h1 class="pull-left">Create New Project</h1>
        </div>
    </div>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'admin.events.projects.store']) !!}

            @include('projects.fields')

        {!! Form::close() !!}
    </div>
@stop