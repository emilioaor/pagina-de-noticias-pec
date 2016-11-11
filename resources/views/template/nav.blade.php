<nav id="navbar" class="navEst">
	<div class="container">
		<ul class="nav nav-pills">
		  <li role="presentation"><a href="{{ url('admin/noticias') }}">Noticias</a></li>
		  @if(Auth::user()->nivel=='Administrador')
			<li role="presentation"><a href="{{ url('admin/users') }}">Usuarios</a></li>
		  @endif
		  <li role="presentation"><a href="{{ url('admin/contacto') }}">Contacto</a></li>
		  <li role="presentation"><a href="{{ url('admin/password') }}">Cambiar Contraseña</a></li>
		  <li role="presentation"><a href="{{ url('auth/logout') }}" onclick="return confirm('¿Salir?')">Salir</a></li>
		</ul>
	</div>
</nav>