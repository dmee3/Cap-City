@extends('layouts.app')

@section('content')

<div class="section cap-blue darken-2">
	<div class="container">

		<div class="row">
			<h3 class="cap-white-text">Dashboard</h3>
			<div class="divider"></div>
		</div>

		<div class="row">

			<div class="col s12 m6">
				<a href="/admin/registrations">
					<div class="card hoverable cap-black white-text">
						<div class="card-content">
							<h5 class="thin">Registrations</h5>
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
					</div>
				</a>
			</div>

			<div class="col s12 m6">
				<a href="/admin/payments">
					<div class="card hoverable cap-white cap-green-text">
						<div class="card-content">
							<h5 class="thin">Payments</h5>
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
					</div>
				</a>
			</div>

		</div>
		<div class="row">

			<div class="col s6 m3">
				<a href="/admin/members">
					<div class="card hoverable cap-blue white-text">
						<div class="card-content">
							<h5 class="thin">Members</h5>
							<div class="row">
								<div class="col s12 center">
									<h3>{{ $members }}</h3>
									<p>&nbsp;</p>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col s6 m3">
				<a href="/admin/staff">
					<div class="card hoverable cap-black white-text">
						<div class="card-content">
							<h5 class="thin">Staff</h5>
							<div class="row">
								<div class="col s12 center">
									<h3>{{ $staff }}</h3>
									<p>&nbsp;</p>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col s6 m3">
				<a href="/schedule">
					<div class="card hoverable cap-black white-text">
						<div class="card-content">
							<h5 class="thin">Next Show</h5>
							<div class="row">
								<div class="col s12 center">
									<h3>Sunday, 2/4</h3>
									<p class="thin">Olentangy Liberty High School</p>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col s6 m3">
				<a href="/admin/conflicts">
					<div class="card hoverable cap-white cap-red-text">
						<div class="card-content">
							<h5 class="thin">Conflicts</h5>
							<div class="row">
								<div class="col s12 center">
									<h3>{{ $conflicts }}</h3>
									<p>Next Month</p>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

		</div>
	</div>
</div>
@endsection
