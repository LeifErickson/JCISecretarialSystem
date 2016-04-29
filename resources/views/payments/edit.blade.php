@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-sm-12">
                <h1 class="pull-left">Edit Payment</h1>
            </div>
        </div>

        @include('core-templates::common.errors')

        <div class="row">
            {!! Form::model($payment, ['route' => ['payments.update', $payment->id], 'method' => 'patch']) !!}

            @include('payments.fields')

            {!! Form::close() !!}
        </div>
@endsection