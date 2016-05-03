<table class="table table-bordered">
<!-- Id Field -->
   <tr>
		<td class="col-md-3" >{!! Form::label('id', 'ID:') !!}</td>
		<td>{!! $project->id !!}</td>
	</tr>

<!-- Name Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('name', 'Name:') !!}</td>
		<td>{!! $project->name !!}</td>
	</tr>
</div>

<!-- Description Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('description', 'Description:') !!}</td>
		<td>{!! $project->description !!}</td>
	</tr>
</div>

<!-- Chapter Field -->
<div class="form-group">
	<tr>
	<td>{!! Form::label('chapter', 'Chapter:') !!}</td>
		<td>{!! $project->chapter !!}</td>
	</tr>
</div>

<!-- Mailingaddress Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('mailingaddress', 'Mailing Address:') !!}</td>
		<td>{!! $project->mailingaddress !!}</td>
	</tr>
</div>	

<!-- Nationalorganization Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('nationalorganization', 'National Organization:') !!}</td>
		<td>{!! $project->nationalorganization !!}</td>
	</tr>
</div>

<!-- Objectives Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('objectives', 'Objectives:') !!}</td>
		<td>{!! $project->objectives !!}</td>
	</tr>
</div>

<!-- Actiontaken Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('actiontaken', 'Action Taken:') !!}</td>
		<td>{!! $project->actiontaken !!}</td>
	</tr>
</div>

<!-- Results Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('results', 'Results:') !!}</td>
		<td>{!! $project->results !!}</td>
	</tr>
</div>

<!-- Recommendation Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('recommendation', 'Recommendation:') !!}</td>
		<td>{!! $project->recommendation !!}</td>
	</tr>
</div>

<!-- Datebegun Field -->
<div class="form-group">
	<tr>
		<td> {!! Form::label('datebegun', 'Date Begun:') !!}</td>
		<td>{!! $project->datebegun !!}</td>
	</tr>
</div>

<!-- Datecompleted Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('datecompleted', 'Date Completed:') !!}</td>
		<td>{!! $project->datecompleted !!}</td>
	</tr>
</div>

<!-- Totalincomeprojected Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('totalincomeprojected', 'Total in Come Projected:') !!}</td>
		<td>{!! $project->totalincomeprojected !!}</td>
	</tr>
</div>

<!-- Expendituresprojected Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('expendituresprojected', 'Expenditures Projected:') !!}</td>
		<td>{!! $project->expendituresprojected !!}</td>
	</tr>
</div>

<!-- Approvedbychairman Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('approvedbychairman', 'Approved By Chairman:') !!}</td>
		<td>{!! $project->approvedbychairman !!}</td>
	</tr>
</div>

<!-- Numberofvolunteers Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('numberofvolunteers', 'Number of Volunteers:') !!}</td>
		<td>{!! $project->numberofvolunteers !!}</td>
	</tr>
</div>

<!-- Totalincomeannual Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('totalincomeannual', 'Total Income Annual:') !!}</td>
		<td>{!! $project->totalincomeannual !!}</td>
	</tr>
</div>

<!-- Expendituresactual Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('expendituresactual', 'Expenditures Actual:') !!}</td>
		<td>{!! $project->expendituresactual !!}</td>
	</tr>
</div>

<!-- Approvedbychapterpresident Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('approvedbychapterpresident', 'Approved by Chapter President:') !!}</td>
		<td>{!! $project->approvedbychapterpresident !!}</td>
	</tr>
</div>

<!-- Created At Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('created_at', 'Created At:') !!}</td>
		<td>{!! $project->created_at !!}</td>
	</tr>
</div>

<!-- Updated At Field -->
<div class="form-group">
	<tr>
		<td>{!! Form::label('updated_at', 'Updated At:') !!}</td>
		<td>{!! $project->updated_at !!}</td>
	</tr>
</div>
</table>
