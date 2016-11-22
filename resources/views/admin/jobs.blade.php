@extends('layouts.admin')

@section('content')

	<div id="jobs" class="container">
		<div class="row">
			<div class="col s10">
				<h2 class="cap-blue-text">Ensemble Jobs</h2>
			</div>
			<div class="col s2">
				<br>
				<a href="#new-job-modal" class="modal-trigger btn-floating btn-large waves-effect waves-light right green"><i class="material-icons">add</i></a>
			</div>
			<div class="col s12">
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
						<br>
						<div class="container" style="width: 85%!important">
							{!! Form::open(['url' => '/admin/update-job']) !!}
								<input name="id" type="hidden" v-bind:value="j.id">
								<div class="row">
									<div class="input-field col s12">
										<input name="name" type="text" v-bind:value="j.name">
										<label for="name" class="active">Name</label>
									</div>
									<div class="input-field col s12 m8">
										<textarea name="description" class="materialize-textarea" v-bind:value="j.description"></textarea>
										<label for="description" class="active">Description</label>
									</div>
									<div class="col s12 m4">
										<ul class="collection">
											<li class="collection-item" v-for="m in j.member">
												{!! Form::open(['url' => '/admin/remove-job-member']) !!}
													<input type="hidden" v-bind:value="m.id" name="remove_member">
													<input type="hidden" v-bind:value="j.name" name="job_name">
													@{{ m.user.first_name + ' ' + m.user.last_name }}
													<button type="submit" class="secondary-content" style="background:none!important;border:none;padding:0!important;cursor: pointer;"><i class="material-icons red-text">delete</i></button>
												{!! Form::close() !!}
											</li>
										</ul>
										<br>
										<div class="input-field">
											<select name="member">
												<option value="" selected disabled>Choose</option>
												<option v-for="m in members" v-bind:value="m.id">@{{ m.first_name + ' ' + m.last_name }}</option>
											</select>
											<label for="member">Add Member</label>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col s12 center">
										<input type="submit" class="btn-large cap-green white-text" value="UPDATE">
									</div>
								</div>
							{!! Form::close() !!}
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
