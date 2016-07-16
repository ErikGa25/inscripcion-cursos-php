<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cursos</title>
		{{ HTML::style('css/bootstrap.min.css') }}
		@yield('archivos-css')
		{{ HTML::style('css/estilos.css') }}
	</head>

	<body>
		<div class="container-fluid">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">MENU</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#">
								Cursos Informaticos
							</a>
						</div>

						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li><a href="/APPINSCRIPCIONCURSOS/public/">Inicio</a></li>
								<li><a href="#">Acerca de</a></li>
								<li><a href="/APPINSCRIPCIONCURSOS/public/login">Entrar</a></li>
								<li><a href="/APPINSCRIPCIONCURSOS/public/registro">Registrarse</a></li>
							</ul>
						</div>
					</div>
				</nav>
			</div>
			@yield('contenido')
		</div>
		{{ HTML::script('js/jquery-1.12.4.min.js') }}
	 	{{ HTML::script('js/bootstrap.min.js') }}
        @yield('mi-script')
	</body>
</html>