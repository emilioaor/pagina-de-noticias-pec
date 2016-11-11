@extends('template.admin')

@section('head')
	<script type="text/javascript" src="{{ url('ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
	<div class="container-fluid">
		<h2>Noticia ID: {{ $noticia->id }}</h2>
		<form action="{{ url('admin/noticias/'.$noticia->id) }}" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="form-group">
				<label for="titulo">Titutlo</label>
				<input type="text" name="titulo" class="form-control" placeholder="Titulo" value="{{ $noticia->titulo }}" required>
			</div>
			<div class="form-group">
				<label for="noticia">Noticia</label>
				<textarea name="noticia" rows="50" class="ckeditor" id="textNoticia" placeholder="Noticia" required>{{ $noticia->noticia }}</textarea>
			</div>
			<div class="form-group">
				<label for="estatus">Estatus</label>
				<select name="estatus" class="form-control">
					@if($noticia->estatus  == 'Publicada')
						<option selected>Publicada</option>
						<option>Borrador</option>
					@else
						<option>Publicada</option>
						<option selected>Borrador</option>
					@endif
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Actualizar</button>
				<a href="{{ url('admin/noticias/'.$noticia->id.'/destroy') }}" class="btn btn-danger" onclick="return confirm('¿Eliminar esta noticia?')">Eliminar Noticia</a>
			</div>
		</form>
	</div>
@endsection