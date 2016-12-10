@extends('layouts.admin')

@section('content')

	<div id="app" class="container">
		<br>
		<div class="row">

<!--
			<div class="col s12">
				<a href="/admin/payments">
					<div class="card hoverable white cap-black-text">


					</div>
				</a>
			</div>

			<div class="col s12 m6">
				<a href="/admin/registrations">
					<div class="card dashboard-card hoverable cap-black white-text">
						<div class="card-content">
							<h5 class="thin">Registrations</h5>
							<div class="row">
								<div class="col s6 center">
									<h3>{{ $reg['week'] }}</h3>
									<p>Past Week</p>
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
-->
			<div class="col s12 m8">
				<a href="/admin/dues">
					<div class="card dashboard-card hoverable white cap-green-text">
						<div class="card-content">
							<h5 class="thin">Payments</h5>
							<div class="row">
								<div class="col s6 center">
									<h3>${{ $pay['week'] }}</h3>
									<p>Last Week</p>
								</div>
								<div class="col s6 center">
									<h3>{{ date('n/j', strtotime($nextPayment->due_date)) }}</h3>
									<p>Next Pay Date</p>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

			<div class="col s12 m4">
				<a href="/admin/conflicts">
					<div class="card dashboard-card hoverable white cap-red-text">
						<div class="card-content">
							<h5 class="thin">Conflicts</h5>
							<div class="row">
								<div class="col s12 center">
									<h3>{{ $pending }}</h3>
									<p>Pending</p>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

		</div>
		<div class="row">

			<div class="col s6 m4">
				<a href="/admin/members">
					<div class="card dashboard-card hoverable cap-blue white-text">
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

			<div class="col s6 m4">
				<a href="/admin/staff">
					<div class="card dashboard-card hoverable cap-blue white-text">
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

			<div class="col s12 m4">
				<a href="/schedule">
					<div class="card dashboard-card hoverable cap-black white-text">
						<div class="card-content">
							<h5 class="thin">Next Show</h5>
							<div class="row">
								<div class="col s12 center">
									<h5>Sunday, 2/4</h5>
									<p class="thin">Olentangy Liberty High School</p>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>

		</div>
	</div>

@endsection
