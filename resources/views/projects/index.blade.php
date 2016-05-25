@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.project.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.project.management') }}
        <small>{{ trans('labels.backend.access.project.active') }}</small>
    </h1>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Projects</h3>

            <div class="box-tools pull-right">
                <a href="{{ url('admin/events/projects/create') }}" class="btn btn-primary pull-right btn-sm">Add New Project</a>
            </div>
        </div><!-- /.box-header -->

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
    <div class="box-body">
    <div class="table">
        <table id="example2" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th><th>Project Name</th><th>Date begun</th><th>Date finished</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($projects as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('admin/events/projects', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->datebegun }}</td><td>{{ $item->datecompleted }}</td>
                    <td>
                        <a href="{{ url('admin/events/projects/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        <!-- {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['admin.events.projects.destroy', $item->id],
                            'style' => 'display:inline',
                            'class' => 'delete_form'
                        ]) !!}
                            <button class="btn btn-danger btn-xs">Delete</button>  / 
                        {!! Form::close() !!} -->
								<a  href='../attendance/projectsAttendance/{{ $item->id }}'  ><button class="btn btn-success btn-xs">Attendance</button></a>  /
								<a href="../../post/project/{{ $item->id }}" ><button class="btn btn-primary btn-xs">Preview</button></a> 
								
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
        </div>
    </div>
	</div>
@stop

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

    <!--delete script-->
    <script type="text/javascript">
      $('button.btn-danger').on('click', function(e){
      {
       event.preventDefault();
       var self = $(this)
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
                self.parents(".delete_form").submit();
            }
             else 
            {     
                swal("Cancelled", "The data is safe :)", "error");   
                return false;
            } 
        });

      }
    });
    </script>
    
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
								autoPrint: false,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'print',
                        text: 'Print selected',
								autoPrint: false,
                        exportOptions: {
                            modifier: {
                                selected: true
                            }
                        }
                    }
                ]
            }
             
            ], select: true

        });
      });
    </script>
@stop