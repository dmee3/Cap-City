@extends('layouts.master')

@section('content')

	<div class="section cap-white" style="min-height: 300px;">
		<div class="container row">
			<h2 class="cap-blue-text">2017 Auditions</h2>
			{!! Form::open(array('action' => 'AuditionController@signUp', 'method' => 'post', 'class' => 'col s12')) !!}
				<div class="row">
					<div class="input-field col s6">
						<input id="audition-first-name" type="text" name="firstName">
						<label for="audition-first-name">First Name</label>
					</div>
					<div class="input-field col s6">
						<input id="audition-last-name" type="text" name="lastName">
						<label for="audition-last-name">Last Name</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s6">
						<input id="audition-email" type="email" class="validate" name="email">
						<label for="audition-email" data-error="Please enter a valid email address">Email</label>
					</div>
					<div class="input-field col s6">
						<input id="audition-phone" type="tel" name="phone">
						<label for="audition-phone">Phone</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<input id="audition-address-1" type="text" name="address1">
						<label for="audition-address-1">Address</label>
					</div>
					<div class="input-field col s12">
						<input id="audition-address-2" type="text" name="address2">
						<label for="audition-address-2">Address 2</label>
					</div>
					<div class="input-field col s6">
						<input id="audition-city" type="text" name="city">
						<label for="audition-city">City</label>
					</div>
					<div class="input-field col s3">
						<select id="audition-state" name="state">
							<option value="" disabled selected>Choose your state</option>
							<option value="AK">AK</option>
							<option value="AL">AL</option>
							<option value="AR">AR</option>
							<option value="AZ">AZ</option>
							<option value="CA">CA</option>
							<option value="CO">CO</option>
							<option value="CT">CT</option>
							<option value="DC">DC</option>
							<option value="DE">DE</option>
							<option value="FL">FL</option>
							<option value="GA">GA</option>
							<option value="HI">HI</option>
							<option value="IA">IA</option>
							<option value="ID">ID</option>
							<option value="IL">IL</option>
							<option value="IN">IN</option>
							<option value="KS">KS</option>
							<option value="KY">KY</option>
							<option value="LA">LA</option>
							<option value="MA">MA</option>
							<option value="MD">MD</option>
							<option value="ME">ME</option>
							<option value="MI">MI</option>
							<option value="MN">MN</option>
							<option value="MO">MO</option>
							<option value="MS">MS</option>
							<option value="MT">MT</option>
							<option value="NC">NC</option>
							<option value="ND">ND</option>
							<option value="NE">NE</option>
							<option value="NH">NH</option>
							<option value="NJ">NJ</option>
							<option value="NM">NM</option>
							<option value="NV">NV</option>
							<option value="NY">NY</option>
							<option value="OH">OH</option>
							<option value="OK">OK</option>
							<option value="OR">OR</option>
							<option value="PA">PA</option>
							<option value="RI">RI</option>
							<option value="SC">SC</option>
							<option value="SD">SD</option>
							<option value="TN">TN</option>
							<option value="TX">TX</option>
							<option value="UT">UT</option>
							<option value="VA">VA</option>
							<option value="VT">VT</option>
							<option value="WA">WA</option>
							<option value="WI">WI</option>
							<option value="WV">WV</option>
							<option value="WY">WY</option>
						</select>
						<label for="audition-state">State</label>
					</div>
					<div class="input-field col s3">
						<input id="audition-zip" type="text" name="zip">
						<label for="audition-zip">Zip</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<textarea id="audition-why" placeholder="Why do you want to be a part of Cap City?" class="materialize-textarea" name="why"></textarea>
						<label for="audition-why">Reason</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<textarea id="audition-experience" placeholder="Where have you marched before?  Please be specific." class="materialize-textarea" name="why"></textarea>
						<label for="audition-experience">Experience</label>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection

@section('scripts')
	<script src="/js/auditions.js"></script>
@endsection
