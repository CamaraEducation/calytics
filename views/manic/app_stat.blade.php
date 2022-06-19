@extends('layout.app')
@section('menu', '')
@section('submenu', 'manic')
@section('styles')

@endsection
@section('content')	
	<div class="content-wrapper">
        <div class="row gutter">
            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12"
            id="mainGraph">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title text-primary">Uptime (hrs)</div>
                    </div>
                    <div class="card-body">
                        <canvas id="app_stat_only"></canvas>
                    </div>
                </div>
            </div>

            @php $summary = ManicStatsController::manic_app_stat($app); 
                 $summary = $summary['duration'];
            @endphp
            <div class="col-md-4 col-sm-12" id="minorGraph">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title text-primary">Short Summary</div>
                    </div>
                    <div class="card-body">
                        <ul class="statistics">
                            <li>
                                <span class="stat-icon">
                                    <i class="icon-cloud-rain"></i>
                                </span>
                                Total Time<br>
                                {{TimeController::calc(array_sum($summary)*3600)}}
                            </li>
                            <li>
                                <span class="stat-icon">
                                    <i class="icon-cloud"></i>
                                </span>
                                Average Time<br>
                                {{TimeController::calc((array_sum($summary)*3600)/count($summary))}}
                            </li>
                            <li>
                                <span class="stat-icon">
                                    <i class="icon-cloud-lightning"></i>
                                </span>
                                Highest Time<br>
                                {{TimeController::calc(max($summary)*3600)}}
                            </li>                            
                            <li>
                                <span class="stat-icon">
                                    <i class="icon-cloud-lightning"></i>
                                </span>
                                Lowest Time<br>
                                {{TimeController::calc(min($summary)*3600)}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="sect-header">
            <h4 class="text-primary">School Usage Summary</h4>
        </div>

        <div class="row gutter">
            @php $schools = ManicStatsController::manic_top_scap($app) @endphp
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="card">
                    <div class="card-header">
                        <input type="text" class="form-control" id="search_sc" placeholder="search school">
                    </div>
                    <div class="card-body" id="schools">
                        <ul class="statistics">
                            @foreach ($schools as $school)
                            @php $sc = SchoolController::get($school['sid']); @endphp
                            <li class="pointer toggle" data-value="{{$school['sid']}}" data-detail="{{$sc['sc_name']}}">
                                <span class="stat-icon">
                                    <img src="/assets/img/flags/1x1/{{strtolower($sc['sc_country'])}}.svg" class="sc-flag" alt="{{$sc['sc_name']}}">
                                </span>
                                {{$sc['sc_name']}}<br>
                                {{TimeController::calc($school['duration'])}}
                            </li>								
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="card">
                    <div class="card-body" id="av">
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
        var app_stats = {!! json_encode(ManicStatsController::manic_app_stat($app)) !!};
        app_stat_only(app_stats['date'], app_stats['duration']);

        // on toggle school
        $('#schools').on('click', '.toggle', function() {
            var app = '{{$app}}';            
            var sid = $(this).data('value');

            $.ajax({
                url: '/manic/app/'+app+'/'+sid,
                type: 'GET',
                success: function(data){
                    $('#gt').html('Usage Graph for '+ $(this).data('detail'));
                    $('#av').html(data);
                }
            });
        });
    });
</script>
@endsection