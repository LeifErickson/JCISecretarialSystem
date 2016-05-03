@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.project.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.project.management') }}
        <small>{{ trans('labels.backend.access.project.active') }}</small>
    </h1>
@endsection

@section('content')
    <script>
      function ConfirmDelete()
      {
       event.preventDefault();
       swal({   
        title: "Are you sure?",   
        text: "You will not be able to recover this data!",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel it!",   
        closeOnConfirm: false,  
        closeOnCancel: false
         }, 
         function(isConfirm)
         {   
            if (isConfirm)
             {     
                swal("Deleted!", "The data will be deleted in a moment.", "success"); 
                document.forms['delete'].submit();  
            }
             else 
            {     
                swal("Cancelled", "The data is safe :)", "error");   
                return false;
            } 
        });

      }
    </script>
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">All Events</h3>

            <div class="box-tools pull-right">
                <a href="{{ url('admin/events/projects/create') }}" class="btn btn-primary pull-right btn-sm">Add New Project</a>
            </div>
        </div><!-- /.box-header -->
	
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
	<div class="box-body">	
    <div class="table">
        <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Event name</th><th>Type</th><th>Date Created</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($projects as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td><a href="{{ url('admin/events/projects', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->eventtype }}</td><td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ url('admin/events/projects/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'id' => 'delete',
                            'method'=>'DELETE',
                            'url' => ['admin/events/projects', $item->id],
                            'style' => 'display:inline',
                            'onsubmit' => 'return ConfirmDelete()'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            {{-- */$y=0;/* --}}
            @foreach($meetings as $item)
                {{-- */$y++;/* --}}
                <tr>
                    <td><a href="{{ url('admin/events/meetings', $item->id) }}">{{ $item->title }}</a></td><td>{{ $item->eventtype }}</td><td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ url('admin/events/meetings' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'id' => 'delete',
                            'method'=>'DELETE',
                            'url' => ['admin/events/meetings', $item->id],
                            'style' => 'display:inline',
                            'onsubmit' => 'return ConfirmDelete()'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            {{-- */$z=0;/* --}}
            @foreach($events as $item)
                {{-- */$z++;/* --}}
                <tr>
                    <td><a href="{{ url('admin/events', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->eventtype }}</td><td>{{ $item->created_at }}</td>
                    <td>
                        <a href="{{ url('admin/events' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'id' => 'delete',
                            'method'=>'DELETE',
                            'url' => ['admin/events', $item->id],
                            'style' => 'display:inline',
                            'onsubmit' => 'return ConfirmDelete()'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
	</div>
@endsection

@section('after-scripts-end')
    <!-- DataTables -->
    <script src="{{ asset('/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('/plugins/datatables/dataTables.select.min.js') }}"></script>
    
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
           dom: 'Bfrtip',
            stateSave: true,
            buttons: [
                
                'colvis',
                {
                extend: 'collection',
                text: 'Export',
                autoClose: true,
                buttons: 
                [
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print selected',
                        exportOptions: {
                            modifier: {
                                selected: true
                            },
                        }
                    }
                ],
                select: true
            }
             
            ]

        });
      });
    </script>
@endsection