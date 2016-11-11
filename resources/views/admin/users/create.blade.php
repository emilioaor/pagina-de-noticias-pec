@extends('template.admin')

@section('head')
	<script type="text/javascript" src="{{ url('ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
	<div class="container-fluid">
		<h2>Crear Usuario</h2>
		<form action="{{ url('admin/users') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="user">Usuario</label>
				<input type="text" name="user" class="form-control" placeholder="Usuario" required>
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label><br>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
			</div>
			<div class="form-gorup">
				<label for="password">Contraseña</label>
				<input type="password" name="password[]" class="form-control" placeholder="Contraseña" required>
			</div>
			<div class="form-gorup">
				<label for="password">Repetir Contraseña</label>
				<input type="password" name="password[]" class="form-control" placeholder="Repetir Contraseña" required>
			</div><br>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Crear</button>
			</div>
		</form>
	</div>
@endsection