@extends('app')

@section('breadcrumbs', Breadcrumbs::render('featured-projects'))

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					<p>Choose a project by the first letter of its name, and browse the test results.</p>

				@if (isset($letter))
					<p><strong>Featured projects</strong></p>
					@if (isset($projects) and !empty($projects))
						<?php 
							$i = 0; 
							$row = FALSE; 
						?>
						@foreach ($projects as $project)
							<?php 
								if($i % 4 == 0) {
									$row = TRUE;
								}
							?>
							<?php 
								if($row === TRUE) {
									$row = FALSE;
							?>
							<div class='row'>
							<?php 
								} 
							?>
							@include('partials/projects/view')
							<?php 
								$i+= 1;
								if($i % 4 == 0) {
							?>
							</div>
							<?php 
								} 
							?>
						@endforeach
					@else
					<p>Wow! We still don't have any projects starting with {{ $letter }}. Read our <a href="{{ url('/getting-started') }}">Getting Started</a> guide and contribute with your tests.</p>
					@endif
				@endif

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
