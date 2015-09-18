@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Search "{{ $q }}"</div>

				<div class="panel-body">
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
					<p>No search results</p>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
