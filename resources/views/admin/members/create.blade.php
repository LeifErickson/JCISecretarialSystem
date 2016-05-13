@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.member.management'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.member.management') }}
    </h1>
@stop

@section('content')
<div style="margin-left: 20px">
	<div class="box box-success">
		<div class="box-header">
			<h3 class="box-title">New Member</h3>
			<div class="box-tools pull-left" style="margin-left: 20px">
			  <a href="{{ url('admin/members') }}" class="btn btn-primary pull-right btn-sm">Go Back</a>
			</div>
		</div>
		<div class="box-footer">
			<ul class="nav nav-tabs">
			  <li id="form1" value="form1" class="active"><a data-toggle="tab" href="#first">FORM 1</a></li>
			  <li id="form2" onclick="enableButton('FORM2')" value="form2" ><a data-toggle="tab" href="#second">FORM 2</a></li>
			  <li id="form3" onclick="enableButton('FORM3')" value="form3" style="display:none"><a data-toggle="tab" href="#third">FORM 3</a></li>
			</ul>
		</div>
	</div>
	{!! Form::open(['url' => 'admin/members', 'class' => 'form-horizontal']) !!}
	<div class="tab-content">
			<div id="first" class="tab-pane fade in  active">
				<div class="box box-success">
					<div class="box-body">
						<div class="form-group {{ $errors->has('membershiptype') ? 'has-error' : ''}}">
							 {!! Form::label('membershiptype', 'Membership Type: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								 <!-- {!! Form::text('membershiptype', null, ['class' => 'form-control', 'required' => 'required']) !!}-->
								  <select onchange="disableForm()" class="form-control" id="membershipType" name="membershiptype" required>
										<option value="Baby JC">Baby JC</option>
										<option value="Regular" >Regular</option>
										<option value="Associate" >Associate</option>
								  </select>
								  {!! $errors->first('membershiptype', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('firstname') ? 'has-error' : ''}}">
							 {!! Form::label('firstname', 'First Name: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('firstname', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('firstname', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('lastname') ? 'has-error' : ''}}">
							 {!! Form::label('lastname', 'Last Name: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('lastname', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('lastname', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('middlename') ? 'has-error' : ''}}">
							 {!! Form::label('middlename', 'Middle Name: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('middlename', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('middlename', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('emailaddress') ? 'has-error' : ''}}">
							 {!! Form::label('emailaddress', 'Email Address: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('emailaddress', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('emailaddress', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('cellphonenumber') ? 'has-error' : ''}}">
							 {!! Form::label('cellphonenumber', 'Cellphone Number: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('cellphonenumber', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('cellphonenumber', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('residenceaddress') ? 'has-error' : ''}}">
							 {!! Form::label('residenceaddress', 'Residence Address: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('residenceaddress', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('residenceaddress', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('residencetelephoneno') ? 'has-error' : ''}}">
							 {!! Form::label('residencetelephoneno', 'Residence Telephone no: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('residencetelephoneno', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('residencetelephoneno', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('residencefaxno') ? 'has-error' : ''}}">
							 {!! Form::label('residenceaddress', 'Residence fax no: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('residenceaddress', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('residenceaddress', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
				  <div class="form-group {{ $errors->has('officeaddress') ? 'has-error' : ''}}">
							 {!! Form::label('officeaddress', 'Office Address: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('officeaddress', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('officeaddress', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('officetelephoneno') ? 'has-error' : ''}}">
							 {!! Form::label('officetelephoneno', 'Office telephone no: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('officetelephoneno', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('officetelephoneno', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('officefaxno') ? 'has-error' : ''}}">
							 {!! Form::label('officefaxno', 'Office fax no: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('officefaxno', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('officefaxno', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('nameandaddressofcompany') ? 'has-error' : ''}}">
							 {!! Form::label('nameandaddressofcompany', 'Name and Address of company: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('nameandaddressofcompany', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('nameandaddressofcompany', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
				  </div>
				</div>
			</div>
			<div id="second"  class="tab-pane fade">
				<div class="box box-success">
					<div class="box-body">
						<div class="form-group {{ $errors->has('membersince') ? 'has-error' : ''}}">
							 {!! Form::label('membersince', 'Member since: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('membersince', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('membersince', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('profession') ? 'has-error' : ''}}">
							 {!! Form::label('profession', 'Profession: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('profession', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('profession', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('companyposition') ? 'has-error' : ''}}">
							 {!! Form::label('companyposition', 'Company position: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('companyposition', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('companyposition', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('gender') ? 'has-error' : ''}}">
							 {!! Form::label('gender', 'Gender: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('gender', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('gender', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('religion') ? 'has-error' : ''}}">
							 {!! Form::label('religion', 'Religion: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('religion', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('religion', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('birthdate') ? 'has-error' : ''}}">
							 {!! Form::label('birthdate', 'Birthdate: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::date('birthdate', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('birthdate', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('placeofbirth') ? 'has-error' : ''}}">
							 {!! Form::label('placeofbirth', 'Place of Birth: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('placeofbirth', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('placeofbirth', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('elementaryschool') ? 'has-error' : ''}}">
							 {!! Form::label('elementaryschool', 'Elementary School Name: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('elementaryschool', null, ['class' => 'form-control', 'required' => 'required']) !!}
								  {!! $errors->first('elementaryschool', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('elementaryyeargrad') ? 'has-error' : ''}}">
							 {!! Form::label('elementaryyeargrad', 'Elementary Year Graduated: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('elementaryyeargrad', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('elementaryyeargrad', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('collegeschool') ? 'has-error' : ''}}">
							 {!! Form::label('collegeschool', 'College School Name: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('collegeschool', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('collegeschool', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('coursetaken') ? 'has-error' : ''}}">
							 {!! Form::label('coursetaken', 'Course(s) taken: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('coursetaken', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('coursetaken', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('collegeyeargraduated') ? 'has-error' : ''}}">
							 {!! Form::label('collegeyeargraduated', 'College year graduated: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('collegeyeargraduated', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('collegeyeargraduated', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('memberstatus') ? 'has-error' : ''}}">
							 {!! Form::label('memberstatus', 'Member status: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('memberstatus', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('memberstatus', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('lomhighestposition') ? 'has-error' : ''}}">
							 {!! Form::label('lomhighestposition', 'lomhighestposition: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('lomhighestposition', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('lomhighestposition', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
					</div>
				</div>
			</div>
			<div id="third"  class="tab-pane fade">
				<div class="box box-success">
					<div class="box-body">
						<div class="form-group {{ $errors->has('lomhighestpositionyear') ? 'has-error' : ''}}">
							 {!! Form::label('lomhighestpositionyear', 'Lom Highest Position Year: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('lomhighestpositionyear', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('lomhighestpositionyear', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('lomawardsrecieved') ? 'has-error' : ''}}">
							 {!! Form::label('lomawardsrecieved', 'Lom Awards Recieved: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('lomawardsrecieved', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('lomawardsrecieved', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('areahighestposition') ? 'has-error' : ''}}">
							 {!! Form::label('areahighestposition', 'Area Highest Position: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('areahighestposition', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('areahighestposition', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('areahighestpositionyear') ? 'has-error' : ''}}">
							 {!! Form::label('areahighestpositionyear', 'Area Highest Position Year: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('areahighestpositionyear', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('areahighestpositionyear', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('regionalhighestposition') ? 'has-error' : ''}}">
							 {!! Form::label('regionalhighestposition', 'Regional Highest Position: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('regionalhighestposition', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('regionalhighestposition', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('regionalhighestpositionyear') ? 'has-error' : ''}}">
							 {!! Form::label('regionalhighestpositionyear', 'Regional Highest Position Year: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('regionalhighestpositionyear', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('regionalhighestpositionyear', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('regionalawardsrecieved') ? 'has-error' : ''}}">
							 {!! Form::label('regionalawardsrecieved', 'Regional Awards Recieved: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('regionalawardsrecieved', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('regionalawardsrecieved', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('highestjcinternationalposition') ? 'has-error' : ''}}">
							 {!! Form::label('highestjcinternationalposition', 'Highest JCInternational Position: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('highestjcinternationalposition', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('highestjcinternationalposition', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('highestjcinternationalpositionyear') ? 'has-error' : ''}}">
							 {!! Form::label('highestjcinternationalpositionyear', 'Highest JCInternational Position Year: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('highestjcinternationalpositionyear', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('highestjcinternationalpositionyear', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('internationalawardsrecieved') ? 'has-error' : ''}}">
							 {!! Form::label('internationalawardsrecieved', 'International Awards Recieved: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('internationalawardsrecieved', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('internationalawardsrecieved', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('jcisenatorialno') ? 'has-error' : ''}}">
							 {!! Form::label('jcisenatorialno', 'Jci senatorial no: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::text('jcisenatorialno', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('jcisenatorialno', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
						<div class="form-group {{ $errors->has('dateofinduction') ? 'has-error' : ''}}">
							 {!! Form::label('dateofinduction', 'Date of induction: ', ['class' => 'col-sm-3 control-label']) !!}
							 <div class="col-sm-6">
								  {!! Form::date('dateofinduction', null, ['class' => 'form-control']) !!}
								  {!! $errors->first('dateofinduction', '<p class="help-block">:message</p>') !!}
							 </div>
						</div>
					</div>
				</div>
			</div>
		</div>
<!--
<div id="page_menus">
    <a id="get_first" style="cursor:pointer; font-size:45px">1</a>
    <a id="get_second" style="cursor:pointer; font-size:45px; margin-left: 30px;">2</a>
    <a id="get_third" style="cursor:pointer; font-size:45px; margin-left: 25px;">3</a>
</div>
-->
<div class="box box-success">
	<div class="box-header">
		 <div class="form-group">
			  <div class="col-sm-offset-9 col-sm-3">
					{!! Form::submit('Create', ['id' => 'submit','class' => 'btn btn-block btn-info btn-lg','disabled'=> 'true']) !!}
			 </div>
		 </div>
	 </div>
</div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>
@stop

@section('before-scripts-end')
    <script>
		function disableForm()
		{	
			var val = document.getElementById('membershipType').value;
			if(val == "Associate"){
				document.getElementById('form3').style.display = "";
			} else {
				document.getElementById('form3').style.display = "none";
			}
			
		}
		function enableButton(a)
		{	
			var val = document.getElementById('membershipType').value;
			
			if(val != "Associate"){
				document.getElementById('submit').disabled = false;
			} else if(a == "FORM3"){
				document.getElementById('submit').disabled = false;
			} else {
				document.getElementById('submit').disabled = true;
			}
			//document.getElementById('form3').style.display = "none";
		}
	 /*
        $('#first').show()
        $('#second').hide()
        $('#third').hide()
        $('#fourth').hide()
        $('#get_first').click(function(){
            $('#first').show()
            $('#second').hide()
            $('#third').hide()
            $('#fourth').hide()
            $(this).click(function(){ 
                $('html,body').animate({ scrollTop: 0 }, 'slow');
                return false; 
            });
        })
        $('#get_second').click(function(){
            $('#first').hide()
            $('#second').show()
            $('#third').hide()
            $('#fourth').hide()
            $(this).click(function(){ 
                $('html,body').animate({ scrollTop: 0 }, 'slow');
                return false; 
            });
        })
        $('#get_third').click(function(){
            $('#first').hide()
            $('#second').hide()
            $('#third').show()
            $('#fourth').show()
            $(this).click(function(){ 
                $('html,body').animate({ scrollTop: 0 }, 'slow');
                return false; 
            });
        })
        jQuery(function(){
           jQuery('#get_third').click();
        });
        jQuery(function(){
           jQuery('#get_second').click();
        });
        jQuery(function(){
           jQuery('#get_first').click();
        });
*/
    </script>
@stop