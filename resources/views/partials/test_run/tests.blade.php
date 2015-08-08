<p><strong>Tests</strong></p>

<table class='table table-bordered'>
<thead>
	<tr>
	<th>Name</th>
	<th>Metadata</th>
	<th>Status</th>
	</tr>
</thead>
<tbody>
@foreach ($tests as $test)
	<tr>
	<td>{{ $test['name'] }}</td>
	<td>{{ $test['metadata'] }}</td>
	<td>
		@if ($test['status_id'] == 1)
		<span class="glyphicon glyphicon-ok" aria-hidden="true" style='color: green'></span>
		@elseif ($test['status_id'] == 2)
		<span class="glyphicon glyphicon-remove" aria-hidden="true" style='color: red'></span>
		@elseif ($test['status_id'] == 3)
		<span class="glyphicon glyphicon-flag" aria-hidden="true" style='color: yellow'></span>
		@else
		<span class="glyphicon glyphicon-question-sign" aria-hidden="true" style='color: gray'></span>
		@endif
	</td>
	</tr>
@endforeach
</tbody>
</table>

{!! $paginator->render() !!}