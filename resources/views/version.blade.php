@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>{{ $project['project_group_id']['name'] }}:{{ $project['name'] }}-{{{ $version['name'] }}}</strong>
				</div>

				<div class="panel-body">
					@foreach ($testRuns as $testRun)
					@include('partials/versions/test_run')
					@endforeach
				</div>

			</div>
		</div>
	</div>
</div>
@endsection