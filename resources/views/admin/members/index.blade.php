@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.member.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.member.management') }}
        <small>{{ trans('labels.backend.access.member.active') }}</small>
    </h1>
@stop

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Members</h3>

            <div class="box-tools pull-right">
                <a href="{{ url('admin/members/create') }}" class="btn btn-primary pull-right btn-sm">Add New Member</a>
            </div>
        </div><!-- /.box-header -->
    <div class="box-body">
    <div class="table">
    <label for='radio4'><input id='radio3' type='radio' name='RadioGroup1' value='all' checked />All</label>
    <!-- default filter is 'show everything' so make it checked -->
    <label for='radio1'><input id='radio1' type='radio' name='RadioGroup1' value='Baby JC' />Baby</label>
    <label for='radio2'><input id='radio2' type='radio' name='RadioGroup1' value='Regular' />Regular</label>
    <label for='radio3'><input id='radio2' type='radio' name='RadioGroup1' value='Associate' />Associate</label>
            <table id="example1" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th><th>Type</th><th>Firstname</th><th>Lastname</th><th>Middlename</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($members as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->membershiptype }}</td><td><a href="{{ url('admin/members', $item->id) }}">{{ $item->firstname }}</a></td><td>{{ $item->lastname }}</td><td>{{ $item->middlename }}</td>
                    <td>
                        <a href="{{ url('admin/members/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> 
                        {!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['admin.members.destroy', $item->id],
                            'style' => 'display:inline',
                            'class' => 'delete_form'
                        ]) !!}
                            <button class="btn btn-danger btn-xs">Delete</button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $members->render() !!} </div>
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
        $("#example3").DataTable({
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

    <script>
// Just wrapping in a function to prevent global $radio, $dTable, etc...
(function encapsulate() {
    var $radio = 'all'; // set to initial filter value, show all (RadioGroup1.radio3.value)
    // This function filters the dataTable rows
    $.fn.dataTableExt.afnFiltering.push(function(oSettings, aData, iDataIndex) {
        // show everything
        if ($radio == "all")
            return true;
        else // Filter column 1 where matches RadioGroup1.value
            return aData[1] == $radio;
    });
    var $dTable = $("#example1").dataTable({
        "sPaginationType": "full_numbers",
        "bPaginate": true,
        "bScrollCollapse": true,
        "iDisplayLength": 15,
        //"bFilter": false,
        // "bJQueryUI": true,
        //"aoColumnDefs": [{ "bVisible": false, "aTargets": [0] }], // first field is hidden
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

    // On click, get the value of the selected radio
    $("input[name='RadioGroup1']").on('change', function () {
        // $radio = $("input[name='RadioGroup1']:checked").val();
        $radio = $(this).val();
        $dTable.fnDraw(); // refresh the dataTable
    });
    })();
    </script>
@stop