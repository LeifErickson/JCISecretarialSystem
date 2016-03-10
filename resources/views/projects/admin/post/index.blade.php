
@extends('members/layouts/masters/template')

@section('content')
 <h1><strong><span>Projects</span></strong></h1>
 <a href="/manage/admin/post/create " class="btn btn-success">New post</a>
 <hr style="width: 1020px;">
 <table class="table table-striped table-bordered table-hover">
  <col width = "15">
  <col width = "300">
  <col width = "300">
  <col width = "90">
  <col width = "30">
  <col width = "30">
  <col width = "30">
     <thead>
     <tr class="bg-info">
         <th>ID</th>
         <th>Slug</th>
         <th>Title</th>
         <th>Created At</th>
         <th colspan="3">Actions</th> 
     </tr>
     </thead>
     <tbody>
     @foreach ($posts as $post)
         <tr>
             <td>{{ $post->id }}</td>
             <td>{{ $post->slug }}</td>
             <td>{{ $post->title }}</td>
             <td>{{ $post->created_at }}</td>
             <td><a href="/manage/projects/{{ $post->slug }}" class="btn btn-primary">View</a></td>
             <td><a href="/manage/admin/post/{{ $post->id }}/edit" class="btn btn-warning">Update</a></td>
             <td>
             {!! Form::open(['method' => 'DELETE', 'route'=>['manage.admin.post.destroy', $post->id]]) !!}
             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
             {!! Form::close() !!}
             </td>
         </tr>
     @endforeach

     </tbody>

 </table>
@endsection

