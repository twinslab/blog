<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Twinslab">
	<meta name="description" content="{{ $pageDesc or Lang::get('defaults.pageDesc') }}">
	<title>{{ $pageTitle or Lang::get('defaults.pageTitle') }} | Blog</title>

	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Ubuntu&subset=latin,greek">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/3.5.2/select2.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.min.css">
	<link rel="stylesheet" href="{!! asset('assets/css/main.css') !!}">
</head>
<body>
	@include('includes.nav')

	<main>
		<div class="container">
			@include('flash::message')

			@yield('content')
		</div>
	</main>

	<!-- Scripts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

	@yield('scripts')

	<script src="{!! asset('assets/js/main.js') !!}"></script>
</body>
</html>
