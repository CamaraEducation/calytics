@extends('layout.app')
@section('menu', '')
@section('submenu', 'manic')
@section('title', 'DashBoard Brief')
@section('styles')

@endsection
@section('content')	
	<div class="content-wrapper">

		<!-- Row start -->
		<div class="row gutters">
			<div class="col-xl-12">

				<!-- Dashboard header start -->
				<div class="dashboard-header">
					<div class="dashboard-header-content">

						<!-- Top Actions - DateRange and Buttons -->
						<div class="d-flex justify-content-end" style="visibility: hidden">
							<!-- Field wrapper start -->
							<div class="field-wrapper m-0">
								<div class="input-group">
									<input type="text" class="form-control custom-daterange2">
									<span class="input-group-text">
										<i class="icon-calendar1"></i>
									</span>
								</div>
								<div class="field-placeholder">Select Date</div>
							</div>
							<!-- Field wrapper end -->
							<a href="#" class="btn"><i class="icon-download1"></i> <span>Reports</span></a>
						</div>

						<!-- Welcome Title -->
						<div class="welcome-title">
							<h1>Welcome to <span>Calytics</span>
								<span class="winner-icon">
									<img src="/assets/img/trophy.svg" alt="trophy">
								</span>
							</h1>
							<p class="text-bold text-white">Camara Analytics dashboard</p>
						</div>

						<!-- Sales Tiles COntainer -->
						<div class="sales-tile-container">
							<div class="sales-tile">
								<h1>6</h1>
								<h6>Countries</h6>
							</div>
							<div class="sales-tile">
								<h1>{{SchoolController::sc_count()}}</h1>
								<h6>Schools</h6>
							</div>
							<div class="sales-tile">
								<h1>{{ProjectController::count()}}</h1>
								<h6>Projects</h6>
							</div>
						</div>
					</div>
				</div>
				<!-- Dashboard header end -->

			</div>
		</div>
		<!-- Row end -->

		<!-- Row start -->
		<div class="row gutters">
			<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Uptime vs DownTime (Manic hrs)</div>
					</div>
					<div class="card-body">
						<canvas id="bar_utime_vs_dtime">

						</canvas>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Active vs Away (hrs)</div>
					</div>
					<div class="card-body">
						<canvas id="active_vs_away_vs_offline"></canvas>
						<div class="active-vs-away">
							<p class="text-bold text-center">								
								<span id="atime">Away:</span>
								<span id="utime">Active:</span>
							</p>
						</div>
					</div>
				</div>
			</div>
			
			@php $manic_apps = ManicStatsController::top_apps(5); @endphp
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
				<div class="card h-320">
					<div class="card-header">
						<div class="card-title">Manic Top 5</div>
					</div>
					<div class="card-body">
						<ul class="statistics">
							@foreach ($manic_apps as $app)
								<li>
									<span class="stat-app">
										<img src="/{{IconsController::app($app['name'])}}" class="sc-flag" alt="{{$app['name']}}">
									</span>
									{{$app['name']}}<br>
									{{TimeController::calc($app['duration'])}}
								</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
				<div class="card h-320">
					<div class="card-header">
						<div class="card-title">NMS Top 5</div>
					</div>
					<div class="card-body">
						<ul class="statistics">
							<li>
								<span class="stat-app">
									<i class="icon-danger"></i>
								</span>
								No Data Found
							</li>
						</ul>
					</div>
				</div>
			</div>
			@php $active_schools = ManicStatsController::active_schools(5); @endphp
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
				<div class="card h-320">
					<div class="card-header">
						<div class="card-title">Top 5 Active Schools (Manic)</div>
					</div>
					<div class="card-body">
						<ul class="statistics">
							@foreach ($active_schools as $stat)
							@php $sc = SchoolController::get($stat['sid']); @endphp
							<li>
								<span class="stat-icon">
									<img src="/assets/img/flags/1x1/{{strtolower($sc['sc_country'])}}.svg" class="sc-flag" alt="{{$sc['sc_name']}}">
								</span>
								{{$sc['sc_name']}}<br>
								{{TimeController::calc($stat['duration'])}}
							</li>								
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- Row end -->		

	</div>
@endsection
@section('scripts')
@js('https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js')
@js('https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js')
@js('/assets/js/chart')
<script>
	var aa_time =  {!! json_encode(ManicStatsController::active_away()) !!};
	var utime = aa_time['active'].reduce((a, b) => a + b, 0).toFixed(0);
	var atime = aa_time['away'].reduce((a, b) => a + b, 0).toFixed(0);

	bar_utime_vs_dtime(aa_time['active'], aa_time['away']);
	active_vs_away(utime, atime);
	
	$('#utime').html('Active: ' + utime + ' hrs');
	$('#atime').html('Idle: ' + atime + ' hrs, ');

</script>
@endsection