<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CJAN, the Comprehensive Java Archive Network</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/cjan.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<!--link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'-->
	<link href="{{ asset('/bower/roboto-fontface/css/roboto-fontface.css') }}" type="text/css">

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
					@if (Request::is('projects*'))
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
							  <li><a href="{{ url('/auth/profile') }}">Profile</a></li>
							  <li><a href="<?php echo url(sprintf('/u/%s/tests/', Auth::user()->name)) ?>">Tests</a></li>
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
			<div class="col-md-10">
				<div class="btn-toolbar" role="toolbar" aria-label="project-letters">
					<div class="btn-group" role="group" aria-label="project-letter-a">
						@if (isset($letter) and $letter == 'A')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=a') }}">A</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=a') }}">A</a>
						@endif
						@if (isset($letter) and $letter == 'B')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=b') }}">B</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=b') }}">B</a>
						@endif
						@if (isset($letter) and $letter == 'C')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=c') }}">C</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=c') }}">C</a>
						@endif
						@if (isset($letter) and $letter == 'D')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=d') }}">D</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=d') }}">D</a>
						@endif
						@if (isset($letter) and $letter == 'E')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=e') }}">E</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=e') }}">E</a>
						@endif
						@if (isset($letter) and $letter == 'F')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=f') }}">F</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=f') }}">F</a>
						@endif
						@if (isset($letter) and $letter == 'G')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=g') }}">G</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=g') }}">G</a>
						@endif
						@if (isset($letter) and $letter == 'H')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=h') }}">H</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=h') }}">H</a>
						@endif
						@if (isset($letter) and $letter == 'I')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=i') }}">I</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=i') }}">I</a>
						@endif
						@if (isset($letter) and $letter == 'J')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=j') }}">J</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=j') }}">J</a>
						@endif
						@if (isset($letter) and $letter == 'K')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=k') }}">K</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=k') }}">K</a>
						@endif
						@if (isset($letter) and $letter == 'L')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=l') }}">L</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=l') }}">L</a>
						@endif
						@if (isset($letter) and $letter == 'M')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=m') }}">M</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=m') }}">M</a>
						@endif
						@if (isset($letter) and $letter == 'N')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=n') }}">N</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=n') }}">N</a>
						@endif
						@if (isset($letter) and $letter == 'O')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=o') }}">O</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=o') }}">O</a>
						@endif
						@if (isset($letter) and $letter == 'P')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=p') }}">P</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=p') }}">P</a>
						@endif
						@if (isset($letter) and $letter == 'Q')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=q') }}">Q</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=q') }}">Q</a>
						@endif
						@if (isset($letter) and $letter == 'R')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=r') }}">R</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=r') }}">R</a>
						@endif
						@if (isset($letter) and $letter == 'S')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=s') }}">S</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=s') }}">S</a>
						@endif
						@if (isset($letter) and $letter == 'T')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=t') }}">T</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=t') }}">T</a>
						@endif
						@if (isset($letter) and $letter == 'U')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=u') }}">U</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=u') }}">U</a>
						@endif
						@if (isset($letter) and $letter == 'V')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=v') }}">V</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=v') }}">V</a>
						@endif
						@if (isset($letter) and $letter == 'W')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=w') }}">W</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=w') }}">W</a>
						@endif
						@if (isset($letter) and $letter == 'X')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=x') }}">X</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=x') }}">X</a>
						@endif
						@if (isset($letter) and $letter == 'Y')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=y') }}">Y</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=y') }}">Y</a>
						@endif
						@if (isset($letter) and $letter == 'Z')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=z') }}">Z</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=z') }}">Z</a>
						@endif
						@if (isset($letter) and $letter == '0-9')
						<a class="btn btn-default active" href="{{ URL::to('/projects?letter=0-9') }}">0-9</a>
						@else
						<a class="btn btn-default" href="{{ URL::to('/projects?letter=0-9') }}">0-9</a>
						@endif

					</div>
				</div>
				<br/>
			</div>
			<div class='col-md-2'>
			  <form action="{{ url('/projects/search') }}" class='form form-inline' role="search" method="get">
		        <div class="input-group">
			      <input name="q" type="text" class="form-control" placeholder="Search">
		          <span class="input-group-btn">
		            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search color-white" aria-label="Go"></i></button>
                  </span>
  		        </div><!-- /input-group -->
		      </form>
		    </div><!-- /.col-lg-6 -->
		</div>
	</div>

	<div class='container'>
		<div class='row'>
			<div class='col-md-12'>
				@yield('breadcrumbs')
			</div>
		</div>
	</div>

	@if(Session::has('message'))
	<div class='container'>
		<div class='row'>
			<div class='col-md-12'>
				<p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
			</div>
		</div>
	</div>
	@endif

	@yield('content')

	<!-- Scripts -->
	<script src="{{ asset('/js/vendor.js') }}"></script>
	@if (App::environment() != "local")
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-30878265-1', 'auto');
	  ga('send', 'pageview');

	</script>
	@endif
</body>
</html>
