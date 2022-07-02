@extends('layout.app')
@section('menu', '')
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
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                                    <div class="profile-tile">
                                        <span class="icon">
                                            <i class="icon-server"></i>
                                        </span>
                                        <h6>00 - <span>Total Schools</span></h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                                    <div class="profile-tile">
                                        <span class="icon">
                                            <i class="icon-map-pin"></i>
                                        </span>
                                        <h6>00 - <span>Portal Activity</span></h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                                    <div class="profile-tile">
                                        <span class="icon">
                                            <i class="icon-phone1"></i>
                                        </span>
                                        <h6>00 - <span>Active Schools</span></h6>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12">
                                    <div class="profile-tile">
                                        <span class="icon">
                                            <i class="icon-phone1"></i>
                                        </span>
                                        <h6>00 - <span>Recent Time</span></h6>
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
                                <a class="nav-link active" id="activity-tab" data-bs-toggle="tab" href="#activity" role="tab" aria-controls="activity" aria-selected="true">All Year</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="wk_activity-tab" data-bs-toggle="tab" href="#wk_activity" role="tab" aria-controls="wk_activity" aria-selected="false">This Week</a>
                            </li>
                        </ul>
					</div>
					<div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="activity" role="tabpanel">
                                <canvas id="portal_activity">

                                </canvas>
                            </div>
                            <div class="tab-pane fade" id="wk_activity" role="tabpanel">
                                <canvas id="wk_portal_activity">

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
                                <a class="nav-link active" id="live-tab" data-bs-toggle="tab" href="#live" role="tab" aria-controls="live" aria-selected="true">All Year</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="wk_live-tab" data-bs-toggle="tab" href="#wk_live" role="tab" aria-controls="wk_live" aria-selected="false">This Week</a>
                            </li>
                        </ul>
					</div>
					<div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="live" role="tabpanel">
                                <canvas id="portal_live_time">

                                </canvas>
                            </div>
                            <div class="tab-pane fade" id="wk_live" role="tabpanel">
                                <canvas id="wk_portal_live_time">

                                </canvas>
                            </div>
                        </div>
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
	var aa_time =  {!! json_encode(ManicStatsController::active_away()) !!};
	var utime = aa_time['active'].reduce((a, b) => a + b, 0).toFixed(0);
	var atime = aa_time['away'].reduce((a, b) => a + b, 0).toFixed(0);

	bar_utime_vs_dtime(aa_time['active'], aa_time['away']);
	active_vs_away(utime, atime);
	
	$('#utime').html('Active: ' + utime + ' hrs');
	$('#atime').html('Idle: ' + atime + ' hrs, ');

</script>
@endsection