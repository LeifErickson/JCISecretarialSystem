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
					foreach($title as $row){
						echo $row->name; 
					}
			?> 
			</h3>
		</div>
		<div class="box-body">	
			<label for="radio4">Filter By: </label>
			<select id="filter" onchange="filterFunction()">
				<option>All</option>
				<option>Present</option>
				<option>Absent</option>
			</select>
			 <div class="table">
        <table id="example2" class="table table-bordered table-striped table-hover">
				<thead>
					 <th>ID</th>
					 <th>Name</th>
					 <th>
						<form action="test.php">
						<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						  Events Name <span class="caret"></span>
						</button>
						
						<ul class="dropdown-menu" role="menu">
							<?php
								foreach($events as $row){
										echo "<li><a href='./".$row->id."' >".$row->name."</a></li>";
								}
							?>
						</ul>
						</form>
					 </th>
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
		
		function filterFunction(){
			var text = document.getElementById("filter").value;
			alert(text);
			/*
			if (text.length == 0) { 
				document.getElementById("txtHint").innerHTML = "";
				return;
			} else {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						 document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
						  $('.dropdown-menu').dropdown().toggle();
					}
				};
				xmlhttp.open("GET", "lib/getPerson.php?text=" + text+"&id="+id, true);
				xmlhttp.send();
			}
			*/
		}
    </script>
@stop