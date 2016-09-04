@extends('layouts.members')

@section('content')

<div id="dashboard-bg">
	<div class="container">

		<div class="row">
			<h3 class="cap-white-text">Dashboard</h3>
			<div class="divider"></div>
		</div>

		<div class="row">

			<div class="col s12 m6">
				<a href="/members/payments">
					<div class="card dashboard-card hoverable cap-black white-text">
						<div class="card-content">
							<h5 class="thin">Dues</h5>
							<div class="row">
								<div class="col s6 center">
									<h3>${{ $paid }}</h3>
									<p>Paid</p>
								</div>
								<div class="col s6 center">
									<h3>$1450</h3>
									<p>Total Owed</p>
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
