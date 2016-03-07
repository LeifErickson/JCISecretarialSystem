@extends('backend.layouts.master')

@section('page-header')
    <h1>
        {!! app_name() !!}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h1>
@endsection

@section('content')
    <iframe src="/members" __idm_frm__="9" mytubeid="mytube1" style="
        width: 1084px;
        height: 804px;
        frameBorder="0";
        ">
    </iframe>
@endsection