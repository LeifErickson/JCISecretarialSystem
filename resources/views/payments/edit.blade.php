@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.payment.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.payment.management') }}
        <small>{{ trans('labels.backend.access.payment.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Payments</h3>

            <div class="box-tools pull-right">
                <a href="{{ url('admin/events/projects/') }}" class="btn btn-primary pull-right btn-sm">Go Back</a>
            </div>
        </div><!-- /.box-header -->
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Payment</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($payment, ['route' => ['admin.payments.update', $payment->id], 'method' => 'patch']) !!}

            @include('payments.fields')

            {!! Form::close() !!}
        </div>
@endsection