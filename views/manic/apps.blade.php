@extends('layout.app')
@section('title', 'Manic App Analysics')
@section('menu', 'mngt')
@section('submenu', 'listApp')
@section('styles')
@css('https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css')
@endsection
@section('content')
	<div class="content-wrapper">

		<div class="row gutters">
			<div class="col-xl-12">
				<!-- Card start -->
				<div class="card">
					<div class="card-header">
						<div class="card-title text-primary">Applications Tracked</div>
					</div>

					@php $apps = ManicStatsController::manic_apps(); $i=1; @endphp

					<div class="card-body">
						<table class="table table-bordered table-striped" id="manic_apps">
							<thead class="thead-light">
								<tr class="text-center">
									<th>#</th>
									<th>Icon</th>
									<th>Application</th>
									<th>Open Time</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($apps as $app)
								<tr>
									<td class="text-center">{{$i}}</td>
                                    <td class="text-center">
                                        <span class="stat-app">
                                            <img src="/{{IconsController::app($app['app_name'])}}" class="sc-flag" alt="{{$app['app_name']}}">
                                        </span>
                                    </td>
                                    <td>{{$app['app_name']}}</td>
                                    <td>{{TimeController::calc($app['duration'])}}</td>
									<td class="text-center">
										<a href="/manic/app/{{$app['app_name']}}" data-bs-toggle="tooltip" data-bs-placement="bottom" 
											data-bs-original-title="Full Overview">
											<i class="icon-log-in"></i>
										</a>
									</td>
								</tr>@php $i++ @endphp						
								@endforeach								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
@endsection
@section('scripts')
@js('https://datatables.net/download/build/nightly/jquery.dataTables.js')
<script>
//initialize datatables
    $(document).ready(function () {
        $('#manic_apps').DataTable({
            lengthMenu: [
                [50, 100, 250, -1],
                [50, 100, 250, 'All'],
            ],
        });
    });
</script>
@endsection