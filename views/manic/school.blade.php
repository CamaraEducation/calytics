@extends('layout.app')
@section('menu', '')
@section('submenu', 'manic')
@section('styles')

@endsection
@section('content')	
	<div class="content-wrapper">
        <div class="row gutter">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Uptime (hrs)</div>
                    </div>
                    <div class="card-body">
                        <canvas id="sc_active"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Active vs Away vs Offline (hrs)</div>
                    </div>
                    <div class="card-body">
                        <canvas id="sc_active_vs_away"></canvas>
                        <div class="active-vs-away">
                            <br>
                        </div>
                    </div>
                </div>
            </div>
            
            
            @php $manic_apps = ManicStatsController::sc_apps($id, 100); @endphp
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card h-320">
                    <div class="card-header">
                        <div class="card-title text-primary">Opened Application</div>
                    </div><br>
                    <div class="card-body app-card">
                        <ul class="statistics">
                            @foreach ($manic_apps as $app)
                                <li data-value="{{$app['name']}}" class="av-toogle">
                                    <span class="stat-app">
                                        <img src="/{{IconsController::app($app['name'])}}" 
                                            class="sc-flag" alt="{{$app['name']}}"
                                        >
                                    </span>
                                    {{$app['name']}}<br>
                                    {{TimeController::calc($app['duration'])}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card h-320">
                    <div class="card-header">
                        <div class="card-title text-primary" id="appTitle">Application Overview</div>
                    </div><br>
                    <div class="card-body file-card av-target" id="av">
                        <div class="empty-card"></div>
                    </div>
                </div>
            </div>

            @php $manic_files = ManicStatsController::sc_files($id, 100); @endphp
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card h-320">
                    <div class="card-header">
                        <div class="card-title text-primary">Viewed Files</div>
                    </div><br>
                    <div class="card-body file-card">
                        <ul class="statistics">
                            @foreach ($manic_files as $file)
                                <li class="fv-toggle" data-value="{{$file['name']}}">
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

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card h-320">
                    <div class="card-header">
                        <div class="card-title text-primary" id="fileTitle">File Overview</div>
                    </div><br>
                    <div class="card-body file-card" id="fv">
                        <div class="empty-card"></div>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection
@section('scripts')
@js('https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js')
@js('https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js')
@js('/assets/js/chart')
<script>
	$(document).ready(function() {
        var aa_time = {!! json_encode(ManicStatsController::sc_active($id)) !!};

        var utime = aa_time['active'].reduce((a, b) => a + b, 0).toFixed(0);
	    var atime = aa_time['away'].reduce((a, b) => a + b, 0).toFixed(0);

        area_sc_active(aa_time['active']);
        sc_active_vs_away(utime, atime);

        //on av-toggle click
        $('.av-toogle').click(function() {
            var app = $(this).data('value');

            $.ajax({
                url: '/manic/app/'+app+'/'+{{$id}},
                type: 'GET',
                success: function(data){
                    $('#appTitle').html(app + ' Overview');
                    $('#av').html(data);
                }
            });
        });

        //on fv-toggle click
        $('.fv-toggle').click(function() {
            var file = $(this).data('value');

            $.ajax({
                url: '/manic/file/'+file+'/'+{{$id}},
                type: 'GET',
                success: function(data){
                    $('#fileTitle').html(file + ' Usage Statistics');
                    $('#fv').html(data);
                }
            });
        });
    });
</script>
@endsection