@extends('layouts.app-basic')

@section('content')

	<div class="section white">
		<div class="container">
			<div class="row">
				<h4 class="cap-blue-text">Login</h4>
				<div id="cookie-check" class="col s12" style="display: none;">
					<p class="cap-red-text">Warning!  You have cookies disabled in your browser, please enable them to fill out this form.</p>
				</div>
			</div>
			<div class="row">
				@if(count($errors) > 0)
					@include('common.errors-side')
					<div class="col s12 m8 pull-m4">
				@else
					<div class="col s12">
				@endif

					@if (session('status'))
						<div class="col s12">
							<div class="card-panel cap-green">
								<p class="white-text">{{ session('status') }}</p>
							</div>
						</div>
					@endif

					{!! Form::open(array('url' => '/login', 'method' => 'post')) !!}
						<div class="row">
							<div class="hl-black input-field col s12">
								<input type="text" id="email" name="email">
								<label for="email">Email</label>
							</div>
							<div class="hl-black input-field col s12">
								<input type="password" id="password" name="password">
								<label for="password">Password</label>
							</div>
						</div>
						<div class="row">
							<div class="col s12">
							<p>
								<input type="checkbox" id="remember" name="remember" checked>
								<label for="remember">Remember Me</label>
							</p>
							</div>
						</div>
						<div class="row">
							<div class="col s12 m6 center">
								<input type="submit" class="btn cap-green" value="Login"></input>
							</div>
							<div class="col s12 hide-on-med-and-up"><br></div>
							<div class="col s12 m6 center">
								<a class="modal-trigger btn cap-black" href="#password-reset">Forgot Password?</a>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>

	<div id="password-reset" class="modal cap-black-text">
		{!! Form::open(array('url' => '/password/email', 'method' => 'post')) !!}
			<div class="modal-content white">
				<h4>Reset Password</h4>
				<div class="hl-black input-field col s12">
					<input type="text" id="reset-email" name="email">
					<label for="reset-email">Email</label>
				</div>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn-flat waves-effect waves-red modal-action modal-close">Close</a>
				<button type="submit" class="btn-flat modal-action modal-close">Send Email</button>
			</div>
		{!! Form::close() !!}
	</div>


@endsection

@section('scripts')

	<script type="text/javascript">
	$(document).ready(function() {
		$('.modal-trigger').leanModal();
		if (!cookiesEnabled()) {
			$('#cookie-check').show();
		}
	});

	function cookiesEnabled() {
		var cookieEnabled = (navigator.cookieEnabled) ? true : false;

		if (typeof navigator.cookieEnabled == "undefined" && !cookieEnabled) { 
			document.cookie="testcookie";
			cookieEnabled = (document.cookie.indexOf("testcookie") != -1) ? true : false;
		}

		return (cookieEnabled);
	}
	</script>

@endsection
