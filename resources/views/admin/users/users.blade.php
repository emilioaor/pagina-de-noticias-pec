@extends('template.admin')

@section('content')
	<div class="container-fluid">
		<h2>Lista de Usuarios</h2>
		<p><strong>Sesión: </strong>{{ Auth::user()->nombre }}</p>
		<a href="{{ url('admin/users/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></a>
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Usuario</th>
				<th>Nombre</th>
				<th>Acción</th>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>{{ $user->user }}</td>
						<td>{{ $user->nombre }}</td>
						<td><a href="{{ url('admin/users/'.$user->id.'/edit') }}" class="btn btn-danger">Editar</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="row">
			<div class="col-md-12 text-center">
				{{ $users->render() }}
			</div>
		</div>
	</div>
@endsection