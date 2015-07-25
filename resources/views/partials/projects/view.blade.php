<div class='project col-md-3'>
	<h4><a href="{{ url('/projects/' . $project['id']) }}">{{{ $project['name'] }}}</a></h4>

	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>groupId</th>
				<th>artifactId</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{{ $project['project_group_id']['name'] }}}</td>
				<td>{{{ $project['name'] }}}</td>
			</tr>
		</tbody>
	</table>

</div>