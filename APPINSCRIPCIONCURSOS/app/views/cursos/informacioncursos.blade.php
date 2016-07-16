<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cursos</title>
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/estilos.css') }}
	</head>

	<body>
		<div class="container-fluid">
			<div class="container">
				<div class="page-header">
					<div class="row">
						<div class="col-xs-12 col-md-10">
							<h1>Cursos de Programación</h1>	
						</div>

						<div class="col-xs-12 col-md-2">
							<a href="/APPINSCRIPCIONCURSOS/public/cursos/cerrarsesion" class="btn btn-danger btn-sm" role="button" id="cerrar">Cerrar Sesión</a>
						</div>
					</div>
				</div>

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Nuestros Cursos</h3>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-bordered">
								<tr class="warning">
									<th>Curso</th>
									<th>Costo</th>
									<th>Fecha de Inicio</th>
									<th>Fecha de Termino</th>
									<th>Horario</th>
									<th>Elegir</th>
								</tr>
								
								@foreach($datos as $d)
								<tr>
									<td>{{{ $d->nombreCurso }}}</td>
									<td>{{{ $d->costo }}}</td>
									<td>{{{ $d->fechaInicio }}}</td>
									<td>{{{ $d->fechaTermino }}}</td>
									<td>{{{ $d->horario }}}</td>
									<td><a href="/APPINSCRIPCIONCURSOS/public/cursos/registrarcurso/{{{ $d->idCurso }}}/{{{ $d->horario }}}" class="btn btn-success btn-xs" role="button">Inscribir</a></td>
								</tr>
								@endforeach
							</table>
						</div>						
					</div>
				</div>
				@if(Session::has('mensaje'))
				<div class="alert alert-danger alert-dismissible" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<strong>{{{ Session::get('mensaje') }}}</strong>
				</div>
				@endif
				<a href="/APPINSCRIPCIONCURSOS/public/cursos/informacionalumno" class="btn btn-success btn-sm" role="button">Regresar</a>
			</div>
		</div>
		{{ HTML::script('js/jquery-1.12.4.min.js') }}
	 	{{ HTML::script('js/bootstrap.min.js') }}
	</body>
</html>