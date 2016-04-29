@extends('layouts.app')

@section('content')
    @include('payments.show_fields')

    <div class="form-group">
           <a href="{!! route('payments.index') !!}" class="btn btn-default">Back</a>
    </div>
@endsection
