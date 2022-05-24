<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta content="width=device-width, initial-scale=1.0" name="viewport">
		<meta name="generator" content="Dynamic Framework">
		<title>@yield('title')</title>
		<meta name="author" content="{{$_ENV['AUTHOR']}}"> 
		<meta name="description" content="{{$_ENV['DESCRIPTION']}}">
		<link rel="icon" href="/assets/img/favicon.png">     
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;display=swap" rel="stylesheet">
        @css("/assets/css/bootstrap.min")
		@css("/assets/css/main")
	</head>
	<body class="authentication">

		<div id="loading-wrapper">
			<div class="spinner-border"></div>
			Loading...
		</div>

        @yield('content')
		
        @js('/assets/js/jquery.min')
		@js('/assets/js/bootstrap.bundle.min')
		@js('/assets/js/modernizr')
		@js('/assets/js/moment')
		@js('/assets/js/main')
		@js('/assets/js/auth')

	</body>
</html>