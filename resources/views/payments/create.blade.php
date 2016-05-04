@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.member.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.member.management') }}
        <small>{{ trans('labels.backend.access.member.active') }}</small>
    </h1>
@stop

@section('content')
<div style="margin-left: 20px">
<div class="box box-success">
<div class="box-header">
    <h3 class="box-title">Create New Payment</h3>
            <div class="box-tools pull-left" style="margin-left: 20px">
              <a href="{{ url('admin/payments') }}" class="btn btn-primary pull-right btn-sm">Go Back</a>
            </div>
    </div>
    <hr/>
    

    @include('core-templates::common.errors')
    
    <div class="box-body">
    <div class="row">
        {!! Form::open(['route' => 'admin.payments.store']) !!}

            @include('payments.fields')

        {!! Form::close() !!}
    </div>
    </div>
    </div>
@stop