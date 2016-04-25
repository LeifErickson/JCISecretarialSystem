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
						<form>
							<div class="box-header with-border">
								<div class="form-group">
									<input type="text" placeholder="title" class="form-control">
								</div>
							</div>
							<div class="box-body">
								<div class="form-group">
									<textarea name="editor1"  class="form-control" id="editor1" ></textarea>
								</div>
							</div>
							<div class="box-footer">
								<div class="form-group">
									<button class="btn btn-info pull-right" type="submit">Publish</button>
								</div>
							</div>
						</form>
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