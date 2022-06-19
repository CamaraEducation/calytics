<div class="row gutter">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <canvas id="sc_app_stat"></canvas>
        </div>
    </div>

    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="card" style="background: lightgray;  border-radius: 10px; }">
            <div class="card-body">
                <ul class="statistics shorts-asum">

                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var app_stats = {!! json_encode(ManicStatsController::manic_scap_stat($id, $app)) !!};
        sc_app_stat(app_stats['date'], app_stats['duration']);

        /*
         * app_stats['duration'] is array
         * generate a list of total, average, max and min from app_stats['duration']
         * append list to shorts
        */
        var shorts = $('.shorts-asum');
        var total = 0; var average = 0; var max = 0; var min = 0; var count = 0;
        for (var i = 0; i < app_stats['duration'].length; i++) {
            total += app_stats['duration'][i];
            count++;
            if (app_stats['duration'][i] > max) {
                max = app_stats['duration'][i];
            }
            if (app_stats['duration'][i] < min) {
                min = app_stats['duration'][i];
            }
        }
        average = total / count;
        var list = ''+
            '<li><span class="stat-icon"><i class="icon-cloud"></i></span> Total<br> ' + timeCalc(total*3600) + '</li>' +
            '<li><span class="stat-icon"><i class="icon-cloud-rain"></i></span> Average<br> ' + timeCalc(average*3600) + '</li>' +
            '<li><span class="stat-icon"><i class="icon-cloud-lightning"></i></span> Max<br> ' + timeCalc(max*3600) + '</li>' +
            '<li><span class="stat-icon"><i class="icon-cloud-snow"></i></span> Min<br> ' + timeCalc(min*3600) + '</li>';
        shorts.append(list);
    });
</script>