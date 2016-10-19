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
			<div v-for="(people, date) in conflicts">
				<h5>@{{ date }}</h5>
				<ul class="collapsible" data-collapsible="accordion">
					<li v-for="c in people">
						<div class="collapsible-header">@{{ c.name }}</div>
						<div class="collapsible-body cap-blue-text"><p>@{{ c.reason }}</p></div>
					</li>
				</ul>
			</div>
		</div>
		<br>
		<br>
	</template>

@endsection

@section('scripts')

	<script type="text/javascript" src="/js/vue.js"></script>
	<script type="text/javascript">

		Vue.component('conflict-list', {
			template: '#conflicts-template',
			data: function() {
				return { conflicts: [] };
			},
			created: function() {
				$.getJSON('/api/admin/conflicts', function(response) {

					var list = {};
					for (var i = 0; i < response.length; i++) {
						var c = {
							name: response[i].user.first_name + ' ' + response[i].user.last_name,
							reason: response[i].reason
						}

						var absent = response[i].date_absent;
						if (!list[absent]) {
							list[absent] = [];
						}
						list[absent].push(c);
					}

					this.conflicts = list;

				}.bind(this));
			},
			updated: function() {
				$('.collapsible').collapsible();
			}
		});

		new Vue({
			el: '#conflicts',
		});

	</script>

@endsection
