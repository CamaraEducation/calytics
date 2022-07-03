@extends('layout.app')
@section('menu', 'portal')
@section('submenu', 'portal')
@section('title', 'Portal Brief')
@section('styles')
<link rel="stylesheet" href="/assets/vendor/daterange/daterange.css">
@endsection
@section('content')

	<div class="content-wrapper" id="print">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

				<div class="profile-header">
					<h1>Portal Brief</h1>
					<div class="profile-header-content">
						<div class="profile-header-tiles">
							<div class="row gutters">
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
									<div class="profile-tile">
										<span class="icon">
											<i class="icon-map-pin"></i>
										</span>
										<h6>
											<span>{{PortalController::unique_schools()}}</span> 
											- Total Schools
										</h6>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
									<div class="profile-tile">
										<span class="icon">
											<i class="icon-server"></i>
										</span>
										<h6>
											<span>{{PortalController::unique_sessions()}}</span> 
											- Unique Sessions
										</h6>
									</div>
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
									<div class="profile-tile">
										<span class="icon">
											<i class="icon-clock1"></i>
										</span>
										<h6>
											<span>{{PortalController::live_time()}}</span> 
											- Live Time
										</h6>
									</div>
								</div>
							</div>
						</div>
						<div class="profile-avatar-tile no-print">
							<button class="btn btn-primary container-fluid text-bold" data-bs-toggle="modal" data-bs-target="#filterPortalReport" disabled>Filter</button>
							<div class="xs-space"></div>
							<button class="btn btn-warning container-fluid text-bold" id="btnConvert" disabled>Print</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row gutters no-print" id="filterTile">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				
				<!-- Card start -->
				<div class="card">
					<div class="card-body">
						
						<!-- Row start -->
						<div class="row gutters">
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">

								<!-- Field wrapper start -->
								<div class="field-wrapper">
									<div class="input-group">
										<input type="text" class="form-control custom-daterange2" name="range" id="ranger">
										<span class="input-group-text">
											<i class="icon-calendar1"></i>
										</span>
									</div>
									<div class="field-placeholder">Custom Date Range</div>
								</div>
								<!-- Field wrapper end -->

							</div>

							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">

								<!-- Field wrapper start -->
								<div class="field-wrapper">
									<button type="button" class="btn btn-secondary w-100" id="filter">Filter &nbsp; <i class="icon-filter"></i></button>
								</div>
								<!-- Field wrapper end -->

							</div>
						</div>
						<!-- Row end -->

					</div>
				</div>
			</div>
		</div>

		<div class="row gutters">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Portal Activity (Counts)</div>
					</div>
					<div class="card-body">
						<canvas id="dt_portal_activity">

						</canvas>
					</div>
				</div>
			</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Live Time (hrs)</div>
					</div>
					<div class="card-body">
						<canvas id="dt_portal_live_time">

						</canvas>
					</div>
				</div>
			</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Top Applets</div>
					</div>
					<div class="card-body">
						<canvas id="top_applets">

						</canvas>
					</div>
				</div>
			</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Popular Documents</div>
					</div>
					<div class="card-body">
						<canvas id="top_docs">

						</canvas>
					</div>
				</div>
			</div>

			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Popular Videos</div>
					</div>
					<div class="card-body">
						<canvas id="top_videos">

						</canvas>
					</div>
				</div>
			</div>
		</div> 
	</div>

	<div id="previewImg"></div>

	@include('modals.portal.filter_report')
@endsection
@section('scripts')
@js('https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js')
@js('/assets/js/chart')

<!-- Date Range JS -->
<script src="/assets/vendor/daterange/daterange.js"></script>
<script src="/assets/vendor/daterange/custom-daterange.js"></script>

<!--script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script-->
<script>
	var rd_sess = {!! json_encode(PortalController::date_session_graph()) !!};
	var rd_time = {!! json_encode(PortalController::date_liveTime_graph()) !!};
	var applet  = {!! json_encode(PortalController::applets_stats(10)) !!};
	var video   = {!! json_encode(PortalController::video_stats(10)) !!};
	var doc     = {!! json_encode(PortalController::doc_stats(10)) !!};
	
	portal_date_sess(rd_sess.date, rd_sess.sess);
	portal_date_ltime(rd_time.date, rd_time.live);
	top_applets(applet.title, applet.activity);
	top_videos(video.title, video.activity);
	top_docs(doc.title, doc.activity);

	generate_pdf();
	filter_report();

</script>
@endsection