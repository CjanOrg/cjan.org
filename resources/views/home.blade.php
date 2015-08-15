@extends('app')

@section('breadcrumbs', Breadcrumbs::render('home'))

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					<h4>Welcome to CJAN, the Comprehensive Java Archive Network</h4>

					<p>The CJAN project is a placeholder for tests of Java projects. It aims at providing
					better quality, less bugs in production, tests for alpha/beta/RC versions and history
					of compatibility for Java projects.</p>
					<p>Testers and developers can submit test results. Each result is archived alongside
					with metadata such as: build tool version, project, version and operating system (OS
					name, OS version and OS architecture).</p>
					
					<p>Read more about how to <a href="{{ url('getting-started') }}">get started</a>.</p>

					<p>Or for a <strong>TL;DR</strong>, copy your user token from your profile into your settings.xml:</p>

					<pre>&lt;servers&gt;
    &lt;server&gt;
        &lt;id&gt;cjan&lt;/id&gt;
        &lt;username&gt;kinowkinowkinow&lt;/username&gt;
    &lt;/server&gt;
&lt;/servers&gt;</pre>

					<p>Then run:</p>

					<pre>mvn clean test
mvn org.cjan:test-collector:upload</pre>

					<p>The first command is just to produce some test results locally. This step is required to be run
					separately as it may fail and not execute any further steps. The second command calls our Maven plug-in
					to upload your test results to CJAN.org, using the user token.</p>

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

					<h4>Contributions</h4>

					<p>It is an Open Source project, licensed under the MIT License. The
					<a href="https://github.com/CjanOrg/cjan.org">code</a> is hosted at GitHub. 
					<a href="https://github.com/CjanOrg/CJAN/wiki/Roadmap">Contributions</a> are always
					welcome!</p>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
