@extends('layouts.master')

@section('content')

	@yield('content2')

	<div id="contact" class="section cap-blue cap-white-text">
		<div class="container row">
			<h2>Contact Us</h2>
			<form action="/contact" method="post" class="col s12">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<div class="row">
					<div class="input-field col s6">
						<input id="contact-name" type="text" name="name">
						<label for="contact-name">Name</label>
					</div>
					<div class="input-field col s6">
						<input id="contact-email" type="email" class="validate" name"email">
						<label for="contact-email" data-error="Please enter a valid email address">Email</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field col s12">
						<textarea id="contact-message" class="materialize-textarea" name="message"></textarea>
						<label for="contact-message">What's up?</label>
					</div>
				</div>
				<div class="row">
					<div class="col s12 center">
						<button class="btn-large cap-red" type="submit" name="action">Go!</button>
					</div>
				</div>
			</form>
		</div>
	</div>

@endsection
