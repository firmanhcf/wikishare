<!DOCTYPE HTML>
<!--
	Ex Machina by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Wiki Share</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:700italic,400,300,700' rel='stylesheet' type='text/css'>
		{!! HTML::style('assets/css/font-awesome.min.css') !!}
		{!! HTML::style('assets/css/bootstrap.min.css') !!}
		{!! HTML::style('assets/css/bootstrap-rating.css') !!}
		{!! HTML::style('assets/css/skel-noscript.css') !!}
		{!! HTML::style('assets/css/style.css') !!}
		{!! HTML::style('assets/css/style-desktop.css') !!}
		

		@yield('style')
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie/v8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie/v9.css" /><![endif]-->
	</head>
	<body class="{{(Route::currentRouteName()=='home')?'homepage':''}}">
	<!-- Header -->
		@include('partials.header')
	<!-- Header -->

	<!-- Banner -->
		<div id="banner">
			<div class="container">
			</div>
		</div>
	<!-- /Banner -->
	
		@yield('content')

	<!-- Footer -->
		@include('partials.footer')
	<!-- /Footer -->

		{!! HTML::script('assets/js/jquery.min.js') !!}
		{!! HTML::script('assets/js/bootstrap.min.js') !!}
		{!! HTML::script('assets/js/bootstrap-rating.min.js') !!}
		@yield('script')

	</body>
</html>