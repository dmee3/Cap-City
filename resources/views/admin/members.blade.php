@extends('layouts.admin')

@section('content')

	<div id="members" class="container">
		<div class="row">
			<div class="col s12">
				<h2 class="cap-blue-text">Members</h2>
				<members-list></members-list>
			</div>
		</div>
	</div>

	<template id="members-template">
		<div>
			<ul class="collapsible" data-collapsible="accordion">
				<li v-for="m in members">
					<div class="collapsible-header">@{{ m.first_name + ' ' + m.last_name }}<span class="secondary-content">@{{ m.subsection }}</span></div>
					<div class="collapsible-body grey lighten-3">
						<div class="container">
							<div class="row">
								<div id="paid-info" class="col s12 m6 grey-text center">
									<h5>PAID: $@{{ m.paid }}</h5>
									<div id="dues-bar" class="progress z-depth-1 cap-green-fade">
										<div id="dues-progress" class="determinate cap-green" v-bind:style="'width: ' + (m.paid * 100 / m.dues) + '%;'"></div>
									</div>
									<h6>TOTAL: $@{{ m.dues }}</h6>
								</div>
								<div id="conflict-info" class="col s12 m6 grey-text center">
									<h5>CONFLICTS: 
										<template v-if="m.conflicts > 0">
											<span class="cap-red-text">@{{ m.conflicts }}</span>
										</template>
										<template v-else>
											<span>0</span>
										</template>
									</h5>
								</div>
							</div>
							<div class="row">
								<div class="col s12 grey-text center">
									<h5 v-if="m.job_name != null">JOB: @{{ m.job_name }}</h5>
									<h5 v-else>JOB: None</h5>
								</div>
							</div>
							<div class="row">
								<div class="col s12 center">
									<a class="modal-trigger btn cap-red" v-on:click="showModal(m)">Delete</a>
								</div>
							</div>
						</div>
					</div>
				</li>
			</ul>
			<delete-confirm :id="currId" :name="currName"></delete-confirm>
		</div>
	</template>

	<template id="delete-template">
		<div id="delete-modal" class="modal">
			<div class="modal-content center">
				{!! Form::open(['action' => 'MemberController@delete']) !!}
				<p class="center">Are you sure you want to delete <span>@{{ name }}</span>?</p>
				<br>
				<input type="hidden" name="member_id" v-bind:value="id">
				<button type="submit" class="btn cap-red">Delete</button>
				{!! Form::close() !!}
			</div>
		</div>
	</template>

@endsection

@section('scripts')

	<script type="text/javascript" src="/js/vue.js"></script>
	<script type="text/javascript" src="/js/components/members.js"></script>
	<script type="text/javascript">
		new Vue({
			el: '#members'
		});
	</script>

@endsection
