<table class="table table-bordered">
<!-- Id Field -->
   <tr>
		<td class="col-md-3" >{!! Form::label('id', 'ID:') !!}</td>
		<td>{!! $project->id !!}</td>
	</tr>

<!-- Name Field -->

	<tr>
		<td>{!! Form::label('name', 'Name:') !!}</td>
		<td>{!! $project->name !!}</td>
	</tr>


<!-- Description Field -->

	<tr>
		<td>{!! Form::label('description', 'Description:') !!}</td>
		<td>{!! $project->description !!}</td>
	</tr>


<!-- Chapter Field -->

	<tr>
	<td>{!! Form::label('chapter', 'Chapter:') !!}</td>
		<td>{!! $project->chapter !!}</td>
	</tr>


<!-- Mailingaddress Field -->

	<tr>
		<td>{!! Form::label('mailingaddress', 'Mailing Address:') !!}</td>
		<td>{!! $project->mailingaddress !!}</td>
	</tr>
	

<!-- Nationalorganization Field -->

	<tr>
		<td>{!! Form::label('nationalorganization', 'National Organization:') !!}</td>
		<td>{!! $project->nationalorganization !!}</td>
	</tr>


<!-- Objectives Field -->

	<tr>
		<td>{!! Form::label('objectives', 'Objectives:') !!}</td>
		<td>{!! $project->objectives !!}</td>
	</tr>


<!-- Actiontaken Field -->

	<tr>
		<td>{!! Form::label('actiontaken', 'Action Taken:') !!}</td>
		<td>{!! $project->actiontaken !!}</td>
	</tr>


<!-- Results Field -->

	<tr>
		<td>{!! Form::label('results', 'Results:') !!}</td>
		<td>{!! $project->results !!}</td>
	</tr>


<!-- Recommendation Field -->

	<tr>
		<td>{!! Form::label('recommendation', 'Recommendation:') !!}</td>
		<td>{!! $project->recommendation !!}</td>
	</tr>


<!-- Datebegun Field -->

	<tr>
		<td> {!! Form::label('datebegun', 'Date Begun:') !!}</td>
		<td>{!! $project->datebegun !!}</td>
	</tr>


<!-- Datecompleted Field -->

	<tr>
		<td>{!! Form::label('datecompleted', 'Date Completed:') !!}</td>
		<td>{!! $project->datecompleted !!}</td>
	</tr>


<!-- Totalincomeprojected Field -->

	<tr>
		<td>{!! Form::label('totalincomeprojected', 'Total in Come Projected:') !!}</td>
		<td>{!! $project->totalincomeprojected !!}</td>
	</tr>


<!-- Expendituresprojected Field -->

	<tr>
		<td>{!! Form::label('expendituresprojected', 'Expenditures Projected:') !!}</td>
		<td>{!! $project->expendituresprojected !!}</td>
	</tr>


<!-- Approvedbychairman Field -->

	<tr>
		<td>{!! Form::label('approvedbychairman', 'Approved By Chairman:') !!}</td>
		<td>{!! $project->approvedbychairman !!}</td>
	</tr>


<!-- Numberofvolunteers Field -->

	<tr>
		<td>{!! Form::label('numberofvolunteers', 'Number of Volunteers:') !!}</td>
		<td>{!! $project->numberofvolunteers !!}</td>
	</tr>


<!-- Totalincomeannual Field -->

	<tr>
		<td>{!! Form::label('totalincomeannual', 'Total Income Annual:') !!}</td>
		<td>{!! $project->totalincomeannual !!}</td>
	</tr>


<!-- Expendituresactual Field -->

	<tr>
		<td>{!! Form::label('expendituresactual', 'Expenditures Actual:') !!}</td>
		<td>{!! $project->expendituresactual !!}</td>
	</tr>


<!-- Approvedbychapterpresident Field -->

	<tr>
		<td>{!! Form::label('approvedbychapterpresident', 'Approved by Chapter President:') !!}</td>
		<td>{!! $project->approvedbychapterpresident !!}</td>
	</tr>


<!-- Created At Field -->

	<tr>
		<td>{!! Form::label('created_at', 'Created At:') !!}</td>
		<td>{!! $project->created_at !!}</td>
	</tr>


<!-- Updated At Field -->

	<tr>
		<td>{!! Form::label('updated_at', 'Updated At:') !!}</td>
		<td>{!! $project->updated_at !!}</td>
	</tr>

</table>
