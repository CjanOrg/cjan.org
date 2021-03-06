@extends('app')

@section('breadcrumbs', Breadcrumbs::render('user', $id))

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>{{ $theuser['name'] }}</h4>
				</div>

				<div class="panel-body">
					<p>Tested {{ $projects_count }} projects, <a href="{{ url('/u/' . $theuser['name'] . '/tests/') }}">{{ $tests_count }} tests</a></p>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection