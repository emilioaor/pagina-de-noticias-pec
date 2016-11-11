@extends('template.admin')

@section('head')
	<script type="text/javascript" src="{{ url('ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
	<div class="container-fluid">
		<h2>Editar Usuario: {{ $user->nombre }} ({{ $user->user }})</h2>
		<form action="{{ url('admin/users/'.$user->id) }}" method="post">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="form-group">
				<label for="user">Usuario</label>
				<input type="text" name="user" class="form-control" placeholder="Usuario" required value="{{ $user->user }}">
			</div>
			<div class="form-group">
				<label for="nombre">Nombre</label><br>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre" required value="{{ $user->nombre }}">
			</div>
			<h4>Cambiar Contraseña</h4>
			<div class="form-gorup">
				<label for="password">Contraseña</label>
				<input type="password" name="password[]" class="form-control" placeholder="Contraseña">
			</div>
			<div class="form-gorup">
				<label for="password">Repetir Contraseña</label>
				<input type="password" name="password[]" class="form-control" placeholder="Repetir Contraseña">
			</div><br>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Actualizar</button>
			</div>
		</form>
	</div>
@endsection