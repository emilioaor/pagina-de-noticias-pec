@if(Session::has('alert') )
	<br>
	<div class="container-fluid">
		<div class="alert {{ Session::get('type') }} alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Atencion!</strong> {{ Session::get('alert') }}
		</div>
	</div>
@endif