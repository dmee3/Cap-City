@extends('layouts.master')

@section('styles')
	<link type="text/css" rel="stylesheet" href="css/contact.css"/>
@endsection

@section('content')

	@yield('content2')

	<div id="contact" class="section cap-blue cap-white-text">
		<div class="container row">
			<h2>Contact Us</h2>
			{!! Form::open(array('action' => 'ContactController@sendContactInfo', 'method' => 'post', 'class' => 'col s12')) !!}
				<div class="row">
					<div class="hl-teal input-field col s6">
						<input id="contact-name" type="text" name="name">
						<label for="contact-name">Name</label>
					</div>
					<div class="hl-teal input-field col s6">
						<input id="contact-email" type="email" class="validate" name="email">
						<label for="contact-email" data-error="Please enter a valid email address">Email</label>
					</div>
				</div>
				<div class="row">
					<div class="hl-teal input-field col s12">
						<textarea id="contact-message" class="materialize-textarea" name="message"></textarea>
						<label for="contact-message">What's up?</label>
					</div>
				</div>
				<div class="row">
					<div class="col s12 center">
						<button class="btn-large cap-red" type="submit" name="action">Go!</button>
					</div>
				</div>
			{!! Form::close() !!}
		</div>
	</div>

@endsection
