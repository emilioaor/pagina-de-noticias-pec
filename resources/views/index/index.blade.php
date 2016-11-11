@extends('template.main')

@section('content')
	<div class="container-fluid">
		<h2>Noticias</h2><hr>
		@foreach($noticias as $noticia)
			<div class="noticia">
				<h3><a href="{{ url('noticia/'.$noticia->id) }}">{{ $noticia->titulo }}</a></h3>
				<div class="row">
					<div class="col-md-4">
						<img src="{{ url('images/logo.png') }}" class="img-responsive">
					</div>
					<div class="col-md-8">
						<p>{!! str_limit($noticia->noticia,150) !!}</p>
						<p><a href="{{ url('noticia/'.$noticia->id) }}">Leer mas...</a></p>
					</div>
				</div>
			</div>
		@endforeach
		<div class="row">
			<div class="col-md-12 text-center">
				{!! $noticias->render() !!}
			</div>
		</div>
	</div>
@endsection