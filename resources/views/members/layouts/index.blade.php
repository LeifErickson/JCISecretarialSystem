
@extends('members/layouts/masters/template')

@section('content')
 <h1>Members</h1>
 <a href="{{url('/members/create')}}" class="btn btn-success">New Member</a>
 <hr>
 <table class="table table-striped table-bordered table-hover">
     <thead>
     <tr class="bg-info">
         <th>ID</th>
         <th>First Name</th>
         <th>Last Name</th>
         <th>Middle Name</th>
         <th>Birth Date</th>
         <th>Contact No</th>
         <th>Gender</th>
         <th>Status</th>
       <!--   <th>religion</th>
         <th>placeofbirth</th>
         <th>jcisenatorialno</th>
         <th>dateofinduction</th>
         <th>created_at</th>
         <th>updated_at</th>-->
         <th colspan="3">Actions</th> 
     </tr>
     </thead>
     <tbody>
     @foreach ($members as $member)
         <tr>
             <td>{{ $member->id }}</td>
             <td>{{ $member->firstname }}</td>
             <td>{{ $member->lastname }}</td>
             <td>{{ $member->middlename }}</td>
             <td>{{ $member->birthdate }}</td>
             <td>{{ $member->contactno }}</td>
             <td>{{ $member->gender }}</td>
             <td>{{ $member->status }}</td>
          <!--   <td>{{ $member->religion }}</td>
             <td>{{ $member->placeofbirth }}</td>
             <td>{{ $member->jcisenatorialno }}</td>
             <td>{{ $member->dateofinduction }}</td>
             <td>{{ $member->created_at }}</td>
             <td>{{ $member->updated_at }}</td> -->
             <td><a href="{{url('members',$member->id)}}" class="btn btn-primary">View</a></td>
             <td><a href="{{route('members.edit',$member->id)}}" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['members.destroy', $member->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>
@endsection