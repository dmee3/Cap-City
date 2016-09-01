@extends('layouts.app')

@section('content')

<div class="section white">
	<div class="container">

		<div class="row">
			<h3 class="cap-blue-text">Dashboard</h3>
			<div class="divider"></div>
		</div>

		<div class="row">

			<div class="col s12 m6">
				<a href="/admin/registrations">
					<div class="card-panel hoverable small cap-black white-text">
						<h4 class="thin">Registrations</h4>
						<div class="row">
							<div class="col s6 center">
								<h3>{{ $reg['three'] }}</h3>
								<p>Last 3 Days</p>
							</div>
							<div class="col s6 center">
								<h3>{{ $reg['total'] }}</h3>
								<p>Total</p>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col s12 m6">
				<a href="/admin/payments">
					<div class="card-panel hoverable small cap-green white-text">
						<h4 class="thin">Payments</h4>
						<div class="row">
							<div class="col s6 center">
								<h3>${{ $pay['week'] }}</h3>
								<p>Last Week</p>
							</div>
							<div class="col s6 center">
								<h3>${{ $pay['month'] }}</h3>
								<p>Last Month</p>
							</div>
						</div>
					</div>
				</a>
			</div>

		</div>
		<div class="row">

			<div class="col s6 m3">
				<a href="/admin/members">
					<div class="card-panel hoverable small cap-blue white-text">
						<h4 class="thin">Members</h4>
						<div class="row">
							<div class="col s12 center">
								<h3>{{ $members }}</h3>
								<p>&nbsp;</p>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col s6 m3">
				<a href="/admin/staff">
					<div class="card-panel hoverable small cap-black white-text">
						<h4 class="thin">Staff</h4>
						<div class="row">
							<div class="col s12 center">
								<h3>{{ $staff }}</h3>
								<p>&nbsp;</p>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col s6 m3">
				<a href="/schedule">
					<div class="card-panel hoverable small cap-black white-text">
						<h4 class="thin">Next Show</h4>
						<div class="row">
							<div class="col s12 center">
								<h3>Sunday, 2/4</h3>
								<p class="thin">Olentangy Liberty High School</p>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col s6 m3">
				<a href="/admin/conflicts">
					<div class="card-panel hoverable small cap-red white-text">
						<h4 class="thin">Conflicts</h4>
						<div class="row">
							<div class="col s12 center">
								<h3>{{ $conflicts }}</h3>
								<p>Next Month</p>
							</div>
						</div>
					</div>
				</a>
			</div>

		</div>
	</div>
</div>
@endsection
