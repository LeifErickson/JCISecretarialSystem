@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.project.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.project.management') }}
        <small>{{ trans('labels.backend.access.project.active') }}</small>
    </h1>
@endsection

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

    <div class="table">
        <table id="example2" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th><th>Project Name</th><th>Description</th><th>Date begun</th><th>Date finished</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($projects as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->id }}</td>
                    <td><a href="{{ url('admin/events/projects', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->description }}</td><td>{{ $item->datebegun }}</td><td>{{ $item->datecompleted }}</td>
                    <td>
                        <a href="{{ url('admin/events/projects/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/events/projects', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $projects->render() !!} </div>
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