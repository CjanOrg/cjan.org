<div class='test_run col-md-4'>

<table class='table table-bordered table-striped'>
	<tr>
		<th>Status</th>
		<td>
			@if ($testRun['status_id'] == 1)
			<span class="glyphicon glyphicon-ok" aria-hidden="true" style='color: green'></span>
			@elseif ($testRun['status_id'] == 2)
			<span class="glyphicon glyphicon-remove" aria-hidden="true" style='color: red'></span>
			@elseif ($testRun['status_id'] == 3)
			<span class="glyphicon glyphicon-flag" aria-hidden="true" style='color: yellow'></span>
			@else
			<span class="glyphicon glyphicon-question-sign" aria-hidden="true" style='color: gray'></span>
			@endif	
		</td>
	</tr>
	<tr>
		<th>JVM</th>
		<td>
			{{ $testRun['java_version']['java_vendor']['name'] }}-{{ $testRun['java_version']['name'] }}
		</td>
	</tr>
	<tr>
		<th>Time zone</th>
		<td>
			{{ $testRun['timezone'] }}
		</td>
	</tr>
	<tr>
		<th>Locale</th>
		<td>
			{{ $testRun['locale'] }}
		</td>
	</tr>
	<tr>
		<th>Platform encoding</th>
		<td>
			{{ $testRun['platform_encoding'] }}
		</td>
	</tr>
	<tr>
		<th>Created</th>
		<td>
			{{ $testRun['created_at'] }} / <a href="{{ url('/u/'.$testRun['user']['name']) }}">{{ $testRun['user']['name'] }}</a>
		</td>
	</tr>
	<tr>
		<td colspan='2'>
			<a href="{{ url('/projects/' . $project['id'] . '/versions/' . $version['id'] . '/testruns/' . $testRun['id']) }}">{{ $testRun['tests_count'][0]['aggregate'] }} tests <span class="glyphicon glyphicon-share-alt" aria-hidden="true"></span></a>
		</td>
	</tr>
</table>

</div>