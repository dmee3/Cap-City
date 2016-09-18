<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content="Cap City">
	<meta name="author" content="Cap City">

	<!-- Facebook Open Graph meta tags -->
	<meta property="og:url" content="http://www.capcitypercussion.com">
	<meta property="og:title" content="Cap City">
	<meta property="og:description" content="WGI Percussion Independent World ensemble from Columbus, Ohio">
	<meta property="og:image" content="http://www.capcitypercussion.com/img/fb_share_logo.png">

	<title>Cap City</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link type="text/css" rel="stylesheet" href="/css/materialize-style.css"/>
	<link type="text/css" rel="stylesheet" href="/css/style.css"/>
	@yield('styles')
	<link rel="icon" type="image/png" href="img/icon.png">

</head>
<body>

	<!-- Nav Bar -->
	<div class="navbar-fixed black">
		<nav class="black">
			<div class="nav-wrapper container">
				<ul class="left hide-on-med-and-down">
					<li><a href="schedule">Schedule</a></li>
					<li><a href="members">Members</a></li>
					<li><a href="staff">Staff</a></li>
				</ul>
				<a href="/" id="cc-logo-circle" class="brand-logo center circle cap-red hide-on-med-and-down">
					<img src="/img/cc_nav.png" id="cc-logo" width="60" height="70">
				</a>
				<a href="/" id="cc-logo-container-small" class="valign-wrapper">
					<img src="/img/cc_nav.png" id="cc-logo-small" class="valign hide-on-large-only" width="43" height="50">
				</a>
				<a href="/" data-activates="mobile-nav" id="burger" class="button-collapse right hide-on-large-only"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="news">News</a></li>
					<li><a href="store">Store</a></li>
					<li><a href="contact">Contact</a></li>
				</ul>
				<ul class="side-nav black" id="mobile-nav">
					<li><a href="/">Home</a></li>
					<li><a href="schedule">Schedule</a></li>
					<li><a href="members">Members</a></li>
					<li><a href="staff">Staff</a></li>
					<li><a href="news">News</a></li>
					<li><a href="store">Store</a></li>
					<li><a href="contact">Contact</a></li>
				</ul>
			</div>
		</nav>
	</div>

	@yield('content')

	<!-- Social Media -->
	<div class="section cap-black center">
		<a class="white-text" target="_blank" href="https://www.facebook.com/capcitypercussion/"><i class="fa fa-facebook fa-3x social-media" aria-hidden="true"></i></a>
		<a class="white-text" target="_blank" href="https://twitter.com/CapCityPerc"><i class="fa fa-twitter fa-3x social-media" aria-hidden="true"></i></a>
		<a class="white-text" target="_blank" href="https://www.youtube.com/channel/UCWjWCag6pALBDY5vmXMkTaw"><i class="fa fa-youtube-play fa-3x social-media" aria-hidden="true"></i></a>
		<a class="white-text" target="_blank" href="https://www.instagram.com/capcitypercussion/"><i class="fa fa-instagram fa-3x social-media" aria-hidden="true"></i></a>
		<a class="white-text" target="_blank" href="https://www.snapchat.com/add/snapcityperc"><i class="fa fa-snapchat fa-3x social-media" aria-hidden="true"></i></a>
	</div>

	<!-- Copyright / login -->
	<div class="section black row">
		<div class="col s6 center">
			<p class="white-text">© Cap City Percussion 2016</p>
		</div>
		<div class="col s6 center">
			<p><a href="/login" class="white-text" style="text-decoration: underline;">Login</a></p>
		</div>
	</div>

	<!-- Sponsors -->
	<div id="sponsors" class="section black center">
		<div class="container row">
			<div class="col s6 m3 l2"><a href="http://ateasesupplyco.spreadshirt.com/"><img src="/img/sponsors/at_ease.png" /></a></div>
			<div class="col s6 m3 l2"><a href="http://www.columbuspercussion.com/"><img src="/img/sponsors/col_pro.png" /></a></div>
			<div class="col s6 m3 l2"><a href="http://www.creative-costuming.com/"><img src="/img/sponsors/creative_costuming.png" /></a></div>
			<div class="col s6 m3 l2"><a href="http://www.innovativepercussion.com/"><img src="/img/sponsors/innovative_percussion.png" /></a></div>
			<div class="col s6 m3 l2"><a href="http://www.majestic-percussion.com/"><img src="/img/sponsors/majestic.png" /></a></div>
			<div class="col s6 m3 l2"><a href="http://www.mapexdrums.com/"><img src="/img/sponsors/mapex.png" /></a></div>
			<div class="col s6 m3 l2"><a href="http://www.on2percussion.com/"><img src="/img/sponsors/on2.png" /></a></div>
			<div class="col s6 m3 l2"><a href="http://www.pageantryinnovations.com/"><img src="/img/sponsors/pageantry.png" /></a></div>
			<div class="col s6 m3 l2"><a href="http://www.remo.com/"><img src="/img/sponsors/remo.png" /></a></div>
			<div class="col s6 m3 l2"><a href="http://www.treeworkschimes.com/"><img src="/img/sponsors/treeworks.png" /></a></div>
			<div class="col s6 m3 l2"><a href="http://www.treeworkschimes.com/"><img src="/img/sponsors/winter_guard_tarps.png" /></a></div>
			<div class="col s6 m3 l2"><a href="http://zildjian.com/"><img src="/img/sponsors/zildjian.png" /></a></div></div>
	</div>

	<script type="text/javascript" src="/js/jquery-2.1.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
	<script type="text/javascript" src="/js/script.js"></script>
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
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-66433403-2', 'auto');
		ga('send', 'pageview');
	</script>
</body>
</html>
