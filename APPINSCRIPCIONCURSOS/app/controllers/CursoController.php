<?php

class CursoController extends BaseController
{
	public function informacionCurso()
	{
		/* Mostrarmos todos los cursos disponibles. */
		$datos = Curso::all();
		return View::make('cursos/informacioncursos', compact('datos'));
	}

	public function registrarCurso($id=null, $horario=null)
	{
		/* Realizamos una consulta a la tabla Alumno para traer toda la información del usuario. */
		$q = DB::table('Alumno')->whereRaw('correoAlumno = ?', [Session::get('usuario-alumno')])->get();

		/* Comprobamos si existe la sesion usuario-alumno */
		if(Session::has('usuario-alumno'))
		{
			if(count($q) > 0 && count($q) < 2)
			{	
				$objeto = new CursoController();
				$alumno = $q[0]->idAlumno;
				$cursosAlumno = Alumno::find($alumno)->cursos;

				/* Comprobamos si el usuario ya tiene cursos inscritos */
				if(count($cursosAlumno) > 0)
				{
					$arreglo = array(); // Creamos un arreglo
					foreach ($cursosAlumno as $key) {
						/* Llenamos el arreglo con los horarios de los cursos a los que ya esta inscrito */
						$arreglo[] = $key->horario; 
					}

					/* Verificamos si el horario del curso que eligio no esta repetido con los
					 otros cursos en los que ya esta inscrito. */
					if(in_array($horario, $arreglo))
					{
						/* Si se repitio algun horario no dejamos que se inscriba y le mostramos 
						  un mensaje al usuario. */
						return Redirect::to('cursos/informacioncursos')->with('mensaje', 'Ya tiene un curso inscrito a esa hora.');
					} else {
						/* Llamamos a la función insertar y redireccionamos */
						$objeto->insertar($alumno, $id);
						return Redirect::to('cursos/informacionalumno');
					}
				} else {
					/* Llamamos a la función insertar y redireccionamos */
					$objeto->insertar($alumno, $id);
					return Redirect::to('cursos/informacionalumno');
				}
			}
		}
	}

	/* Función para inscribir al alumno a un curso */
	private function insertar($alumno, $idCurso)
	{
		$inscripcion = new Inscripcion;
			$inscripcion->idAlumno = $alumno;
			$inscripcion->idCurso = $idCurso;
		$inscripcion->save();
	}
}

?>