@extends ('backend.layouts.master')
@section('page-header')
    <h1>
       Template
        <small> gallery</small>
    </h1>
@stop

@section('content')
<div class="box box-success">
	<div class="box-header">
	{{  Form::open(array('url' => 'admin/template/saveG', 'method' => 'post')) }}
		<h3 class="box-title">Gallery Images</h3>
		<div class="box-tools pull-right">
			 <button type="submit" class="btn btn-success pull-right btn-sm">Save</button>
		</div>
		<div class="box-tools pull-right" style="padding-right:5px;">
			 <button type="button" data-target="#Add_image" data-toggle='modal'  class="btn btn-primary pull-right btn-sm">Add Image</button>
		</div>
		</hr>
	</div>
	<div class="box-body">
		<div class="table">
			<table class="table table-bordered">
				<thead>
					<th>Image</th>
					<th>URL</th>
					<th>Action</th>
				</thead>
				<tbody id="tableBody">
				<?php
					$count = 0;
					$text = "";
					foreach($images as $image){
						echo "
						<tr id='row".$count."'>
							<td ><img src='$image' width='75' height='75' class='image-responsive' ></td>
							<td>$image</td>
							<td><button type='button' value='$image' onclick='deleteElement(\"row".$count."\",this.value)' class='btn btn-danger btn-xs'>Delete</button></td>
						</tr>";
						$count++;
						
						$text .= $image;
					}
				
				?>
				</tbody>
			</table>
			<input type="number" style="display:none" id="row" value="<?php echo $count;?>" >
			<textarea name="urls" id="urls" style="display:none" ><?php echo $text;?></textarea>
		</div>
		{{ Form::close() }}
	</div>
</div> 
<div id="Add_image" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" >
			<div class="modal-dialog">
			  <div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Image</h4>
					</div>
					<div class="modal-body">
							<div class="form-group">
							  <label class="col-sm-3 control-label" >URL</label>
							  <div class="col-sm-8">
									<input  id="url" onerror="errorCallback()" onload="loadCallback()" id="url" value="" required placeholder="http://www.example.com/example.jpg" type="url" class="form-control" required>
							  </div>
							</div>
					</div>
					<div class="modal-footer">
						<div class="row">
							<div class="col-lg-12">
								<div class="col-lg-3">
								</div>
								<div class="col-lg-9">
									<button id="submit_modal" onclick="addElement()" name="submit" class="btn btn-primary">Add Image</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
			  </div>
			</div>
		</div>
@stop
@section('after-scripts-end')
    <script>
			
			function deleteElement(id,img){
				var parent = document.getElementById("tableBody");
				var child = document.getElementById(id);
				parent.removeChild(child);
				var str = document.getElementById("urls").value;
				var newText = "";
				var string = str.replace(img, "");
			
				document.getElementById("urls").value = string;
			}
		  function addElement(){
				var image = document.getElementById("url").value;
				var row = document.getElementById("row").value;
				row++;
				var res = image.split(".");
				if(image != "" ){
				var element = document.getElementById("tableBody").innerHTML;
					document.getElementById("tableBody").innerHTML = element +"<tr id='row"+row+"'><td><img src='"+image+"' width='75' height='75' class='image-responsive' ></td>"
								+"<td>"+image+"</td>"
								+"<td><button  type='button' value='"+image+"' onclick='deleteElement(\"row"+row+"\",this.value)'  class='btn btn-danger btn-xs'>Delete</button></td>"
							+"</tr>";
					$('#Add_image').modal('hide'); 
					var urls  = document.getElementById("urls").value;
					urls += "\n"+image;
					document.getElementById("urls").value = urls;
					document.getElementById("url").value = "";
					document.getElementById("row").value = row;
				}
		  }
    </script>
	 
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
/*     
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
                return true;
            }
             else 
            {     
                swal("Cancelled", "The data is safe :)", "error");   
                return false;
            } 
        });

      }
    });
	 */
    </script>
@stop

