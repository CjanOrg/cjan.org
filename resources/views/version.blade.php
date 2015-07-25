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
					<!-- TODO: text matrix -->
				</div>

			</div>
		</div>
	</div>
</div>
@endsection