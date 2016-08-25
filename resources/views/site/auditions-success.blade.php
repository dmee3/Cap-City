@extends('layouts.master')

@section('styles')
	<link type="text/css" rel="stylesheet" href="css/auditions.css"/>
	@if(Session::has('download'))
         <meta http-equiv="refresh" content="2;url={{ Session::get('download') }}">
	@endif
@endsection

@section('content')

	<div class="section cap-white">
		@if (Session::has('download'))
			<div class="container row center cap-green-text">
				<h2>Thank You!</h2>
				<div class="row">
					<br>
					<p class="flow-text">Your download should start momentarily.  If it does not, please click the button below.</p>
					<br>
				</div>
				<div class="row">
					<a href="{{ Session::get('download') }}" target="_blank" class="btn-large cap-green white-text">Download</a>
				</div>
			</div>

		@else
			<div class="container row center cap-red-text">
				<h2>Whoops...</h2>
				<div class="row">
					<br>
					<p class="flow-text">Something went wrong.  If you just attempted to buy a packet, please email dan.meehan17@gmail.com for help.  Sorry about that!</p>
					<br>
				</div>
			</div>
		@endif
	</div>

@endsection
