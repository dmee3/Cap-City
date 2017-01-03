@extends('layouts.master')

@section('styles')
	<link type="text/css" rel="stylesheet" href="/css/staff.css"/>
@endsection

@section('content')

	<div id="staff">
		<div class="section cap-blue">
			<div class="container">
				<div class="row">
					<h2 class="cap-white-text">Staff</h2>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col s12 m6">
						<div class="collection with-header">
							<div class="collection-header cap-red-text"><h5>Administrative</h5></div>
							<a href="#staff-description" class="collection-item avatar modal-trigger" v-for="s in admin" v-on:click="modal(s.name)">
								<img :src="s.image" class="circle">
								<span class="title">@{{ s.name }}</span>
								<p class="truncate">@{{ s.position }}</p>
							</a>
						</div>
						<div class="collection with-header">
							<div class="collection-header cap-red-text"><h5>Design</h5></div>
							<a href="#staff-description" class="collection-item avatar modal-trigger" v-for="s in design" v-on:click="modal(s.name)">
								<img :src="s.image" class="circle">
								<span class="title">@{{ s.name }}</span>
								<p class="truncate">@{{ s.position }}</p>
							</a>
						</div>
						<div class="collection with-header">
							<div class="collection-header cap-red-text"><h5>Visual</h5></div>
							<a href="#staff-description" class="collection-item avatar modal-trigger" v-for="s in visual" v-on:click="modal(s.name)">
								<img :src="s.image" class="circle">
								<span class="title">@{{ s.name }}</span>
								<p class="truncate">@{{ s.position }}</p>
							</a>
						</div>
					</div>
					<div class="col s12 m6">
						<div class="collection with-header">
							<div class="collection-header cap-red-text"><h5>Battery</h5></div>
							<a href="#staff-description" class="collection-item avatar modal-trigger" v-for="s in battery" v-on:click="modal(s.name)">
								<img :src="s.image" class="circle">
								<span class="title">@{{ s.name }}</span>
								<p class="truncate">@{{ s.position }}</p>
							</a>
						</div>
						<div class="collection with-header">
							<div class="collection-header cap-red-text"><h5>Front</h5></div>
							<a href="#staff-description" class="collection-item avatar modal-trigger" v-for="s in front" v-on:click="modal(s.name)">
								<img :src="s.image" class="circle">
								<span class="title">@{{ s.name }}</span>
								<p class="truncate">@{{ s.position }}</p>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="staff-description" class="modal modal-fixed-footer">
			<div class="modal-content">
				<img id="detail-image" class="circle hide-on-small-and-down">
				<div id="detail-name-group" class="row">
					<h3 id="detail-name">Name</h3>
					<h5 id="detail-position" class="cap-black-text">Position</h5>
				</div>
				<p class="light" id="detail-bio">Bio</p>
			</div>
			<div class="modal-footer text-right">
				<a href="javascript:;" class="modal-action modal-close btn cap-red white-text">Close</a>
			</div>
		</div>
	</div>

@endsection

@section('scripts')

	<script type="text/javascript" src="js/vue.min.js"></script>
	<script type="text/javascript" src="js/staff.js"></script>

@endsection
