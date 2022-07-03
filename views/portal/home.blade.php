@extends('layout.app')
@section('menu', 'portal')
@section('submenu', 'portal')
@section('title', 'Portal Brief')
@section('styles')

@endsection
@section('content')

    <div class="content-wrapper">
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
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
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
                    </div>
                </div>
            </div>
        </div>

		<div class="row gutters">
			<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Portal Activity (Counts)</div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="activity-tab" data-bs-toggle="tab" href="#activity" role="tab" aria-controls="activity" aria-selected="true">By Months</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="dt_activity-tab" data-bs-toggle="tab" href="#dt_activity" role="tab" aria-controls="dt_activity" aria-selected="false">By Dates</a>
                            </li>
                        </ul>
					</div>
					<div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="activity" role="tabpanel">
                                <canvas id="portal_activity">

                                </canvas>
                            </div>
                            <div class="tab-pane fade" id="dt_activity" role="tabpanel">
                                <canvas id="dt_portal_activity">

                                </canvas>
                            </div>
                        </div>
					</div>
				</div>
			</div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">Live Time (hrs)</div>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="live-tab" data-bs-toggle="tab" href="#live" role="tab" aria-controls="live" aria-selected="true">By Months</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="dt_live-tab" data-bs-toggle="tab" href="#dt_live" role="tab" aria-controls="dt_live" ari~a-selected="false">By dates</a>
                            </li>
                        </ul>
					</div>
					<div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="live" role="tabpanel">
                                <canvas id="portal_live_time">

                                </canvas>
                            </div>
                            <div class="tab-pane fade" id="dt_live" role="tabpanel">
                                <canvas id="dt_portal_live_time">

                                </canvas>
                            </div>
                        </div>
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
@endsection
@section('scripts')
@js('https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js')
@js('/assets/js/chart')
<script>
	var rm_sess = {!! json_encode(PortalController::month_session_graph()) !!};
    var rd_sess = {!! json_encode(PortalController::date_session_graph()) !!};
    var rm_time = {!! json_encode(PortalController::month_liveTime_graph()) !!};
    var rd_time = {!! json_encode(PortalController::date_liveTime_graph()) !!};
    var applet  = {!! json_encode(PortalController::applets_stats(10)) !!};
    var video   = {!! json_encode(PortalController::video_stats(10)) !!};
    var doc     = {!! json_encode(PortalController::doc_stats(10)) !!};
    
	portal_month_sess(rm_sess);
    portal_date_sess(rd_sess.date, rd_sess.sess);
    portal_month_ltime(rm_time);
    portal_date_ltime(rd_time.date, rd_time.live);
    top_applets(applet.title, applet.activity);
    top_videos(video.title, video.activity);
    top_docs(doc.title, doc.activity);

</script>
@endsection