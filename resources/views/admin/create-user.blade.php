@extends('layouts.admin')

@section('content')

<div id="dashboard-bg">
	<div class="container">

		<div class="row">
			<h3 class="cap-white-text">Create User</h3>
			<div class="divider"></div>
		</div>

		<div class="row white-text">

			@if(count($errors) > 0)
				@include('common.errors-side')
				<div class="col s12 m8 pull-m4">
			@else
				<div class="col s12">
			@endif
				{!! Form::open(['action' => 'AdminController@createUser']) !!}
					<div class="row">
						<div class="hl-teal input-field col s6">
							<input type="text" id="first-name" name="first_name">
							<label for="first-name">First Name</label>
						</div>
						<div class="hl-teal input-field col s6">
							<input type="text" id="last-name" name="last_name">
							<label for="last-name">Last Name</label>
						</div>
					</div>
					<div class="row">
						<div class="hl-teal input-field col s12">
							<input type="text" id="email" name="email">
							<label for="email">Email</label>
						</div>
					</div>
					<div class="row">
						<div class="hl-teal input-field col s6 offset-s3">
							<select name="role">
								<option value="" disabled selected>Choose a role</option>
								<option value="Member">Member</option>
								<option value="Staff">Staff</option>
								<option value="Admin">Admin</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="hl-teal input-field col s12">
							<input type="password" id="password" name="password">
							<label for="password">Password</label>
						</div>
						<div class="hl-teal input-field col s12">
							<input type="password" id="password-confirmation" name="password_confirmation">
							<label for="password-confirmation">Confirm Password</label>
						</div>
					</div>
					<div class="row">
						<div class="col s12 center">
							<button type="submit" class="btn cap-green">Create</button>
						</div>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection
