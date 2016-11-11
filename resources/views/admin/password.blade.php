@extends('template.admin')

@section('head')
	<script type="text/javascript" src="{{ url('ckeditor/ckeditor.js') }}"></script>
@endsection

@section('content')
	<div class="container-fluid">
		<h2>Cambiar Contraseña usuario: {{ Auth::user()->user }}</h2>
		<form action="{{ url('admin/password/change') }}" method="post">
			{{ csrf_field() }}
			<div class="form-gorup">
				<label for="password">Contraseña</label>
				<input type="password" name="password[]" class="form-control" placeholder="Contraseña" required>
			</div>
			<div class="form-gorup">
				<label for="password">Repetir Contraseña</label>
				<input type="password" name="password[]" class="form-control" placeholder="Repetir Contraseña" required>
			</div><br>
			<div class="form-group">
				<button type="submit" class="btn btn-success">Cambiar Contraseña</button>
			</div>
		</form>
	</div>
@endsection