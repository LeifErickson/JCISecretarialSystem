@extends('backend.layouts.master')

@section('page-header')
    <h1>
        Event
    </h1>
@stop
@section('content')
	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title">Update Event</h3>
			<div class="box-tools pull-left" style="margin-left: 20px">
			  <a href="{{ url('admin/events') }}" class="btn btn-primary pull-right btn-sm">Go Back</a>
			</div>
		</div>
		<div class="box-body">
			<div class="row">
				<div class="col-md-8">
					<div class="box box-primary">
						{{  Form::open(array('url' => 'admin/events/updateEvent', 'method' => 'post')) }}
							<?php
								foreach($data as $row){
							?>
							<div class="box-header with-border">
								<div class="form-group">
									<input name="id" type="hidden" value = "<?php echo $row->id;?>">
									<input name="title" placeholder="Title" class="form-control" value = "<?php echo $row->name;?>">
								</div>
							</div>
							<div class="box-body">
								<div class="form-group">
									<textarea id="editor1" name="description"><?php echo $row->description; ?></textarea>
								</div>
							</div>
							<div class="box-footer">
								<div class="form-group">
									<button class="btn btn-info pull-right" type="submit" >Update</button>
								</div>
							</div>
							
					</div>
				</div>
				<div class="col-md-4">
					<div class="box box-info">
						<div class="box-body">
							<label>Date</label>
							<div class="form-group">
								<div class="input-group">
									<input name="date" id="datepicker" class="form-control" type="text"  value = "<?php echo $row->year;?>"  placeholder="Event Set" required >
									<div class="input-group-btn">
										<button class="btn btn-primary btn-flat">
											<i class="fa fa-calendar"></i>
										</button>
									</div>
								</div>
							</div>
							<label>Time</label>
							<div class="form-group">
								<input name="time" type="time"  value = "<?php echo $row->time; ?>"   class="form-control">
							</div>
							<label>Location</label>
							<div class="form-group">
								<input name="location" type="text" value = "<?php echo $row->location; ?>" class="form-control">
							</div>
						</div>
					</div>
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">Event Organizer</h3>
						</div>
							<div class="box-body">
								<div class="form-group">
									<input name="event_organizer" class="form-control" value="<?php echo $row->organizer;?>" type="text" placeholder="Organizer" required >
								</div>
							</div>
					</div>
					<?php } ?>
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">Sponsor(s)</h3>
						</div>
						<div class="box-body">
						
							<?php 
								$textAReaValue = "";
								$sponsorRow="";
								foreach($finance as $row){ 
									$donation= $row->donation ;$name = $row->name;
									$textAReaValue .= $name."|".$donation."][";
									$sponsorRow .= "<tr id='".$name."'>
													<td>". $name."</td>
													<td>".$donation."</td>
													<td><a  class='btn btn-xs btn-danger' onclick='delRow(\"".$name."\")' ><i class='fa fa-trash' title='' data-placement='top' data-toggle='tooltip' data-original-title='Delete'></i></a></td>
												</tr>";
								}			
							?>
							<textArea id="list_of_sponsors" style="display:none;" name="sponsors" ><?php echo $textAReaValue; ?></textArea>
							<table  class="table table-bordered">
								<thead>	
									<th>Name</th>
									<th>Donation</th>
									<th>Action</th>
								</thead>
								<tbody id="SponsorsTable">
									<?php echo $sponsorRow; ?>
								</tbody>
							</table>
						</div>
					</div>
					{{ Form::close() }}
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">Add Sponsor</h3>
						</div>
						<div class="box-body">
							<div class="form-group">
								<input id="sponsor_id" value="0" name="sponsor_id" class="form-control" type="hidden" />
								<input id="name"  autocomplete="off" onkeyup="showResult(this.value)" class="form-control" type="text" placeholder="Name" required />
								<div id="livesearch"></div>
								
							</div>
							<div class="form-group">
								<textarea id="donation" class="form-control" type="text" placeholder="Donation" required/></textarea>
							</div>
						</div>
						<div  class="box-footer">
							<button  onclick="addSponsor()" id="addSponsor" class="btn btn-info pull-right" type="submit">Add Sponsor</button>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
