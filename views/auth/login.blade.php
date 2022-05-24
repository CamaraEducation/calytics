@extends('layout.auth')
@section('content')
		<div class="login-container">

			<div class="container-fluid h-100">
			
			<!-- Row start -->
			<div class="row g-0 h-100">
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-about">
						<div class="slogan">
							<span>Analytics</span>
							<span>Made</span>
							<span>Simple.</span>
						</div>
						<div class="about-desc">
						</div>
						<a href="javascript:void()" class="know-more">Login Now<img src="/assets/img/right-arrow.svg" alt="Uni Pro Admin"></a>
					</div>
				</div>
				<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
					<div class="login-wrapper">
						<form action="http://bootstrap.gallery/unipro/v1-x/03-design-green/crm.html">
							<div class="login-screen">
								<div class="error"></div>
								<div class="login-body">
									<a href="crm.html" class="login-logo">
										<img src="/assets/img/logo.svg" alt="iChat">
									</a>
									<h6>Welcome back,<br>Please login to your account.</h6>
									<div class="field-wrapper">
										<input type="email" autofocus name="email" required>
										<div class="field-placeholder">Email ID</div>
									</div>
									<div class="field-wrapper mb-3">
										<input type="password" name="pass" id="pass" required>
										<div class="field-placeholder">Password</div>
									</div>
									<div class="actions">
										<a href="/reset">Forgot password?</a>
										<button type="button" id="login" class="btn btn-primary">Login</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			</div>
		</div>
@endsection