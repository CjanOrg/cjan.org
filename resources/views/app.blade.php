<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CJAN, the Comprehensive Java Archive Network</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand">CJAN</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					@if (Request::is('/'))
					<li class='active'><a href="{{ url('/') }}">Home</a></li>
					@else
					<li><a href="{{ url('/') }}">Home</a></li>
					@endif
					@if (Request::is('projects'))
					<li class='active'><a href="{{ url('/projects') }}">Projects</a></li>
					@else
					<li><a href="{{ url('/projects') }}">Projects</a></li>
					@endif
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="btn-toolbar" role="toolbar" aria-label="project-letters">
					<div class="btn-group" role="group" aria-label="project-letter-a">
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=a') }}">A</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=b') }}">B</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=c') }}">C</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=d') }}">D</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=e') }}">E</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=f') }}">F</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=g') }}">G</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=h') }}">H</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=i') }}">I</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=j') }}">J</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=k') }}">K</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=l') }}">L</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=m') }}">M</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=n') }}">N</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=o') }}">O</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=p') }}">P</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=q') }}">Q</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=r') }}">R</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=s') }}">S</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=t') }}">T</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=u') }}">U</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=v') }}">V</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=w') }}">W</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=x') }}">X</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=y') }}">Y</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=z') }}">Z</a>
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=0-9') }}">0-9</a>
					</div>
				</div>
				<br/>
			</div>
		</div>
	</div>

	@yield('content')

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
