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
							<option value=""></option>
						</select>
						<label for="audition-state">State</label>
					</div>
					<div class="input-field col s3">
						<input id="audition-zip" type="text" name="zip">
						<label for="audition-zip">Zip</label>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection

address
phone
why
prior experience - placeholder text
