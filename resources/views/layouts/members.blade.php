<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Cap City - Member</title>

	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

	<!-- Styles -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link type="text/css" rel="stylesheet" href="/css/materialize-style.css"/>
	<link type="text/css" rel="stylesheet" href="/css/style.css"/>
	<link type="text/css" rel="stylesheet" href="/css/app.css"/>

	@yield('styles')

	<link rel="icon" type="image/png" href="img/icon.png">

</head>
<body>

	<nav class="cap-blue">
		<div class="nav-wrapper cap-blue">
			<a href="/" class="brand-logo">Cap City</a>
			<ul class="right hide-on-med-and-down white-text">
				<li><a href="/home">Home</a></li>
				<li><a href="/full-schedule">Schedule</a></li>
				<li><a href="/settings">Settings</a></li>
				<li><a href="/logout">Logout</a></li>
			</ul>
			<a href="/" data-activates="mobile-nav" id="burger" class="button-collapse right hide-on-large-only"><i class="material-icons">menu</i></a>
			<ul class="side-nav cap-black" id="mobile-nav">
				<li><a href="/home">Home</a></li>
				<li><a href="/full-schedule">Schedule</a></li>
				<li><a href="/settings">Settings</a></li>
				<li><a href="/logout">Logout</a></li>
			</ul>
		</div>
	</nav>

	<main>
	    @yield('content')
	</main>

	<script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
	<script type="text/javascript" src="/js/script.js"></script>
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
