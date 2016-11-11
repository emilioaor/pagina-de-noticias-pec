@extends('template.admin')

@section('content')
	<div class="container-fluid">
		<h2>Mensajes de Contacto</h2>
		<p><strong>Sesión: </strong>{{ Auth::user()->nombre }}</p>
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Mensaje</th>
				<th>Acción</th>
			</thead>
			<tbody>
				@foreach($contacto as $cont)
					<tr>
						<td>{{ $cont->id }}</td>
						<td>{{ $cont->name }}</td>
						<td>{{ $cont->email }}</td>
						<td>{{ str_limit($cont->message,50) }}</td>
						<td><a href="{{ url('admin/contacto/'.$cont->id) }}" class="btn btn-danger">Leer</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="row">
			<div class="col-md-12 text-center">
				{{ $contacto->render() }}
			</div>
		</div>
	</div>
@endsection