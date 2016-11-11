@extends('template.admin')

@section('head')
	<script type="text/javascript" src="{{ url('ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
	<div class="container-fluid">
		<h2>Agregar Noticia</h2>
		<form action="{{ url('admin/noticias') }}" method="post">
			{{ csrf_field() }}
			<input type="hidden" name="autor" value="{{ Auth::user()->id }}">
			<div class="form-group">
				<label for="titulo">Titutlo</label>
				<input type="text" name="titulo" class="form-control" placeholder="Titulo" required>
			</div>
			<div class="form-group">
				<label for="noticia">Noticia</label><br>
				<textarea name="noticia" rows="15" class="ckeditor" id="textNoticia" placeholder="Noticia" required></textarea>
			</div>
			<div class="form-group">
				<label for="estatus">Estatus</label>
				<select name="estatus" class="form-control">
					<option>Publicada</option>
					<option>Borrador</option>
				</select>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Agregar</button>
			</div>
		</form>
	</div>
@endsection