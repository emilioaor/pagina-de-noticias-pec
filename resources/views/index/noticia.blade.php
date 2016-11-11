@extends('template.main')

@section('content')
	<div class="container-fluid spaceNoticia">
		<h2>{{ $noticia->titulo }}</h2><hr>
		{!! $noticia->noticia !!}
	</div>
@endsection