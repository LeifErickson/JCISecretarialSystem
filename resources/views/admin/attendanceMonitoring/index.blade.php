@extends('backend.layouts.master')

@section('page-header')
    <h1>
       Attendance Monitoring
    </h1>
@stop
@section('content')
	<div class="box box-success">
		<div class="box-header with-border">
			<form >
			<h3 class="box-title" >Event Name: <?php 
					$eventName = "";
					$event_id = 0;
					foreach($title as $row){
						$event_id = $row->id;
						$eventName =  $row->name; 
					}
					echo $eventName;
			?> 
			</h3>
		</div>
		<div class="box-body">	
			
			
			<div class="col-lg-12" style="margin-bottom: 9px;">
				<div class="col-lg-1">
				<label style="margin-top: 9px;">Filter By:</label>
				</div>
				<div class="col-lg-2">
					<select id="filter" class="form-control"  onchange="filterFunction()">
						<option value="0" >All</option>
						<option value="Present" >Present</option>
						<option value="Absent" >Absent</option>
					</select>
				</div>
				<div class="col-lg-1">
				<label style="margin-top: 9px;">Event:</label>
				</div>
				<div class="col-lg-2">
					<form action="test.php">
							<div class="dropdown" >
							<button type="button" class="form-control" data-toggle="dropdown" aria-expanded="false">
							  <?php echo $eventName;?> <span class="caret"></span>
							</button>
							
							<ul  class="dropdown-menu" role="menu">
								<?php
									
									foreach($events as $row){
											echo "<li><a href='./".$row->id."' >".$row->name."</a></li>";
									}
								?>
							</ul>
							</div>
						</form>
				</div>
			
			<div class="table" style="margin-top: 45px;">
        <table id="example2" style="" class="table table-bordered table-striped table-hover">
				<thead>
					 <th>ID</th>
					 <th>Name</th>
					 <th>Attendance</th>
				</thead>
				<tbody id="events_table">
					<?php
						foreach($attendance as $row){
							$check = "";
							if($row->Present == 1)
								$check = "<td class='bg-green'>Present</td>";
							else
								$check = "<td  class='bg-red' >Absent</td>";
							echo "<tr>
											<td>".$row->id ."</td>
											<td>".$row->firstname ." ".$row->lastname ."</td>
											".$check."
										</tr>";
						}
					?>
				</tbody>
			</table>
			</div>
	  </div><!-- /.box-body -->
	</div><!--box box-success-->
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
    
    <!-- page script -->
    <script>
      $(document).ready(function () {
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
								 text: 'Print',
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
             
            ],
             select: true
        });
      });
		$.fn.dataTable.ext.search.push(
			 function( settings, data, dataIndex ) {
				  var text = document.getElementById("filter").value;
				  var d = data[2] ; // use data for the age column
		 
				  if ( d == text)
				  {
						return true;
				  } else if(text == 0){
						return true;
				  }
				  return false;
			 }
		);
		function filterFunction(){
			
			var table = $('#example2').DataTable();
			   table.draw();
		}
    </script>
@stop