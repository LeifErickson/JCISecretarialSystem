@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.payment.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.payment.management') }}
        <small>{{ trans('labels.backend.access.payment.active') }}</small>
    </h1>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Payments</h3>

            <div class="box-tools pull-right">
                <a href="{{ url('admin/payments/') }}" class="btn btn-primary pull-right btn-sm">Go Back</a>
            </div>
        </div><!-- /.box-header -->
    @include('payments.show_fields')

    <div class="form-group">
           <a href="{!! route('admin.payments.index') !!}" class="btn btn-default">Back</a>
    </div>
@stop
