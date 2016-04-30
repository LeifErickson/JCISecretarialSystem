@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.member.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.member.management') }}
        <small>{{ trans('labels.backend.access.member.active') }}</small>
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
            <h3 class="box-title">Members</h3>

            <div class="box-tools pull-right">
                <a href="{{ url('admin/members/create') }}" class="btn btn-primary pull-right btn-sm">Add New Member</a>
            </div>
        </div><!-- /.box-header -->
    <div class="table">
        <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th><th>Firstname</th><th>Lastname</th><th>Middlename</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($members as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('admin/members', $item->id) }}">{{ $item->firstname }}</a></td><td>{{ $item->lastname }}</td><td>{{ $item->middlename }}</td>
                    <td>
                        <a href="{{ url('admin/members/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'id' => 'delete',
                            'method'=>'DELETE',
                            'url' => ['admin/members', $item->id],
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
        <div class="pagination"> {!! $members->render() !!} </div>
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
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable({
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
                ]
            }
             
            ]
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
@endsection