@extends('layout.app')
@section('title', 'School List')
@section('menu', 'mngt')
@section('submenu', 'listSchool')
@section('content')
			
	<div class="content-wrapper">

		<div class="row gutters">
			<div class="col-xl-12">
				<!-- Card start -->
				<div class="card">
					<div class="card-header">
						<div class="card-title text-primary">School List</div>
					</div>

					@php $schools = SchoolController::fetch_all(); $i=1; @endphp

					<div class="card-body">
						<table class="table table-bordered table-striped">
							<thead class="thead-light">
								<tr class="text-center">
									<th>#</th>
									<th>Name</th>
									<th>Country</th>
									<th>Region/County</th>
									<th>Ownership</th>
									<th>Level</th>
									<th>Projects</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($schools as $school)
								<tr>
									<td>{{$i}}</td>
									<td>{{$school['sc_name']}}</td>
									<td>{{$school['sc_country']}}</td>
									<td>{{$school['sc_region']}}</td>
									<td>{{$school['sc_ownership']}}</td>
									<td>{{$school['sc_level']}}</td>
									<td></td>
									<td class="text-center">
										<a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" 
											data-bs-original-title="View School Stats">
											<i class="icon-log-in"></i>
										</a> &nbsp;&nbsp;
										<a href="" data-bs-toggle="tooltip" data-bs-placement="bottom" 
											data-bs-original-title="Edit School Data">
											<i class="icon-edit1"></i>
										</a> &nbsp;&nbsp;
									</td>
								</tr>	@php $i++ @endphp							
								@endforeach								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>
@endsection