@stop

@section('after-scripts-end')
		 <script src="{{ URL::asset('datepicker/test.js') }}"></script>
		 <script src="{{ URL::asset('datepicker/test2.js') }}"></script>
		 
		 <script src="{{ URL::asset('ckeditor/ckeditor.js') }}"></script>
		 
		 
		<script>
			// Replace the <textarea id="editor1"> with a CKEditor
			// instance, using default configuration.
			CKEDITOR.replace( 'editor1' );
			
			// datePicker
			$(function() {
				 $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
			  });
			// sponsors
			function addSponsor(){
				var s_id = document.getElementById("sponsor_id").value;
				var name = document.getElementById("name").value;
				var donation = document.getElementById("donation").value;
				var list = document.getElementById("list_of_sponsors").value;
				
				
				if(list != ""){
					document.getElementById("list_of_sponsors").value = list+""+name+"|"+donation+"][";
				} else {
					document.getElementById("list_of_sponsors").value = name+"|"+donation+"][";
				}
					
				var tr  = document.createElement("TR");
				tr.setAttribute("id", s_id);
				var td1 = document.createElement("TD");
				var t = document.createTextNode(name);
				td1.appendChild(t);
				tr.appendChild(td1);
				
				var td2 = document.createElement("TD");
				var t2 = document.createTextNode(donation);
				td2.appendChild(t2);
				tr.appendChild(td2);
				
				
				var icon = document.createElement("i");
				icon.setAttribute("class", "fa fa-trash");
				
				var a = document.createElement("a");
				a.setAttribute("class", "btn btn-xs btn-danger");
				a.setAttribute("onclick", "delRow("+s_id+")");
				a.appendChild(icon);
				
				var td3 = document.createElement("TD");
				td3.appendChild(a);
				tr.appendChild(td3);
				
				document.getElementById("SponsorsTable").appendChild(tr);
				document.getElementById("sponsor_id").value = "";
				document.getElementById("name").value = "";
				document.getElementById("donation").value = "";
			}
			//search
			function setVal(a,b){
				document.getElementById("sponsor_id").value = a;
				document.getElementById("name").value = b;
				document.getElementById("livesearch").innerHTML = "";
			}
		
		  //search Result
		  function showResult(str) {
				
			 
			 if (str.length==0) { 
				 document.getElementById("livesearch").value="";
				 document.getElementById("livesearch").style.border="0px";
				 return;
			  } 
			  if (window.XMLHttpRequest) {
				 // code for IE7+, Firefox, Chrome, Opera, Safari
				 xmlhttp=new XMLHttpRequest();
			  } else {  // code for IE6, IE5
				 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			  
			  
			  xmlhttp.onreadystatechange=function() {
				 if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById("livesearch").innerHTML= xmlhttp.responseText;
				 }
				 //document.getElementById("livesearch").innerHTML ="searchPage/"+str+" "+xmlhttp.readyState + " "+xmlhttp.status ;
			  }
			  
			  xmlhttp.open("GET","../searchPage/"+str,true);
			  xmlhttp.send();
			  
			}
			
			function delRow(id){
				var con = confirm("Are you want to delete?");
				if(con){
					var val = document.getElementById("list_of_sponsors").value;
					var j = 0;
					var str = val.split("][");
					var newStr = "";
					for(j;j < str.length;j++){
						var values = str[j].split("|");
						
						if(id != values[0]){
							 if(newStr != "")
								newStr = newStr +"]["+str[j];
							else
								newStr = str[j];
						} 
					}
					document.getElementById("list_of_sponsors").value = newStr; 
					
					var parent = document.getElementById("SponsorsTable");
					var child = document.getElementById(id);
					parent.removeChild(child);
				}
			}
		</script>
@stop