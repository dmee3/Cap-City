@extends('layouts.staff')

@section('content')

	<div class="section">
		<div class="container">
			<div class="card white">
				<div class="card-content">
					<div class="row">
						<div class="col s12">
							<h2>Change Password</h2>
						</div>
					</div>
					<div class="row">
						@if(count($errors) > 0)
							@include('common.errors-side')
							<div class="col s12 m8 pull-m4">
						@else
							<div class="col s12">
						@endif
							{!! Form::open(['action' => 'HomeController@changePassword']) !!}
								<div class="input-field hl-black col s12">
									<input type="password" id="old-pass" name="old_pass">
									<label for="old-pass">Old Password</label>
								</div>
								<div class="input-field hl-black col s12">
									<input type="password" id="new-pass" name="new_pass">
									<label for="new-pass">New Password</label>
								</div>
								<div class="input-field hl-black col s12">
									<input type="password" id="confirm-pass" name="confirm_pass">
									<label for="confirm-pass">Confirm New Password</label>
								</div>
								<div class="col s12 center">
									<button type="submit" class="btn cap-green">Change</button>
								</div>
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
