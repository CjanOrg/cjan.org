@extends('app')

@section('breadcrumbs', Breadcrumbs::render('test-runs-user-confirm', $user_id, $test_run['id']))

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4>{{ $theuser['name'] }}</h4>
				</div>

				<div class="panel-body">
					<p>Confirm to delete?</p>

					<p>
						
					</p>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection