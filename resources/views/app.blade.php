<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/assets/lib/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/ui-bootstrap.min.css">

	<title>HealthApp</title>
</head>
<body ng-app="healthApp">

	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#">HealthApp</a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			@if(\Clusterpoint::authCheck())
				@if(\Clusterpoint::authUser()->roles == 'agency')
					<ul class="nav navbar-nav">
						<li class="{{ ($nav == 'home') ? 'active':'' }}"><a href="/">Home</a></li>
				        <li dropdown on-toggle="toggled(open)" class="dropdown {{ ($nav == 'agency') ? 'active':'' }}">
						    <a href id="simple-dropdown" dropdown-toggle>
						        Agency <span class="caret"></span>
						    </a>
						    <ul class="dropdown-menu" aria-labelledby="simple-dropdown">
						        <li><a href="/agency/carestaff">Manage Users</a></li>
						        <li><a href="">Roles</a></li>
						        <li><a href="">Skills</a></li>
						    </ul>
				        </li>
				    </ul>
				@endif
			    <ul class="nav navbar-nav navbar-right">
			        <li dropdown on-toggle="toggled(open)">
					    <a href id="simple-dropdown" dropdown-toggle>
					        {{\Clusterpoint::authUser()->name}} <span class="caret"></span>
					    </a>
					    <ul class="dropdown-menu" aria-labelledby="simple-dropdown">
					        <li><a href="">Profile</a></li>
					        <li class="divider"></li>
					        <li><a href="/auth/logout">Logout</a></li>
					    </ul>
			        </li>
			    </ul>
			@else
				<ul class="nav navbar-nav">
					<li class="{{ ($nav == 'home') ? 'active':'' }}"><a href="/">Home</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
			        <li class="{{ ($nav == 'login') ? 'active':'' }}"><a href="/auth/login">Login</a></li>
			        <li><a href="/auth/register">Register</a></li>
			    </ul>
			@endif
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>

	@yield('content')

	<script src="/assets/lib/js/angular.min.js"></script>
	<script src="/assets/lib/js/ui-bootstrap-0.13.0.min.js"></script>

	<script src="/assets/js/app.js"></script>
</body>
</html>