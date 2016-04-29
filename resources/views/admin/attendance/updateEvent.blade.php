@extends('backend.layouts.master')

@section('page-header')
    <h2>
        Events
    </h2>
@endsection
@section('content')
    <div id="page-wrapper">
		<div class="container-fluid">
			 <div class="row">
				<div class="col-md-8">
					<div class="box box-primary">
						{{  Form::open(array('url' => 'admin/event/updateEvent', 'method' => 'post')) }}
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
									<!--<button class="btn btn-info pull-right" type="submit">Publish</button>-->
									{{ Form::submit('Publish', null,  array('class' => 'form-control',)) }}
								</div>
							</div>
							<?php } ?>
						{{ Form::close() }}
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
		</script>
@stop