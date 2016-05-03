<table class="table table-responsive" id="projects-table">
    <thead>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Chapter</th>
<!--         <th>Mailingaddress</th>
        <th>Nationalorganization</th>
        <th>Objectives</th>
        <th>Actiontaken</th>
        <th>Results</th>
        <th>Recommendation</th> -->
        <th>Datebegun</th>
        <th>Datecompleted</th>
<!--         <th>Totalincomeprojected</th>
        <th>Expendituresprojected</th>
        <th>Approvedbychairman</th>
        <th>Numberofvolunteers</th>
        <th>Totalincomeannual</th>
        <th>Expendituresactual</th>
        <th>Approvedbychapterpresident</th> -->
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($projects as $project)
        <tr>
            <td>{!! $project->id !!}</td>
            <td>{!! $project->name !!}</td>
            <td>{!! $project->description !!}</td>
            <td>{!! $project->chapter !!}</td>
<!--             <td>{!! $project->mailingaddress !!}</td>
            <td>{!! $project->nationalorganization !!}</td>
            <td>{!! $project->objectives !!}</td>
            <td>{!! $project->actiontaken !!}</td>
            <td>{!! $project->results !!}</td>
            <td>{!! $project->recommendation !!}</td> -->
            <td>{!! $project->datebegun !!}</td>
            <td>{!! $project->datecompleted !!}</td>
<!--             <td>{!! $project->totalincomeprojected !!}</td>
            <td>{!! $project->expendituresprojected !!}</td>
            <td>{!! $project->approvedbychairman !!}</td>
            <td>{!! $project->numberofvolunteers !!}</td>
            <td>{!! $project->totalincomeannual !!}</td>
            <td>{!! $project->expendituresactual !!}</td>
            <td>{!! $project->approvedbychapterpresident !!}</td> -->
            <td>
                {!! Form::open(['route' => ['admin.projects.destroy', $project->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('admin.events.projects.show', [$project->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('admin.events.projects.edit', [$project->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>