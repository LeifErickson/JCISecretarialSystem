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
            <h2 class="box-title">Member Information</h2>

            <div class="box-tools pull-right">
                <a href="{{{ URL::previous() }}}" class="btn btn-primary pull-right btn-sm">Go Back</a>
            </div>
        </div><!-- /.box-header -->
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th> <th>Firstname</th><th>Lastname</th><th>Middlename</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $member->id }}</td> <td> {{ $member->firstname }} </td><td> {{ $member->lastname }} </td><td> {{ $member->middlename }} </td>
                </tr>
            </tbody> 
            <thead>
                <tr>
                    <th>Birthdate</th> <th>Contact No.</th> <th>Gender</th> <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $member->birthdate }}</td> <td>{{ $member->contactno }}</td> <td>{{ $member->gender }}</td> <td>{{ $member->status }}</td>
                </tr>
            </tbody>     
        </table>
     </div>

     <div class="box-header with-border">
            <h2 class="box-title">Additional Information</h2>
     </div>
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Religion</th> <th>Place of Birth</th><th>JCI Senatorial Number</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $member->religion }}</td> <td> {{ $member->placeofbirth }} </td><td> {{ $member->jcisenatorialno }} </td>
                </tr>
            </tbody> 
            <thead>
                <tr>
                    <th>Date of Induction</th> <th>Created at</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $member->dateofinduction }}</td> <td>{{ $member->created_at }}</td>
                </tr>
            </tbody>     
        </table>
        </div>
    </div>

@endsection