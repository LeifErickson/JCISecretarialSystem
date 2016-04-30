@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.member.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.member.management') }}
        <small>{{ trans('labels.backend.access.member.show') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h2 class="box-title">Meeting History</h2>

            <div class="box-tools pull-right">
                <a href="{{{ URL::previous() }}}" class="btn btn-primary pull-right btn-sm">Go Back</a>
            </div>
        </div><!-- /.box-header -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Title</th><th>Description</th><th>Agenda</th><th>Type</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $meeting->id }}</td> <td> {{ $meeting->title }} </td> <td> {{ $meeting->description }} </td><td> {{ $meeting->agenda }} </td><td> {{ $meeting->type }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection