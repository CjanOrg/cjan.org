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

					<div class="btn-group" role="group" aria-label="confirm-delete-buttons-yes-no">
						{!! Form::open(
								array(
									'url' => url(
										sprintf('/u/%s/tests/%d/delete', $theuser['name'], $test_run['id'])
									), 
									'method' => 'POST', 
									'class' => 'form-inline'
								)
							)
						!!}
							<input type='hidden' name='redirect' value='{{ URL::previous() }}'>
							<input type="submit" class="btn btn-danger" value="Delete">
							<a href="{{ URL::previous() }}" class="btn ">Cancel</a>
						{!! Form::close() !!}
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection