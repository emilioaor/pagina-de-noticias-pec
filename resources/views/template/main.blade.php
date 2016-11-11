<!DOCTYPE html>
<html lang="es">
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta charset="UTF-8">
	<title>Procuraduría del Estado Carabobo</title>
	<link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ url('css/estilos.css') }}">
	<link rel="icon" type="image/png" href="{{ url('images/logo.png') }}" />
</head>
<body onscroll="NavBarChange()">
	<div class="jumbotron">	
		<div class="container">
			<h1>Procuraduría del Estado Carabobo</h1>
			<p>En Defensa del Patrimonio del Estado.</p>
		</div>
		<nav id="navbar" class="navEst">
			<div class="container">
				<ul class="nav nav-pills">
				  <li role="presentation"><a href="{{ url('/') }}">Noticias</a></li>
				  <li role="presentation"><a href="{{ url('quienes-somos') }}">Quienes Somos</a></li>
				  <li role="presentation"><a href="{{ url('contacto') }}">Contacto</a></li>
				  <li role="presentation"><a href="{{ url('auth/login') }}">Login</a></li>
				</ul>
			</div>
		</nav>
	</div>
	<section class="main">
		<div class="container">
			<div class="row">	
				<section class="col-sm-8 col-md-9">
					@include('template.alert')
					@yield('content')
				</section>
				<aside class="col-sm-4 col-md-3">
					<div class="widget">
						<h4>Gaceta Oficial del Estado Carabobo</h4>
						<a href="http://sgg.carabobo.gob.ve/buscadorGaceta.php" target="_blank"><img src="{{ url('images/sgg.jpg') }}" class="img-responsive"></a>
					</div>

					<div class="widget">
						<h4>Gaceta Oficial de la Republica Bolivariana de Venezuela</h4>
						<a href="http://www.tsj.gov.ve/gaceta/gacetaoficial.asp" target="_blank"><img src="{{ url('images/tsj.jpg') }}" class="img-responsive"></a>
					</div>

					<div class="widget">						
						<h4>Ultimas Noticias</h4>
						<ul>
							@foreach($ultimasNoticias as $noticia)
								<li><a href="{{ url('noticia/'.$noticia->id) }}">{{ $noticia->titulo }}</a></li>
							@endforeach
						</ul>
					</div>
				</aside>
			</div>
		</div>
	</section>
	<section class="extra">
		<img src="{{ url('images/separador.png') }}" class="img-responsive">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3>Contacto</h3><hr>
					<form action="{{ url('contacto/register') }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<label for="name">Nombre</label>
							<input type="text" class="form-control" name="name" required>
						</div>
						<div class="form-group">
							<label for="email">Correo</label>
							<input type="text" class="form-control" name="email" required>
						</div>
						<div class="form-group">
							<label for="message">Mensaje</label>
							<textarea name="message" class="form-control" cols="30" rows="10" required></textarea>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-danger">Contactar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<footer>
		<div class="container">
			<p class="text-center">&copy; Procuraduría del Estado Carabobo | Oficina de Informática | EO</p>
		</div>
	</footer>
	<div class="up">
		<button type="button" onclick="IrArriba()" class="btn btn-danger"><span class="glyphicon glyphicon-upload"></span></button>
	</div>
	<script src="{{ url('js/jquery.js') }}"></script>
	<script src="{{ url('js/bootstrap.min.js') }}"></script>
	<script src="{{ url('js/eventos.js') }}"></script>
</body>

</html>