<div class='version col-md-3'>
	<h4><a href="{{ url('/projects/' . $project['id']) . '/versions/' . $version['id'] }}">{{{ $version['name'] }}}</a></h4>
	@if ($version['snapshot'])
	<p>SNAPSHOT? &mdash; <strong>YES</strong></p>
	@else
	<p>SNAPSHOT? &mdash; <strong>NO</strong></p>
	@endif
</div>