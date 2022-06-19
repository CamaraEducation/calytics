<div class="card">
    <div class="card-header">
        <div class="card-title text-primary">Brief Overview</div>
    </div>

    <div class="card-body sc-brief">
        <div class="row gutter">
            <div class="col-md-8">
                <div class="card-title text-primary">Uptime Time</div>
                <canvas id="sc_active"></canvas>
            </div>
            <div class="col-md-4">
                <canvas id="sc_active_vs_away"></canvas>
            </div>
        </div>

        <div class="row gutter">
            <div class="col-md-6 col-sm-12">
                @php $manic_apps = ManicStatsController::sc_apps($id, 5); @endphp
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card h-320">
                        <div class="card-header">
                            <div class="card-title text-primary">Top 5 Apps</div>
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
            </div>

            <br>

            <div class="col-md-6 col-sm-12">
                @php $manic_files = ManicStatsController::sc_files($id, 5); @endphp
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card h-320">
                        <div class="card-header">
                            <div class="card-title text-primary">Most Opened Files</div>
                        </div>
                        <div class="card-body">
                            <ul class="statistics">
                                @foreach ($manic_files as $file)
                                    <li>
                                        <span class="stat-app">
                                            <img src="/{{IconsController::doc($file['name'])}}" class="sc-flag" alt="{{$file['name']}}">
                                        </span>
                                        {{$file['name']}}<br>
                                        {{TimeController::calc($file['duration'])}}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@js('https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js')
@js('/assets/js/chart.js')
<script>
    $(document).ready(function() {
        var aa_time = {!! json_encode(ManicStatsController::sc_active($id)) !!};

        var utime = aa_time['active'].reduce((a, b) => a + b, 0).toFixed(0);
	    var atime = aa_time['away'].reduce((a, b) => a + b, 0).toFixed(0);

        area_sc_active(aa_time['active']);
        sc_active_vs_away(utime, atime);
    });
</script>