<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Editor de Noticias</title>
	<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/admin.css') }}">
	<link rel="icon" type="image/png" href="{{ url('images/logo.png') }}" />
	@yield('head')
</head>
<body>
	<header>
		<div class="container-fluid">
			<h1>Procuraduría del Estado Carabobo</h1>
		</div>
	</header>
	@if(Auth::check() )
		@include('template.nav')
	@endif
	<section class="main">
		@include('template.alert')
		@yield('content')
	</section>
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="{{ url('js/bootstrap.min.js') }}"></script>
</body>
</html>