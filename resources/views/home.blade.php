@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row-fluid">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					<p>The CJAN project is a placeholder for tests of Java projects. It aims at providing
					better quality, less bugs in production, tests for alpha/beta/RC versions and history
					of compatibility.</p>
					<p>Testers and developers can submit test results. Each result is archived alongside
					with metadata such as: build tool version, project, version and operating system (OS
					name, OS version and OS architecture).</p>
					<p>It is an Open Source project, licensed under the MIT License. The code is hosted
					at <a href="https://github.com/cjan/cjan.org"></a></p>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
