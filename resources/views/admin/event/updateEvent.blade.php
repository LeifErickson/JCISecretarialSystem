@extends('backend.layouts.master')

@section('page-header')
    <h2>
        Update Event
    </h2>
	 
@stop
@section('content')
    <div id="page-wrapper">
		<div class="container-fluid">
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
						<div class="box-header with-border">
							<h3 class="box-title">Date Held</h3>
						</div>
							<div class="box-body">
								<div class="form-group">
									<div class="input-group">
										<input name="date" id="datepicker"  value = "<?php echo $row->year;?>" class="form-control" type="text" placeholder="Event Set">
										<div class="input-group-btn">
											<button class="btn btn-primary btn-flat">
												<i class="fa fa-calendar"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
					</div>
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">Sponsor(s)</h3>
						</div>
						<div class="box-body">
						
							<?php 
								$textAReaValue = "";
								$sponsorRow="";
								foreach($finance as $row){ 
									$id =$row->id;$amount= $row->amount ;$name = $row->firstname ." ". $row->lastname;
									$textAReaValue .= $id.",".$amount."\n";
									$sponsorRow = "<tr id='".$id."'>
													<td>". $name."</td>
													<td>".$amount."</td>
													<td><a  class='btn btn-xs btn-danger' onclick='delRow(".$id.")' ><i class='fa fa-trash' title='' data-placement='top' data-toggle='tooltip' data-original-title='Delete'></i></a></td>
												</tr>";
								}			
							?>
							<textArea id="list_of_sponsors" style="display:none;" name="sponsors" ><?php echo $textAReaValue; ?></textArea>
							<table  class="table table-bordered">
								<thead>	
									<th>Name</th>
									<th>Amount</th>
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
								<input id="amount" class="form-control" type="number" placeholder="Amount" required/>
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
				var amount = document.getElementById("amount").value;
				var list = document.getElementById("list_of_sponsors").value;
				
				
				if(list != ""){
					document.getElementById("list_of_sponsors").value = list+""+s_id+","+amount+"\n";
				} else {
					document.getElementById("list_of_sponsors").value = s_id+","+amount+"\n";
				}
					
				var tr  = document.createElement("TR");
				tr.setAttribute("id", s_id);
				var td1 = document.createElement("TD");
				var t = document.createTextNode(name);
				td1.appendChild(t);
				tr.appendChild(td1);
				
				var td2 = document.createElement("TD");
				var t2 = document.createTextNode(amount);
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
				document.getElementById("amount").value = "";
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
					var str = val.split("\n");
					var newStr = "";
					for(j;j < str.length;j++){
						var values = str[j].split(",");
						
						if(id != values[0]){
							 if(newStr != "")
								newStr = newStr +"\n"+str[j];
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