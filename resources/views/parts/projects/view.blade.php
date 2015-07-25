<div class='project col-md-3'>
	<h4>{{{ $project['name'] }}}</h4>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>groupId</th>
				<th>artifactId</th>
				<th>versions</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{{ $project['project_group_id']['name'] }}}</td>
				<td>{{{ $project['name'] }}}</td>
				<td>{{{ count($project['project_versions']) }}}</td>
			</tr>
		</tbody>
	</table>

</div>