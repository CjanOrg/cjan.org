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

					<h4>Projects</h4>

					<p>Choose a project by the first letter of its name, and browse the test results. Projects
					are created by users when they upload test results. The project metadata is read from build
					tools like Maven or Ant.</p>

					<h4>Become a tester</h4>

					<p>Several libraries are tested every day by many developers and testers. Not always
					test results are archived and shared with others. By archiving and sharing your test
					results, other developers can quickly evaluate the compatibility of libraries against
					JVM, build tool and operating system versions.</p>

					<p><a href="{{ URL::to('/auth/register') }}">Register</a> to create a new user and use our plug-in with your build
					tool to submit test results. The information </p>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
