@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					<p>The CJAN project is a placeholder for tests of Java projects. It aims at providing
					better quality, less bugs in production, tests for alpha/beta/RC versions and history
					of compatibility for Java projects.</p>
					<p>Testers and developers can submit test results. Each result is archived alongside
					with metadata such as: build tool version, project, version and operating system (OS
					name, OS version and OS architecture).</p>
					<p>It is an Open Source project, licensed under the MIT License. The
					<a href="https://github.com/CjanOrg/cjan.org">code</a> is hosted at GitHub. 
					<a href="https://github.com/CjanOrg/CJAN/wiki/Roadmap">Contributions</a> are always
					welcome!</p>

					<h4>Projects</h4>

					<p>Choose a project by the first letter of its name, and browse the test results.</p>

					<div class="btn-toolbar" role="toolbar" aria-label="project-letters">
						<div class="btn-group" role="group" aria-label="project-letter-a">
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=a') }}">A</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=b') }}">B</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=c') }}">C</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=d') }}">D</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=e') }}">E</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=f') }}">F</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=g') }}">G</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=h') }}">H</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=i') }}">I</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=j') }}">J</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=k') }}">K</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=l') }}">L</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=m') }}">M</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=n') }}">N</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=o') }}">O</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=p') }}">P</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=q') }}">Q</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=r') }}">R</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=s') }}">S</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=t') }}">T</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=u') }}">U</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=v') }}">V</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=w') }}">W</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=x') }}">X</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=y') }}">Y</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=z') }}">Z</a>
							<a class="btn btn-default" href="{{ URL::to('/projects/?letter=0') }}">0</a>
						</div>
					</div>

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
