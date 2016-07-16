@extends('layout')

@section('archivos-css')
{{ HTML::style('css/flexslider.css') }}
@stop

@section('contenido')
<div class="container" id="informacion-cursos">
	<br/>
	<div class="row">
		<div class="col-xs-12 col-md-2"></div>
		<div class="col-xs-12 col-md-8">
			<div class="flexslider">
                <ul class="slides">
                    <li>
                        <img src="img/mi-slide.jpg" />
                        <p class="flex-caption">Cursos de Programación</p>
                    </li>

                    <li>
                        <img src="img/python.jpg" />
                        <p class="flex-caption">Programación</p>
                    </li>
                </ul>
            </div>
		</div>
		<div class="col-xs-12 col-md-2"></div>
	</div>

	<br/>
	<div class="row">
		<div class="col-xs-12 col-md-1"></div>
		<div class=" col-xs-12 col-md-8">
			<h4>WordPress</h4>
			{{ HTML::image('img/wordpress.png', 'Wordpress', array('class' => 'img-thumbnail')) }}
			<p>Now that we know who you are, I know who I am. I'm not a mistake! It all makes sense! In a comic, you know how you can tell who the arch-villain's going to be? He's the exact opposite of the hero. And most times they're friends, like you and me! I should've known way back when... You know why, David? Because of the kids. They called me Mr Glass.</p>
		</div>
		<div class="col-xs-12 col-md-3"></div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-md-1"></div>
		<div class=" col-xs-12 col-md-8">
			<h4>HTML5 y CSS3</h4>
			{{ HTML::image('img/html.png', 'HTML5 y CSS3', array('class' => 'img-thumbnail')) }}
			<p>Now that we know who you are, I know who I am. I'm not a mistake! It all makes sense! In a comic, you know how you can tell who the arch-villain's going to be? He's the exact opposite of the hero. And most times they're friends, like you and me! I should've known way back when... You know why, David? Because of the kids. They called me Mr Glass.</p>
		</div>
		<div class="col-xs-12 col-md-3"></div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-md-1"></div>
		<div class=" col-xs-12 col-md-8">
			<h4>PHP</h4>
			{{ HTML::image('img/PHP.png', 'PHP', array('class' => 'img-thumbnail')) }}
			<p>Now that we know who you are, I know who I am. I'm not a mistake! It all makes sense! In a comic, you know how you can tell who the arch-villain's going to be? He's the exact opposite of the hero. And most times they're friends, like you and me! I should've known way back when... You know why, David? Because of the kids. They called me Mr Glass.</p>
		</div>
		<div class="col-xs-12 col-md-3"></div>
	</div>

	<div class="row">
		<div class="col-xs-12 col-md-12">
			<footer>
				<address>
					<h3>Contacto:</h3>
					<ul>
						<li>Direcci&oacute;n: Calle #45 Col. MiColonia</li>
						<li>Tel&eacute;fono: 12-34-56-78</li>
						<li>Correo electr&oacute;nico: correo@dominio.com</li>
						<li>Horario de atenci&oacute;n: 10:00 - 17:00</li>
					</ul>
				</address>
				<small>Copyright &copy; 2016-2020 | Cursos Programación</small>
			</footer>
		</div>
	</div>
</div>
@stop

@section('mi-script')
	{{ HTML::script('js/jquery.flexslider-min.js') }}
	<script type="text/javascript" charset="utf-8">
	    $(window).load(function() {
	        $(".flexslider").flexslider();
	    });
	</script>
@stop
