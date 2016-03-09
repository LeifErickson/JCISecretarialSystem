@extends('members/layouts/masters/template')
@section('content')
    <h1>Show Member</h1>

    <form class="form-horizontal">
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">ID</label>
            <div class="col-sm-10">
               <input type="text" class="form-control" id="isbn" placeholder={{$members->id}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="isbn" class="col-sm-2 control-label">FirstName</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$members->firstname}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="title" class="col-sm-2 control-label">LastName</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$members->lastname}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="author" class="col-sm-2 control-label">MiddleName</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="isbn" placeholder={{$members->middlename}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="publisher" class="col-sm-2 control-label">Birthdate</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$members->birthdate}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="publisher" class="col-sm-2 control-label">Contact no</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$members->contactno}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="publisher" class="col-sm-2 control-label">Gender</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$members->gender}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="publisher" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$members->status}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="publisher" class="col-sm-2 control-label">Religion</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$members->religion}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="publisher" class="col-sm-2 control-label">JCI Senatorial No.</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$members->jcisenatorialno}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="publisher" class="col-sm-2 control-label">Date of Induction</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$members->birthdate}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="publisher" class="col-sm-2 control-label">Member since</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$members->created_at}} readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="publisher" class="col-sm-2 control-label">Info last updated at</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="isbn" placeholder={{$members->updated_at}} readonly>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('manage.members')}}" class="btn btn-primary">Back</a>
            </div>
        </div>
    </form>
@stop