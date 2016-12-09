@extends('layouts.contact')

@section('styles')
	<link type="text/css" rel="stylesheet" href="css/index.css"/>
	<link type="text/css" rel="stylesheet" href="css/contact.css"/>
@endsection

@section('content2')

	<div id="mobile-hero" class="center hide-on-large-only">
		<img src="img/mobile_logo.jpg">
	</div>
	<div id="hero" class="slider hide-on-med-and-down">
		<ul class="slides transparent">
			<li>
				<img id="logo-outline" src="img/logo_outline.png">
			</li>
		</ul>
	</div>

	<div id="cards" class="section cap-white">
		<div class="container row">
			<div class="col s12 m4">
				<a href="http://shop.capcitypercussion.com">
					<div class="card hoverable cap-blue news-card white-text">
						<div class="card-image hide-on-small-and-down">
							<img src="/img/shirt_card.png">
							<span class="card-title">Store</span>
						</div>
						<div class="card-content hide-on-med-and-up">
							<span class="card-title">Store</span>
							<p>Our online store is open for business!</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col s12 m4">
				<a href="/schedule">
					<div class="card hoverable cap-blue news-card white-text">
						<div class="card-image hide-on-small-and-down">
							<img src="/img/fire_card.png">
							<span class="card-title">Schedule</span>
						</div>
						<div class="card-content hide-on-med-and-up">
							<span class="card-title">Schedule</span>
							<p>Check out our show schedule for 2017!</p>
						</div>
					</div>
				</a>
			</div>
			<div class="col s12 m4">
				<a href="/staff">
					<div class="card hoverable cap-blue news-card white-text">
						<div class="card-image hide-on-small-and-down">
							<img src="/img/ensemble_card.png">
							<span class="card-title">2017 Staff</span>
						</div>
						<div class="card-content hide-on-med-and-up">
							<span class="card-title">2017 Staff</span>
							<p>Meet our staff for this season!</p>
						</div>
					</div>
				</a>
			</div>
		</div>
	</div>

	<div id="about" class="section cap-black white-text">
		<div class="container row">
			<h2>About Us</h2>
			<p class="thin">Cap City was envisioned in 2011 as Capital City Percussion, a group for percussionists from the Central Ohio area to grow as musicians and performers.  We began competing in both Winter Guard International  and the Ohio Indoor Performance Association during the 2012 season in percussion independent A class.  During the 2012 season, Capital City was bumped up to Open class and finished the season in 9th place at WGI World Championships.  Capital City followed a strong first season with a WGI gold medal in 2013, and was subsequently promoted to World class in 2014.</p>
			<p class="thin">Following our 2016 season, Cap City is looking ahead to another year of competition at the highest level.  All of our members and staff are excited to continue pushing ourselves throughout the winter and spring to perform the best show we can.</p>
			<p class="thin">See you on the floor!</p>
		</div>
	</div>

@endsection

@section('contact')
	@parent
@endsection
