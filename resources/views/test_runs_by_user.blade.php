@extends('app')

@section('breadcrumbs', Breadcrumbs::render('test-runs-user', $user_id))

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>{{ $theuser['name'] }}</h4>
				</div>

				<div class="panel-body">
					<h4>Tests</h4>

					@foreach ($test_runs as $testRun)
					@include('partials/user/test_run')
					@endforeach
				</div>

				{!! $paginator->render() !!}

			</div>
		</div>
	</div>
</div>
@endsection