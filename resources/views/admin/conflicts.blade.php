@extends('layouts.admin')

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
		<div>
			<div class="card" v-for="(people, date) in conflicts">
				<div class="card-content">
					<h5>@{{ date }}</h5>
					<ul class="collapsible" data-collapsible="accordion">
						<li v-for="c in people">
							<div class="collapsible-header">@{{ c.name }}</div>
							<div class="collapsible-body cap-blue-text"><p>@{{ c.reason }}</p></div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</template>

@endsection

@section('scripts')

	<script type="text/javascript" src="/js/vue.js"></script>
	<script type="text/javascript" src="/js/admin/conflicts.js"></script>

@endsection
