@extends('layouts.admin')

@section('content')

	<div id="jobs" class="container">
		<div class="row">
			<div class="col s12">
				<h2 class="cap-blue-text">Ensemble Jobs</h2>
				<a href="#new-job-modal" class="modal-trigger btn-floating btn-large waves-effect waves-light right green"><i class="material-icons">add</i></a>
				<jobs-list></jobs-list>
			</div>
		</div>
	</div>

	<div id="new-job-modal" class="modal">
		{!! Form::open(['action' => 'JobController@create']) !!}
			<div class="modal-content">
				<h3>New Job</h3>
				<br>
				<div class="container">
					<div class="row">
						<div class="input-field col s12">
							<input name="name" type="text">
							<label for="name">Name</label>
						</div>
						<div class="input-field col s12">
							<textarea name="description" class="materialize-textarea"></textarea>
							<label for="description">Description</label>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<input type="submit" class="modal-action waves-effect waves-green btn-flat" value="Submit">
				<a href="#" class="modal-action modal-close waves-effect waves-red btn-flat">Cancel</a>
			</div>
		{!! Form::close() !!}
	</div>

	<template id="jobs-template">
		<div>
			<ul class="collapsible" data-collapsible="accordion">
				<li v-for="j in jobs">
					<div class="collapsible-header">@{{ j.name }}</div>
					<div class="collapsible-body grey lighten-3">
						<div class="container">
							<div class="row">
								<div class="col s12 m8">
									<p>@{{ j.description }}</p>
								</div>
								<div class="col s12 m4">
									<p><strong>Members</strong></p>
									<ul>
										<li v-for="m in j.members">@{{ m.first_name + ' ' + m.last_name }}</li>
									</ul>
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
	<script type="text/javascript" src="/js/admin/jobs.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.modal-trigger').leanModal();
		});
	</script>

@endsection
