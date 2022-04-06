@extends('layout.auth')
@section('content')
		<div class="login-container">

			<div class="container-fluid h-100">
			
			<!-- Row start -->
			<div class="row no-gutters h-100">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-about">
						<div class="slogan">
							<span>Analytics</span>
							<span>Made</span>
							<span>Simple.</span>
						</div>
						<div class="about-desc">
							
						</div>
						<a href="javascript:void()" class="know-more">Reset your Password <img src="/assets/img/right-arrow.svg" alt="Uni Pro Admin"></a>

					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-wrapper">
						<form action="">
							<div class="login-screen">
								<div class="login-body pb-4">
									<a href="reports.html" class="login-logo">
										<img src="/assets/img/logo.svg" alt="Uni Pro Admin">
									</a>
									<h6>
										Follow the Instructions to reset your Password
									</h6>

									<div class="field-wrapper mb-3">
										<input type="email" name="email" id="email" autofocus>
										<div class="field-placeholder">Email Address</div>
                                    </div>
									<div class="field-wrapper mb-3">
										<input type="number" name="code" id="code">
										<div class="field-placeholder">6 Digit code</div>
                                    </div>
                                    <div class="field-wrapper mb-3">
										<input type="password" name="pass" id="pass">
										<div class="field-placeholder">New Password</div>
									</div>
									<div class="actions">
										<button type="button" id="email" class="btn btn-danger ms-auto submit">Reset</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- Row end -->

		
			</div>
		</div>
@endsection