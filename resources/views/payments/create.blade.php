@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.member.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.member.management') }}
        <small>{{ trans('labels.backend.access.member.active') }}</small>
    </h1>
@endsection

@section('content')
<div style="margin-left: 20px">
    <h1>Create New Payment</h1>
    <div class="box-tools pull-left" style="margin-left: 20px">
        <a href="{{{ URL::previous() }}}" class="btn btn-primary pull-right btn-sm">Go Back</a>
    </div>
    <hr/>

    @include('core-templates::common.errors')

    <div class="row">
        {!! Form::open(['route' => 'admin.payments.store']) !!}

            @include('payments.fields')

        {!! Form::close() !!}
    </div>
@endsection