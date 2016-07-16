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

				
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Datos Personales</h3>
							</div>
							<div class="panel-body">
							@if(Session::has('usuario-alumno'))
								<h4>Nombre: </h4> <p>{{{ $datos->nombreCompletoAlumno }}}</p>
								<h4>Correo: </h4> <p>{{{ $datos->correoAlumno }}}</p>
								<h4>Teléfono: </h4> <p>{{{ $datos->telefonoAlumno }}}</p>
							@endif
							<br/>
							<a href="/APPINSCRIPCIONCURSOS/public/cursos/informacioncursos" class="btn btn-success btn-sm" role="button">Seleccionar un Curso</a>
							</div>
						</div>
					</div>

					<div class="col-xs-12 col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">Cursos a los que estas inscrito</h3>
							</div>
							<div class="panel-body">
								@if(isset($misCursos))
									<div class="table-responsive">
										<table class="table table-bordered">
											<tr class="warning">
												<th>Curso</th>
												<th>Fecha de Inicio</th>
												<th>Fecha de Termino</th>
											</tr>
											
											@foreach($misCursos as $c)
											<tr>
												<td>{{{ $c->nombreCurso }}}</td>
												<td>{{{ $c->fechaInicio }}}</td>
												<td>{{{ $c->fechaTermino }}}</td>
											</tr>
											@endforeach
										</table>
									</div>
									<a href="/APPINSCRIPCIONCURSOS/public/cursos/generarpdf" class="btn btn-warning btn-sm" role="button" target="_blank">Generar Comprobate PDF</a>
								@else 
									<h4>No tienes cursos inscritos.</h4>
								@endif
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
		{{ HTML::script('js/jquery-1.12.4.min.js') }}
	 	{{ HTML::script('js/bootstrap.min.js') }}
	</body>
</html>