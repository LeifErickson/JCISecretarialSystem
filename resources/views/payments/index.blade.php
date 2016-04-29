@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.project.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.project.management') }}
        <small>{{ trans('labels.backend.access.project.active') }}</small>
    </h1>
@endsection

@section('content')
        <h1 class="pull-left">Payments</h1>
        <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('payments.create') !!}">Add New</a>

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        @include('payments.table')
        
@endsection