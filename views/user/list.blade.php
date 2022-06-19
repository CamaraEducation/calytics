@extends('layout.app')
@yield('title')
@section('menu', 'track')
@section('submenu', '')
@section('content')
			
	<div class="content-wrapper">

		<div class="row gutters">
			<div class="col-xl-12">
				<!-- Card start -->
				<div class="card">
					<div class="card-header">
						<div class="card-title">User's Management</div>
					</div>
					<div class="card-body">
                        <div class="custom-tabs-container">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="first-tab" data-bs-toggle="tab" href="#first" role="tab" aria-controls="first" aria-selected="true">School Administrators</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="second-tab" data-bs-toggle="tab" href="#second" role="tab" aria-controls="second" aria-selected="false">Stakeholders</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="third-tab" data-bs-toggle="tab" href="#third" role="tab" aria-controls="third" aria-selected="false">Administrators</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="fourth-tab" data-bs-toggle="tab" href="#fourth" role="tab" aria-controls="fourth" aria-selected="false">Inactive</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="first" role="tabpanel" aria-labelledby="first-tab-label">
                                    <table class="table table-bordered table-striped">
                                        <thead class="thead-light">
                                            <tr class="text-center">
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Abdulbasit</td>
                                                <td>email.com</td>
                                                <td class="text-center">
                                                    <a href=""><i class="icon-log-out1"></i></a> &nbsp;&nbsp;
                                                    <a href=""><i class="icon-log-out1"></i></a> &nbsp;&nbsp;
                                                    <a href=""><i class="icon-log-out1"></i></a> &nbsp;&nbsp;
                                                    <a href=""><i class="icon-log-out1"></i></a> &nbsp;&nbsp;
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="second" role="tabpanel" aria-labelledby="second-tab-label">
                                    
                                </div>
                                <div class="tab-pane fade" id="third" role="tabpanel" aria-labelledby="third-tab-label">
                                    
                                </div>
                                
                                <div class="tab-pane fade" id="fourth" role="tabpanel" aria-labelledby="fourth-tab-label">
                                    
                                </div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>

	</div>
@endsection