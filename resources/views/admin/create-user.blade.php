@extends('layouts.admin')

@section('content')

<div id="app" class="container">
	<br>
	<div class="row cap-black-text">

		@if(count($errors) > 0)
			@include('common.errors-side')
			<div class="col s12 m8 pull-m4">
		@else
			<div class="col s12">
		@endif
			<div class="card">
				<div class="card-content">
					<div class="row">
						<div class="col s12">
							<h4 class="cap-grey-text">Create User</h4>
						</div>
					</div>
					{!! Form::open(['action' => 'AdminController@createUser']) !!}
						<div class="row">

							<div class="col s12 m6">
								<h5 class="cap-black-text">Basic Info</h5>
								<div class="hl-black input-field col s12 m6">
									<input type="text" id="first-name" name="first_name">
									<label for="first-name">First Name</label>
								</div>
								<div class="hl-black input-field col s12 m6">
									<input type="text" id="last-name" name="last_name">
									<label for="last-name">Last Name</label>
								</div>
								<div class="hl-black input-field col s12">
									<select id="role" name="role">
										<option value="" disabled selected>Choose a role</option>
										<option value="Member">Member</option>
										<option value="Staff">Staff</option>
										<option value="Admin">Admin</option>
									</select>
									<label for="role">Role</label>
								</div>
							</div>

							<div id="member-info" class="col s12 m6" style="display: none;">
								<h5>Member Info</h5>
								<div class="input-field hl-black col s12">
									<input type="number" id="member-dues" name="member_dues">
									<label for="member-dues">Dues</label>
								</div>
								<div class="hl-black input-field col s12">
									<select id="section" name="section">
										<option value="" disabled selected>Choose a section</option>
										<option value="Battery">Battery</option>
										<option value="Front">Front Ensemble</option>
									</select>
									<label for="section">Section</label>
								</div>
								<div class="hl-black input-field col s12">
									<select id="subsection" name="subsection">
										<option value="" disabled selected>Please choose a section first</option>
									</select>
									<label for="role">Sub-section</label>
								</div>
							</div>

							<div id="staff-info" class="col s12 m6" style="display: none;">
								<h5>Staff Info</h5>
								<div class="input-field hl-black col s6">
									<input type="text" id="staff-pos" name="staff_position">
									<label for="staff-pos">Position</label>
								</div>
								<div class="input-field hl-black col s6">
									<input type="number" id="staff-pay" name="staff_pay">
									<label for="staff-pay">Pay</label>
								</div>
								<div class="col s6 offset-s3">
									<p>Show member conflicts for:<p>
									<p>
										<input name="staff_conflict_section" type="radio" class="with-gap" id="conflicts-battery" value="Battery">
										<label for="conflicts-battery">All Battery</label>
									</p>
									<p>
										<input name="staff_conflict_section" type="radio" class="with-gap" id="conflicts-front" value="Front">
										<label for="conflicts-front">All Front</label>
									</p>
								</div>
							</div>

						</div>
						<div class="row">

							<div class="col s12">
								<h5>Account Info</h5>
								<div class="hl-black input-field col s12">
									<input type="text" id="email" name="email">
									<label for="email">Email</label>
								</div>
								<div class="hl-black input-field col s12">
									<input type="password" id="password" name="password">
									<label for="password">Password</label>
								</div>
								<div class="hl-black input-field col s12">
									<input type="password" id="password-confirmation" name="password_confirmation">
									<label for="password-confirmation">Confirm Password</label>
								</div>
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
</div>

@endsection

@section('scripts')

	<script src="/js/create-user.js" type="text/javascript"></script>

@endsection
