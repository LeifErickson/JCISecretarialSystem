@extends ('backend.layouts.master')
@section('page-header')
    <h1>
       Template
        <small> header</small>
    </h1>
@stop

@section('content')
<div class="box box-success">
	<div class="box-header">
		<h3 class="box-title">Header Images</h3>
		</hr>
	</div>
	<div class="box-body">
			{{  Form::open(array('url' => 'admin/template/saveH', 'method' => 'post','class'=>'form-horizontal')) }}
			<?php
				$count = 1;
				foreach($images as $image){
					echo "
					<div class='form-group'>
						 <label for='header$count' class='col-sm-4 control-label' >Image $count: </label>  
						 <div class='col-sm-6'>
							<input name='header$count' class='form-control' value='$image' type='url' required  />
						 </div>
					</div>";
					$count++;
				}
			
			?>
	</div>
	<div class="box-body">
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-3">
				<button class="btn btn-primary form-control " type="submit" >Save</button>
			</div>
		</div>
		{{ Form::close() }}
   </div>
</div> 
@stop

