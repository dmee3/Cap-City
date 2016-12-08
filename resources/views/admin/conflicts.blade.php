@extends('layouts.admin')

@section('styles')
	<link type="text/css" rel="stylesheet" href="/css/conflicts.css">
@endsection

@section('content')

	<div id="conflicts" class="container">
		<div class="row">
			<div class="col s12">
				<h2 class="cap-blue-text">Conflicts</h2>
					<conflict-list></conflict-list>
			</div>
		</div>
	</div>

	<template id="conflicts-template">
		<div class="row">
			<ul id="timeline" class="white-text">
				<li v-for="item in conflicts">
					<div class="card cap-red">
						<div class="card-content">
							<span class="card-title">@{{ item.date }}</span>
							<ul class="collapsible" data-collapsible="accordion">
								<li v-for="c in item.conflicts">
									<div class="collapsible-header white black-text">@{{ c.name }}</div>
									<div class="collapsible-body cap-white cap-blue-text"><p>@{{ c.reason }}</p></div>
								</li>
							</ul>
						</div>
					</div>
					<div class="dot cap-white"></div>
				</li>
			</ul>
		</div>
	</template>

@endsection

@section('scripts')
	<script type="text/javascript" src="/js/vue.js"></script>
	<script type="text/javascript" src="/js/admin/conflicts.js"></script>
@endsection
