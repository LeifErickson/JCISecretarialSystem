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
							<h3 class="box-title">Sponsor</h3>
							<button  onclick="addSponsor()"class="btn btn-info pull-right" type="submit">Add Sponsor</button>
						</div>
							<div id="Sponsorbody" class="box-body">
								<div class="form-group">
									<input class="form-control" type="text" name="Amount" placeholder="Amount">
								</div>
							</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
@endsection

@section('after-scripts-end')
		 <script src="{{ URL::asset('ckeditor/ckeditor.js') }}"></script>
		<script>
		// Replace the <textarea id="editor1"> with a CKEditor
		// instance, using default configuration.
		CKEDITOR.replace( 'editor1' );
		
		// add sponsor Textfield
		var sponsors = 0;
		function addSponsor(){
			var element = document.getElementById("Sponsorbody");
			var div = document.createElement("DIV");
			var input = document.createElement("INPUT");
			div.className = "form-group";
			input.className = "form-control";
			input.placeholder  = "Amount";
			div.appendChild(input);
			
			element.appendChild(div);
		}
		</script>
@stop