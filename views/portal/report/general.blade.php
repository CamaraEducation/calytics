<div>
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
										<span>{{PortalReports::unique_schools()}}</span> 
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
										<span>{{PortalReports::unique_sessions()}}</span> 
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
										<span>{{PortalReports::live_time()}}</span> 
										- Live Time
									</h6>
								</div>
							</div>
						</div>
					</div>
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
					<canvas id="rp_dt_portal_activity">

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
					<canvas id="rp_dt_portal_live_time">

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
					<canvas id="rp_top_applets">

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
					<canvas id="rp_top_docs">

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
					<canvas id="rp_top_videos">

					</canvas>
				</div>
			</div>
		</div>
	</div> 
</div>

<script>
	var report = {!! PortalReports::fetch_report(); !!}

	portal_date_sess(report.sess.date, report.sess.sess, 'rp_dt_portal_activity');
	portal_date_ltime(report.live.date, report.live.live, 'rp_dt_portal_live_time');
	top_applets(report.apps.title, report.apps.activity, 'rp_top_applets');
	top_videos(report.videos.title, report.videos.activity, 'rp_top_videos');
	top_docs(report.docs.title, report.docs.activity, 'rp_top_docs');
</script>