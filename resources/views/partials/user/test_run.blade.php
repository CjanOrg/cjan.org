<div class='test_run col-md-4'>

<table class='table table-bordered table-striped'>
	<tr>
		<th colspan='2'>
			<h4 class='text-center'>
				{{ $testRun['project_version']['project_artifact']['name'] }}-{{ $testRun['project_version']['name'] }}
			</h4>
		</th>
	</tr>
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
			{{ $testRun['created_at'] }}</a>
		</td>
	</tr>
	@if ($theuser['name'] == Auth::user()->name)
	<tr>
		<td colspan="2" class='text-center'>
			<a href="{{ url('/u/' . $theuser['name'] . '/tests/' . $testRun['id'] . '/delete') }}" class='delete_test_run btn btn-danger'><i class='glyphicon glyphicon-remove'></i> Delete</a>
		</td>
	</tr>
	@endif
</table>

</div>