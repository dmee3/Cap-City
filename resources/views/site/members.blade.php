@extends('layouts.master')

@section('content')

	<div class="section cap-blue" id="members">
		<div class="container cap-white-text">
			<div class="row">
				<h2>Members</h2>
			</div>
			<div class="row">
				<div class="col s12 m6">
					<ul class="collection with-header black-text">
						<li class="collection-header cap-red-text"><h5>Battery</h5></li>
						<li v-for="m in snare" class="collection-item avatar avatar-large"><img v-bind:src="m.pic" class="circle"><span class="title">@{{ m.first + ' ' + m.last }}</span><p>Snare</p></li>
						<li v-for="m in tenor" class="collection-item avatar avatar-large"><img v-bind:src="m.pic" class="circle"><span class="title">@{{ m.first + ' ' + m.last }}</span><p>Tenors</p></li>
						<li v-for="m in bass" class="collection-item avatar avatar-large"><img v-bind:src="m.pic" class="circle"><span class="title">@{{ m.first + ' ' + m.last }}</span><p>Bass</p></li>
						<li v-for="m in cymbals" class="collection-item avatar avatar-large"><img v-bind:src="m.pic" class="circle"><span class="title">@{{ m.first + ' ' + m.last }}</span><p>Cymbals</p></li>
					</ul>
				</div>
				<div class="col s12 m6">
					<ul class="collection with-header black-text">
						<li class="collection-header cap-red-text"><h5>Front Ensemble</h5></li>
						<li v-for="m in marimba" class="collection-item avatar avatar-large"><img v-bind:src="m.pic" class="circle"><span class="title">@{{ m.first + ' ' + m.last }}</span><p>Marimba</p></li>
						<li v-for="m in vibes" class="collection-item avatar avatar-large"><img v-bind:src="m.pic" class="circle"><span class="title">@{{ m.first + ' ' + m.last }}</span><p>Vibes</p></li>
						<li v-for="m in xylophone" class="collection-item avatar avatar-large"><img v-bind:src="m.pic" class="circle"><span class="title">@{{ m.first + ' ' + m.last }}</span><p>Xylophone</p></li>
						<li v-for="m in auxiliary" class="collection-item avatar avatar-large"><img v-bind:src="m.pic" class="circle"><span class="title">@{{ m.first + ' ' + m.last }}</span><p>Auxiliary</p></li>
						<li v-for="m in kit" class="collection-item avatar avatar-large"><img v-bind:src="m.pic" class="circle"><span class="title">@{{ m.first + ' ' + m.last }}</span><p>Kit</p></li>
						<li v-for="m in electronics" class="collection-item avatar avatar-large"><img v-bind:src="m.pic" class="circle"><span class="title">@{{ m.first + ' ' + m.last }}</span><p>Electronics</p></li>
					</ul>
				</div>
				<div class="col s12 m6">
					<ul class="collection with-header black-text">
						<li class="collection-header cap-red-text"><h5>Visual</h5></li>
						<li v-for="m in visual" class="collection-item avatar avatar-large"><img v-bind:src="m.pic" class="circle"><span class="title">@{{ m.first + ' ' + m.last }}</span><p>Visual</p></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('scripts')

	<script type="text/javascript" src="js/vue.min.js"></script>
	<script type="text/javascript" src="js/member-list.js"></script>

@endsection
