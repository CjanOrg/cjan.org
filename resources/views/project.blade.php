@extends('app')

@section('breadcrumbs', Breadcrumbs::render('project', $letter, $project))

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>{{ $project['project_group_id']['name'] }}:{{ $project['name'] }}</strong>
				</div>

				<div class="panel-body">
					<h4>Versions</h4>

					@foreach ($project['project_versions'] as $version)
						@include ('partials/projects/version')
					@endforeach

				</div>

			</div>
		</div>
	</div>
</div>
@endsection