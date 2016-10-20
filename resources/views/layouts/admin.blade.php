<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Cap City">
	<meta name="author" content="Cap City">

	<title>Cap City</title>

	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<!-- Styles -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link type="text/css" rel="stylesheet" href="/css/materialize-style.css"/>
	<link type="text/css" rel="stylesheet" href="/css/style.css"/>
	<link type="text/css" rel="stylesheet" href="/css/admin.css"/>
	@yield('styles')
	<link rel="icon" type="image/png" href="img/icon.png">

</head>
<body>
	<header>
		<nav>
			<div id="top-bar" class="nav-wrapper white-text">
				<a href="/" class="brand-logo">Cap City</a>
				<a href="#" data-activates="side-bar" class="button-collapse hide-on-large-only"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					@if (Auth::guest())
						<li><a href="/login">Login</a></li>
					@else
						<li><a href="/home">Home</a></li>
						<li><a href="/logout">Logout</a></li>
					@endif
				</ul>
			</div>
		</nav>
		<ul id="side-bar" class="side-nav fixed black">
			@if (Auth::check())
				<li>
					<a href="/" class="white-text">
						<i class="material-icons small cap-red-text">person</i><span>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span>
					</a>
				</li>
				<li>
					<a href="/home" class="white-text">
						<i class="material-icons small cap-red-text">dashboard</i><span>Dashboard</span>
					</a>
				</li>
				<li>
					<a href="/admin/registrations" class="white-text">
						<i class="material-icons small cap-red-text">assignment</i><span>Registrations</span>
					</a>
				</li>
				<li>
					<a href="/admin/dues" class="white-text">
						<i class="material-icons small cap-red-text">attach_money</i><span>Dues</span>
					</a>
				</li>
				<li>
					<a href="/admin/members" class="white-text">
						<i class="material-icons small cap-red-text">people</i><span>Members</span>
					</a>
				</li>
				<li>
					<a href="/admin/conflicts" class="white-text">
						<i class="material-icons small cap-red-text">not_interested</i><span>Conflicts</span>
					</a>
				</li>
				<li>
					<a href="/admin/create-user" class="white-text">
						<i class="material-icons small cap-red-text">person_add</i><span>New User</span>
					</a>
				</li>
				<li class="hide-on-large-only">
					<a href="/logout" class="white-text">
						<i class="material-icons small cap-red-text">exit_to_app</i><span>Logout</span>
					</a>
				</li>
			@endif
		</ul>
	</header>

	<main>
	    @yield('content')
	</main>

	<script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
	<script type="text/javascript" src="/js/script.js"></script>
	<script type="text/javascript" src="/js/admin/layout.js"></script>
	<script src="https://use.fontawesome.com/c006854291.js"></script>
	@yield('scripts')
	@if (Session::has('success'))
	<script type="text/javascript">
		var $toastContent = $('<span>{{ Session::get('success') }}</span>');
		Materialize.toast($toastContent, 5000, 'green');
	</script>
	@elseif (Session::has('error'))
	<script type="text/javascript">
		var $toastContent = $('<span>{{ Session::get('error') }}</span>');
		Materialize.toast($toastContent, 5000, 'red');
	</script>
	@endif
</body>
</html>
