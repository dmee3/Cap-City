@extends('layouts.master')

@section('styles')

	<link type="text/css" rel="stylesheet" href="/css/schedule.css">

@endsection

@section('content')

	<div id="schedule" class="section cap-grey">
		<div class="container">
			<div class="row">
				<div class="col s12 m8 l9">
					<h2 class="cap-white-text">Schedule</h2>
				</div>
				<div class="col s12 m4 l3">
					<div class="card cap-black">
						<div class="card-content">
							<p class="white-text center">Some of these may change throughout the season, please check back for updates!</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<ul id="timeline" class="white-text">
					<li v-for="s in shows">
						<a class="white-text" target="_blank" v-bind:href="s.url">
							<div v-bind:class="'card hoverable ' + s.type">
								<div class="card-content">
									<span class="card-title">@{{ s.name }}</span>
									<p>@{{ s.date }}</p>
								</div>
							</div>
						</a>
						<div class="dot cap-grey"></div>
					</li>
				</ul>
			</div>
		</div>
	</div>

@endsection

@section('scripts')

	<script type="text/javascript" src="/js/vue.min.js"></script>
	<script type="text/javascript" src="/js/schedule.js"></script>

@endsection
