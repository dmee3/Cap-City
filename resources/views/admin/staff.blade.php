@extends('layouts.admin')

@section('content')

	<div id="staff" class="container">
		<div class="row">
			<div class="col s12">
				<h2 class="cap-blue-text">Staff</h2>
				<staff-list></staff-list>
			</div>
		</div>
	</div>

	<template id="staff-template">
		<div>
			<ul class="collapsible" data-collapsible="accordion">
				<li v-for="s in staff">
					<div class="collapsible-header">@{{ s.first_name + ' ' + s.last_name }}<span class="secondary-content">@{{ s.position }}</span></div>
					<div class="collapsible-body grey lighten-3">
						<div class="container">
							<div class="row">
								<div id="paid-info" class="col s12 grey-text center">
									<h5>PAID: $@{{ s.paid }}</h5>
									<div id="dues-bar" class="progress z-depth-1 cap-green-fade">
										<div id="dues-progress" class="determinate cap-green" v-bind:style="'width: ' + (s.paid * 100 / s.dues) + '%;'"></div>
									</div>
									<h6>TOTAL: $@{{ s.pay }}</h6>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</template>

@endsection

@section('scripts')

	<script type="text/javascript" src="/js/vue.js"></script>
	<script type="text/javascript" src="/js/components/staff.js"></script>
	<script type="text/javascript">
		new Vue({
			el: '#staff'
		});
	</script>

@endsection
