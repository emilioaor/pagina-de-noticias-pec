@extends('template.admin')

@section('content')
	<div class="container-fluid">
		<h3>Nombre: <small>{{ $contacto->name }}</small> </h3>
		<h3>Email: <small>{{ $contacto->email }}</small> </h3>
		<h3>Mensaje</h3>
		<p>{{ $contacto->message }}</p>
	</div>
@endsection