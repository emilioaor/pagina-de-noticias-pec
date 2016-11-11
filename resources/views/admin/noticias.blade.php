@extends('template.admin')

@section('content')
	<div class="container-fluid">
		<h2>Lista de Noticias</h2>
		<p><strong>Sesión: </strong>{{ Auth::user()->nombre }}</p>
		<a href="{{ url('admin/noticias/create') }}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></a>
		<ul class="nav nav-tabs">
			<li role="presentation" @if($act == 1) class="active" @endif><a href="{{ url('admin/noticias') }}">Todas</a></li>
			<li role="presentation" @if($act == 2) class="active" @endif><a href="{{ url('admin/noticias/Publicada') }}">Publicadas</a></li>
			<li role="presentation" @if($act == 3) class="active" @endif><a href="{{ url('admin/noticias/Borrador') }}">Borrador</a></li>
			<li role="presentation" @if($act == 4) class="active" @endif><a href="{{ url('admin/noticias/Papelera') }}">Papelera</a></li>
		</ul>
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Titulo</th>
				<th>Estatus</th>
				@if(Auth::user()->nivel=='Administrador') <th>Usuario</th> @endif
				<th>Acción</th>
			</thead>
			<tbody>
				@foreach($noticias as $noticia)
					<tr>
						<td>{{ $noticia->id }}</td>
						<td>{{ $noticia->titulo }}</td>
						<td>{{ $noticia->estatus }}</td>
						@if(Auth::user()->nivel=='Administrador') <td>{{ $noticia->user->nombre }}</td> @endif
						<td>
							@if($act == 4)
								<a href="{{ url('admin/noticias/'.$noticia->id.'/recovery') }}" class="btn btn-success">Recuperar</a>
								@if(Auth::user()->nivel=='Administrador')  
									<a href="{{ url('admin/noticias/'.$noticia->id.'/remove') }}" class="btn btn-danger" onclick="return confirm('¿Eliminar noticia definitivamente?')">Eliminar</a>
								@endif
							@else
								<a href="{{ url('admin/noticias/'.$noticia->id.'/edit') }}" class="btn btn-danger">Editar</a>
							@endif
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div class="row">
			<div class="col-md-12 text-center">
				{{ $noticias->render() }}
			</div>
		</div>
	</div>
@endsection