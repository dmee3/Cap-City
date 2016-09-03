@extends('layouts.app-basic')

@section('content')

	<div class="section white">
		<div class="container">
			<div class="row">
				<h4 class="cap-blue-text">Register</h4>
			</div>
			<div class="row">
				@if(count($errors) > 0)
					@include('common.errors-side')
					<div class="col s12 m8 pull-m4">
				@else
					<div class="col s12">
				@endif
					{!! Form::open(array('url' => '/register', 'method' => 'post')) !!}
						<div class="row">
							<div class="input-field col s6">
								<input type="text" id="first-name" name="first_name">
								<label for="first-name">First Name</label>
							</div>
							<div class="input-field col s6">
								<input type="text" id="last-name" name="last_name">
								<label for="last-name">Last Name</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input type="text" id="email" name="email">
								<label for="email">Email</label>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s6 offset-s3">
								<select name="role">
									<option value="" disabled selected>Choose a role</option>
									<option value="Member">Member</option>
									<option value="Staff">Staff</option>
									<option value="Admin">Admin</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="input-field col s12">
								<input type="password" id="password" name="password">
								<label for="password">Password</label>
							</div>
							<div class="input-field col s12">
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

@section('scripts')

<script type="text/javascript">
	$(document).ready(function() {
		$('select').material_select();
	});	
</script>

@endsection
