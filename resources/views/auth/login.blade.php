@extends('template.admin')

@section('content')
	<div class="container-fluid">
		<h2>Ingreso de usuario</h2>
		<form action="{{ url('auth/authentication') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="user">Usuario</label>
				<input type="text" name="user" class="form-control" placeholder="Usuario">
			</div>
			<div class="form-group">
				<label for="password">Contraseña</label>
				<input type="password" name="password" class="form-control" placeholder="Contraseña">
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-danger">Login</button>
			</div>
		</form>
	</div>
@endsection