<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Chapter Field -->
<div class="form-group col-sm-6">
    {!! Form::label('chapter', 'Chapter:') !!}
    {!! Form::text('chapter', null, ['class' => 'form-control']) !!}
</div>

<!-- Mailingaddress Field -->
<div class="form-group col-sm-6">
    {!! Form::label('mailingaddress', 'Mailing address:') !!}
    {!! Form::text('mailingaddress', null, ['class' => 'form-control']) !!}
</div>

<!-- Nationalorganization Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nationalorganization', 'National organization:') !!}
    {!! Form::text('nationalorganization', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['id'=> 'editor1','class' => 'form-control']) !!}
</div>

<!-- Objectives Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('objectives', 'Objectives:') !!}
    {!! Form::textarea('objectives', null, ['class' => 'form-control']) !!}
</div>

<!-- Actiontaken Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('actiontaken', 'Action taken:') !!}
    {!! Form::textarea('actiontaken', null, ['class' => 'form-control']) !!}
</div>

<!-- Results Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('results', 'Results Achieved:') !!}
    {!! Form::textarea('results', null, ['class' => 'form-control']) !!}
</div>

<!-- Recommendation Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('recommendation', 'Recommendation:') !!}
    {!! Form::textarea('recommendation', null, ['class' => 'form-control']) !!}
</div>

<!-- Datebegun Field -->
<?php 
if(isset($dates)){
foreach($dates as $date){?>
<div class="form-group col-sm-6">
    {!! Form::label('datebegun', 'Date begun:') !!}
	 <div class="input-group">
			<input type="date" name="datebegun" class="form-control" value="<?php echo $date->datebegun; ?>">
			<div class="input-group-btn">
				<div class="btn btn-primary btn-flat">
					<i class="fa fa-calendar"></i>
				</div>
			</div>
		</div>
</div>

<!-- Datecompleted Field -->
<div class="form-group col-sm-6">
    {!! Form::label('datecompleted', 'Date completed:') !!}
		<div class="input-group">
			<input type="date" name="datecompleted" class="form-control" value="<?php echo $date->datecompleted; ?>">
			<div class="input-group-btn">
				<div class="btn btn-primary btn-flat">
					<i class="fa fa-calendar"></i>
				</div>
			</div>
		</div>
</div>
<?php } } else {?>
<div class="form-group col-sm-6">
    {!! Form::label('datebegun', 'Date begun:') !!}
	 <div class="input-group">
			<input type="date" name="datebegun" class="form-control" >
			<div class="input-group-btn">
				<div class="btn btn-primary btn-flat">
					<i class="fa fa-calendar"></i>
				</div>
			</div>
		</div>
</div>

<div class="form-group col-sm-6">
    {!! Form::label('datecompleted', 'Date completed:') !!}
		<div class="input-group">
			<input type="date" name="datecompleted" class="form-control" >
			<div class="input-group-btn">
				<div class="btn btn-primary btn-flat">
					<i class="fa fa-calendar"></i>
				</div>
			</div>
		</div>
</div>
<?php } ?>
<!-- Totalincomeprojected Field -->
<div class="form-group col-sm-6">
    {!! Form::label('totalincomeprojected', 'Total Income projected:') !!}
    {!! Form::number('totalincomeprojected', null, ['class' => 'form-control']) !!}
</div>

<!-- Expendituresprojected Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expendituresprojected', 'Expenditures projected:') !!}
    {!! Form::number('expendituresprojected', null, ['class' => 'form-control']) !!}
</div>

<!-- Expendituresprojected Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numberofmembercom', 'Number of Members on the Committee:') !!}
    {!! Form::number('numberofmembercom', null, ['class' => 'form-control']) !!}
</div>

<!-- Numberofvolunteers Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numberofvolunteers', 'Number of other volunteers:') !!}
    {!! Form::number('numberofvolunteers', null, ['class' => 'form-control']) !!}
</div>

<!-- Totalincomeannual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('totalincomeannual', 'Total income annual:') !!}
    {!! Form::number('totalincomeannual', null, ['class' => 'form-control']) !!}
</div>

<!-- Expendituresactual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('expendituresactual', 'Expenditures actual:') !!}
    {!! Form::number('expendituresactual', null, ['class' => 'form-control']) !!}
</div>

<!-- Approvedbychairman Field -->
<div class="form-group col-sm-12">
    {!! Form::label('approvedbychairman', 'Approved by chairman:') !!}
    <label class="radio-inline">
        {!! Form::radio('approvedbychairman', "Yes", null) !!} Yes
    </label>
    <label class="radio-inline">
        {!! Form::radio('approvedbychairman', "No", null) !!} No
    </label>
</div>

<!-- Approvedbychapterpresident Field -->
<div class="form-group col-sm-12">
    {!! Form::label('approvedbychapterpresident', 'Approved by chapter president:') !!}
    <label class="radio-inline">
        {!! Form::radio('approvedbychapterpresident', "Yes", null) !!} Yes
    </label>
    <label class="radio-inline">
        {!! Form::radio('approvedbychapterpresident', "No", null) !!} No
    </label>
</div>
