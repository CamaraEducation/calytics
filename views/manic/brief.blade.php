<div class="card">
    <div class="card-header">
        <div class="card-title text-primary">Brief Overview</div>
    </div>

    <div class="card-body">
        <div class="row gutter">
            <div class="col-md-8">
                <div class="text-primary">Uptime Time</div>
                <canvas id="sc_active"></canvas>
            </div>
        </div>
    </div>
</div>

@js('https://cdn.jsdelivr.net/npm/chart.js@3.7.1/dist/chart.min.js')
@js('/assets/js/chart.js')
<script>
    $(document).ready(function() {
        var uptime = {!! json_encode(ManicStatsController::sc_active($id)) !!};
        area_sc_active(uptime);
    });
</script>