@extends('backend.layouts.master')

@section('page-header')
    <h2>
        Add Event
    </h2>
	 
@endsection
@section('content')
    <div id="page-wrapper">
		<div class="container-fluid">
			 <div class="row">
				<div class="col-md-8">
					<div class="box box-primary">
						{{  Form::open(array('url' => 'admin/events/addEvent', 'method' => 'post')) }}
							<div class="box-header with-border">
								<div class="form-group">
									{{ Form::text('title', null,  array('placeholder'=>'Title','class' => 'form-control')) }}
								</div>
							</div>
							<div class="box-body">
								<div class="form-group">
									{{ Form::textarea('description', null, array(
											 'id'      => 'editor1',
											 'rows'    => 10,
										))
									}}
								</div>
							</div>
							<div class="box-footer">
								<div class="form-group">
									<button class="btn btn-info pull-right" type="submit" >Publish</button>
									
								</div>
							</div>
						{{ Form::close() }}
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
										<input name="date" id="datepicker" class="form-control" type="text" placeholder="Event Set">
										<div class="input-group-btn">
											<button class="btn btn-primary btn-flat">
												<i class="fa fa-calendar"></i>
											</button>
										</div>
									</div>
								</div>
							</div>
					</div>
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">Sponsor(s)</h3>
						</div>
						<div id="Sponsorbody" class="box-body">
							<div class="form-group">
								<input id="sponsor_id" name="sponsor_id" class="form-control" type="hidden" />
								<input id="name"  autocomplete="off" onkeyup="showResult(this.value)" class="form-control" type="text" placeholder="Name" required />
								<div id="livesearch"></div>
								
							</div>
							<div class="form-group">
								<input class="form-control" type="number" placeholder="Amount" required/>
							</div>
						</div>
						<div  class="box-footer">
							<button  class="btn btn-info pull-right" type="submit">Add Sponsor</button>
						</div>
					</div>					
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">Add Sponsor</h3>
						</div>
						<div id="Sponsorbody" class="box-body">
							<div class="form-group">
								<input id="sponsor_id" name="sponsor_id" class="form-control" type="hidden" />
								<input id="name"  autocomplete="off" onkeyup="showResult(this.value)" class="form-control" type="text" placeholder="Name" required />
								<div id="livesearch"></div>
								
							</div>
							<div class="form-group">
								<input class="form-control" type="number" placeholder="Amount" required/>
							</div>
						</div>
						<div  class="box-footer">
							<button  class="btn btn-info pull-right" type="submit">Add Sponsor</button>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
@endsection

@section('after-scripts-end')
		 <script src="{{ URL::asset('datepicker/test.js') }}"></script>
		 <script src="{{ URL::asset('datepicker/test2.js') }}"></script>
		 
		 <script src="{{ URL::asset('ckeditor/ckeditor.js') }}"></script>
		 
		 
		<script>
		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace( 'editor1' );
		
		// add sponsor Textfield
		var spo_id = 0;
		function addSponsor(){
			var element = document.getElementById("Sponsorbody");
			var div = document.createElement("DIV");
			var input = document.createElement("INPUT");
			div.className = "form-group";
			input.className = "form-control";
			input.placeholder  = "Amount";
			input.setAttribute("id", "test");
			input.onkeyup = function(){showResult(this.value)};
			div.appendChild(input);
			
			element.appendChild(div);
			spo_id++;
		}
		
		function setVal(a,b){
			//alert('test');
			document.getElementById("sponsor_id").value = a;
			document.getElementById("name").value = b;
			document.getElementById("livesearch").innerHTML = "";
		}
		
		
		  $(function() {
			 
			 $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
		  });
		  
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
			  }
			  
			  xmlhttp.open("GET","searchPage/"+str,true);
			  xmlhttp.send();
			  
			}
		</script>
@stop