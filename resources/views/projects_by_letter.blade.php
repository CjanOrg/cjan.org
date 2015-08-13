@extends('app')

@section('breadcrumbs', Breadcrumbs::render('projects-by-letter', $letter))

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Projects</div>

				<div class="panel-body">
				@if (isset($letter))
					<p><strong>Listing of projects starting with {{ $letter }}</strong></p>
					@if (isset($projects) and !empty($projects))
						@foreach ($projects as $project)
							@include('partials/projects/view')
						@endforeach
					@else
					<p>Wow! We still don't have any projects starting with {{ $letter }}. Read our <a href="{{ url('/getting-started') }}">Getting Started</a> guide and contribute with your tests.</p>
					@endif
				@endif
				</div>

				{!! $paginator->render() !!}

			</div>
		</div>
	</div>
</div>
@endsection