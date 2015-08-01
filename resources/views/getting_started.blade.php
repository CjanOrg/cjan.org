@extends('app')

@section('breadcrumbs', Breadcrumbs::render('getting-started'))

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					<h4>Getting started with CJAN</h4>

					<p>CJAN lists several Java projects and tests for each project in several platforms. The tests are uploaded
					by users using the <a href="https://github.com/CjanOrg/test-collector-maven-plugin">CJAN Maven Plug-in</a>.</p>

					<p>The tests can be used by other developers for deciding whether they should use a library in their
					application or not. If they know that they will be running the code in a platform with a JVM, locale or
					timezone with failing tests, they may decide to use another library instead.</p>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
