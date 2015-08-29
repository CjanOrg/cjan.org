@extends('app')

@section('breadcrumbs', Breadcrumbs::render('version', $letter, $project, $version))

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>{{ $project['project_group_id']['name'] }}:{{ $project['name'] }}-{{{ $version['name'] }}}</strong>
				</div>

				<div class="panel-body">
					<h4>Tests</h4>

					@include ('partials/versions/filter')

					@foreach ($testRuns as $testRun)
					@include('partials/versions/test_run')
					@endforeach
				</div>

			</div>
		</div>
	</div>
</div>
@endsection