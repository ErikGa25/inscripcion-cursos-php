@extends('layout')

@section('contenido')

<div class="container">
	<div class="espacio"></div>
	<div class="row">
		<div class="col-xs-12 col-md-4"></div>
		<div class="col-xs-12 col-md-4">
			<form action="/APPINSCRIPCIONCURSOS/public/registro" class="form-horizontal" method="POST">
				<div class="form-group">
					<label for="nombre" class="col-sm-1 control-label"></label>
					<div class="col-sm-10">
						<input type="text" name="txtNombre" class="form-control" class="nombre" placeholder="Nombre completo" value="{{{ Request::old('txtNombre') }}}">
					</div>
				</div>

				<div class="form-group">
					<label for="correo" class="col-sm-1 control-label"></label>
					<div class="col-sm-10">
						<input type="text" name="txtCorreo" class="form-control" id="correo" placeholder="Correo" value="{{{ Request::old('txtCorreo') }}}">
					</div>
				</div>

				<div class="form-group">
					<label for="telefono" class="col-sm-1 control-label"></label>
					<div class="col-sm-10">
						<input type="text" name="txtTelefono" class="form-control" id="telefono" placeholder="Teléfono" value="{{{ Request::old('txtTelefono') }}}">
					</div>
				</div>

				<div class="form-group">
					<label for="contrasenia" class="col-sm-1 control-label"></label>
					<div class="col-sm-10">
						<input type="password" name="txtContrasenia" class="form-control" id="contrasenia" placeholder="Contraseña">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-1 col-sm-10">
						<button type="submit" class="btn btn-primary">Registrarse</button>
					</div>
				</div>
			</form>	
		</div>
		
		<div class="col-xs-12 col-md-4">
			<br/>
			@if(Session::has('mensaje'))
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<strong>{{{ Session::get('mensaje') }}}</strong>
			</div>
			@endif
			<br/>

			@if($errors->first('nombreCompletoAlumno'))
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<?php
					$texto = $errors->first('nombreCompletoAlumno');
					$cad1 = substr($texto, 0, 16);
					$cad2 = substr($texto, 31, -1);
				?>	
				<strong>{{{ $cad1.$cad2 }}}</strong>
			</div>
			@endif

			@if($errors->first('correoAlumno'))
			<div class="alert alert-danger alert-dismissible" role="alert" >
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<?php
					$texto = $errors->first('correoAlumno');
					$cad1 = substr($texto, 0, 16);
					$cad2 = substr($texto, 23, -1);
				?>	
				<strong>{{{ $cad1.$cad2 }}}</strong>
			</div>
			@endif

			@if($errors->first('telefonoAlumno'))
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<?php
					$texto = $errors->first('telefonoAlumno');
					$cad1 = substr($texto, 0, 16);
					$cad2 = substr($texto, 23, -1);
				?>	
				<strong>{{{ $cad1.$cad2 }}}</strong>
			</div>
			@endif

			@if($errors->first('contrasenia'))
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<?php
					$texto = $errors->first('contrasenia');
					$cad1 = substr($texto, 0, 17);
					$cad2 = substr($texto, 20, -1);
				?>
				<strong>{{{ $cad1.'ña'.$cad2 }}}</strong>
			</div>
			@endif
		</div>
	</div>
</div>
@stop