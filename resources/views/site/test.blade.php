@extends('layouts.master')

@section('styles')
	<link type="text/css" rel="stylesheet" href="css/auditions.css"/>
@endsection

@section('content')

	<div class="section cap-white">
			<div class="container row center cap-green-text">
				<h2>Thank You!</h2>
				<div class="row">
					<br>
					<h5>Your download should start momentarily.  If it does not, please click the button below.</h5>
					@if (!empty($email))
						<h5 class="thin">We've also sent an email to {{ $email }} with the packet attached.</h5>
					@endif
					<br>
				</div>
				<div class="row">
					<a href="{{ Session::get('download') }}" target="_blank" class="btn-large cap-green white-text">Download</a>
				</div>
			</div>
	</div>

@endsection
