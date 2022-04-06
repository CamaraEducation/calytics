<!DOCTYPE html>
<html>
	<head>
		<!-- please do not remove this section -->
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta name="generator" content="Dynamic Framework">
		<title>@yield('title')</title>
		<meta content="{{$_ENV['AUTHOR']}}" name="description">
		<meta name="description" content="{{$_ENV['DESCRIPTION']}}">
		<!-- please do not remove this section -->

		<!-- Favicons -->
		<link href="/assets/img/favicon.png" rel="icon">
		<link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
		<!-- Google Fonts -->
		
		@css("/assets/css/bootstrap.min")
		@css("/assets/fonts/style")
		@css("/assets/css/main")

		@css("/assets/vendor/megamenu/css/megamenu")

		<!-- Search Filter JS -->
		@css("/assets/vendor/search-filter/search-filter")
		@css("/assets/vendor/search-filter/custom-search-filter")
	</head>
	<body>
		<div id="loading-wrapper">
			<div class="spinner-border"></div>
			Loading...
		</div>


		<div class="page-wrapper">
			@include('layout.nav')
			<div class="main-container">
				@include('layout.top')
				@yield('content')
			</div>
		</div>

		@js("/assets/js/jquery.min")
		@js("/assets/js/bootstrap.bundle.min")
		@js("/assets/js/modernizr")
		@js("/assets/js/moment")

		@js("/assets/vendor/megamenu/js/megamenu")
		@js("/assets/vendor/megamenu/js/custom")

		<!-- Slimscroll JS -->
		@js("/assets/vendor/slimscroll/slimscroll.min")
		@js("/assets/vendor/slimscroll/custom-scrollbar")

		<!-- Search Filter JS -->
		@js("/assets/vendor/search-filter/search-filter")
		@js("/assets/vendor/search-filter/custom-search-filter")

		<!-- Main Js Required -->
		@js("/assets/js/main")
	</body>
</html>