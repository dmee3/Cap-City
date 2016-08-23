@extends('layouts.master')

@section('styles')
	<link type="text/css" rel="stylesheet" href="css/placeholder.css"/>
@endsection

@section('content')

	<div class="valign-wrapper section cap-white coming-soon">
		<h5 class="valign">
			@yield('message')
		</h5>
	</div>

@endsection
