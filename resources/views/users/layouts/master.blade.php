<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="{{ asset('users/favicon.png') }}">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

		<!-- Bootstrap CSS -->
		<link href="{{ asset('users/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
		<link href="{{ asset('users/css/tiny-slider.css') }}" rel="stylesheet">
		<link href="{{ asset('users/css/style.css') }}" rel="stylesheet">
		<title>@yield('title')</title>
	</head>

	<body>

		@include('users.layouts.header')
		@include('users.layouts.slide')
        @yield('content')
		@include('users.layouts.footer')
		@yield('js')
		
		<script src="{{ asset('users/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('users/js/tiny-slider.js') }}"></script>
		<script src="{{ asset('users/js/custom.js') }}"></script>
	</body>

</html>
