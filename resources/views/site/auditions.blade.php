@extends('layouts.master')

@section('styles')
	<link type="text/css" rel="stylesheet" href="css/auditions.css"/>
@endsection

@section('content')

	<div class="section cap-blue cap-white-text" id="auditions">
		<div class="container row">
			<h2>2017 Auditions</h2>
			<div class="row">
				<div id="cookie-check" class="col s12" style="display: none;">
					<p class="cap-red-text">Warning!  You have cookies disabled in your browser, please enable them to fill out this form.</p>
				</div>
				<div class="col s12 m6 l4">
					<h5>Details</h5>
					<p class="thin-text">We will be holding our auditions for the 2017 season on 9/25 and 10/2 from 10 am to 6 pm (registration begins at 9 am).</p>
				</div>
				<div class="col s12 m6 l4">
					<h5>Location</h5>
					<p class="thin-text">Franklin Heights High School<br>1001 Demorest Rd<br>Columbus, OH, 43204</p>
				</div>
				<div class="col s12 m6 offset-m3 l4">
					<h5>Fees</h5>
					<p class="thin-text">The audition fee is $65, and includes both days of instruction.  The audition packet itself is $15.  You can register at 9 am on the first day of auditions, or pre-register below to receive a packet for free!</p>
				</div>
			</div>
			@include('common.errors')
			{!! Form::open(array('action' => 'AuditionController@signUp', 'method' => 'post', 'id' => 'audition-form', 'class' => 'col s12')) !!}
				<div class="row">
					<h4>Personal Info</h4>
					<div class="input-field col s6">
						<input id="audition-first-name" type="text" name="first">
						<label for="audition-first-name">First Name</label>
					</div>
					<div class="input-field col s6">
						<input id="audition-last-name" type="text" name="last">
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
				<br><br><br>
				<div class="row">
					<h4>Audition Info</h4>
					<div class="input-field col s4">
						<select id="audition-instr1" name="instr1">
							<option value="" disabled selected>First Choice</option>
							<option value="Snare">Snare</option>
							<option value="Tenors">Tenors</option>
							<option value="Bass">Bass</option>
							<option value="Cymbals">Cymbals</option>
							<option value="Marimba">Marimba</option>
							<option value="Vibes">Vibes</option>
							<option value="Xylophone">Xylophone</option>
							<option value="Drumset">Drumset</option>
							<option value="Synthesizer">Synthesizer</option>
							<option value="Bass Guitar">Bass Guitar</option>
							<option value="Auxiliary">Auxiliary</option>
						</select>
						<label for="audition-instr1">Instrument</label>
					</div>
					<div class="input-field col s4">
						<select id="audition-instr2" name="instr2">
							<option value="" disabled selected>Second Choice</option>
							<option value="Snare">Snare</option>
							<option value="Tenors">Tenors</option>
							<option value="Bass">Bass</option>
							<option value="Cymbals">Cymbals</option>
							<option value="Marimba">Marimba</option>
							<option value="Vibes">Vibes</option>
							<option value="Xylophone">Xylophone</option>
							<option value="Drumset">Drumset</option>
							<option value="Synthesizer">Synthesizer</option>
							<option value="Bass Guitar">Bass Guitar</option>
							<option value="Auxiliary">Auxiliary</option>
						</select>
					</div>
					<div class="input-field col s4">
						<select id="audition-instr3" name="instr3">
							<option value="" disabled selected>Third Choice</option>
							<option value="Snare">Snare</option>
							<option value="Tenors">Tenors</option>
							<option value="Bass">Bass</option>
							<option value="Cymbals">Cymbals</option>
							<option value="Marimba">Marimba</option>
							<option value="Vibes">Vibes</option>
							<option value="Xylophone">Xylophone</option>
							<option value="Drumset">Drumset</option>
							<option value="Synthesizer">Synthesizer</option>
							<option value="Bass Guitar">Bass Guitar</option>
							<option value="Auxiliary">Auxiliary</option>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<textarea id="audition-reason" placeholder="Why do you want to be a part of Cap City?" class="materialize-textarea" name="reason"></textarea>
						<label for="audition-reason">Reason</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<textarea id="audition-experience" placeholder="Where have you marched before?  Please be specific." class="materialize-textarea" name="experience"></textarea>
						<label for="audition-experience">Experience</label>
					</div>
				</div>
				<br><br><br>
				<div class="row">
					<h4>Payment Info</h4>
					<div class="payment-errors cap-red-text"></div>
					<div class="col m6 s12">
						<p>
							<input type="checkbox" class="filled-in" id="audition-packet" name="packet">
							<label for="audition-packet" id="audition-packet-lbl">Packet ($15)</label>
						</p>
						<p class="thin-text" style="font-size: 1rem;">Contains information and exercises for our approach to both front ensemble and battery.</p>
						<p>
							<input type="checkbox" class="filled-in" id="audition-register" name="register">
							<label for="audition-register" id="audition-register-lbl">Register + Packet ($65)</label>
						</p>
						<p class="thin-text" style="font-size: 1rem;">Register now and receive a free audition packet!  The audition is both days and consists of playing in an ensemble and as an individual.</p>
						<p>
							<input type="checkbox" class="filled-in chipotle-checkbox" id="audition-chipotle1" name="chipotle1" disabled>
							<label for="audition-chipotle1" id="">Chipotle 9/25 ($12)</label>
						</p>
						<p class="thin-text" style="font-size: 1rem;">Have chipotle brought right to you for your lunch break on the first day of auditions!  Includes 1 entree and pop/potato chips.  We will get order details from you on the morning of the 25th.</p>
						<p>
							<input type="checkbox" class="filled-in chipotle-checkbox" id="audition-chipotle2" name="chipotle2" disabled>
							<label for="audition-chipotle2" id="">Chipotle 10/2 ($12)</label>
						</p>
						<p class="thin-text" style="font-size: 1rem;">Same deal as above, but for the second day of auditions.</p>
						<p>
							<input type="checkbox" class="filled-in" id="processing-fee" disabled>
							<label for="processing-fee">Processing Fee ($3)</label>
						</p>
					</div>
					<div class="col m6 s12">
						<div class="col s12 center">
							<h3 id="payment-total">$0</h3>
					</div>
						<div class="input-field hl-teal col s12">
							<input type="text" size="20" data-stripe="number" id="stripe-number">
							<label for="stripe-number">Card Number</label>
						</div>
						<div class="input-field hl-teal col s5 m6">
							<input type="text" placeholder="MM"  size="2" data-stripe="exp_month" id="stripe-month">
							<label for="stripe-month">Expiration Month</label>
						</div>
						<div class="input-field hl-teal col s5 m6">
							<input type="text" placeholder="YY" size="2" data-stripe="exp_year" id="stripe-year">
							<label for="stripe-year">Expiration Year</label>
						</div>
						<div class="input-field hl-teal col s2 m4 offset-m4">
							<input type="text" size="4" data-stripe="cvc" id="stripe-cvc">
							<label for="stripe-cvc">CVC</label>
						</div>
					</div>
				</div>
				<div class="row center">
					<input id="register" type="submit" class="btn-large cap-black" value="Submit" disabled>
				</div>
				<div class="row center">
					<div id="processing" class="preloader-wrapper">
						<div class="spinner-layer">
							<div class="circle-clipper left"><div class="circle"></div></div>
							<div class="gap-patch"><div class="circle"></div></div>
							<div class="circle-clipper right"><div class="circle"></div></div>
						</div>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection

@section('scripts')
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
	<script type="text/javascript">
		var pub_key = '{{ env('STRIPE_PUBLIC') }}';
	</script>
	<script src="/js/auditions.js"></script>
@endsection
