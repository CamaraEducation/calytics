@extends('layout.app')
@section('content')
			
					<div class="content-wrapper">

						<!-- Row start -->
						<div class="row gutters">
							<div class="col-xl-12">
								<!-- Card start -->
								<div class="card">
									<div class="card-header">
                                        <div class="card-title">Card Header</div>
                                    </div>
									<div class="card-body">
										<!-- Place your content here -->
									</div>
								</div>
								<!-- Card end -->
                            </div>
						</div>
						<!-- Row end -->

					</div>
					<!-- Content wrapper end -->

					<!-- App Footer start -->
					<div class="app-footer">Copyright (c) {{date('Y')}} {{$_ENV['COPYRIGHT']}}</div>


@endsection