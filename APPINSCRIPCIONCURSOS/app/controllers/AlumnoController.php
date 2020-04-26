<?php

class AlumnoController extends BaseController
{
	public function index()
	{
		return View::make('index');
	}

	public function login()
	{
		if($_POST)
		{
			/* Validaciones de formulario */
			$validator = Validator::make
			(	
				array
				(
					'correoAlumno' => Input::get('txtCorreo'),
					'contrasenia' => Input::get('txtContrasenia')
				), 
				array
				(
					'correoAlumno' => 'required|email',
					'contrasenia' => 'required|max:50'
				)
			);

			if($validator->fails())
			{
				/* Si no se cumple con las validavciones retornamos un mensaje de error al usuario */
				return Redirect::to('login')->withErrors($validator);
			} else {
				$query = DB::table('Alumno')->whereRaw('correoAlumno = ?', [Input::get('txtCorreo')])->get();

				if(count($query) > 0 && count($query) < 2)
				{
					if(Crypt::decrypt($query[0]->contrasenia) == Input::get('txtContrasenia'))
					{
						/* Creamos una sesión con el valor del correo del alumno */
						Session::put('usuario-alumno', $query[0]->correoAlumno);
						return Redirect::to('cursos/informacionalumno');
					} else {
						return Redirect::to('login')->with('mensaje', 'El Correo o Contraseña ingresado es incorrecto');
					}
				} else {
					return Redirect::to('login')->with('mensaje', 'El Correo o Contraseña ingresado es incorrecto');
				}
			}
		}
		return View::make('login');
	}

	public function registrarAlumno()	
	{
		if($_POST)
		{	
			/* Validaciones del formulario */
			$validator = Validator::make
			(	
				array
				(
					'nombreCompletoAlumno' => Input::get('txtNombre'),
					'telefonoAlumno' => Input::get('txtTelefono'),
					'correoAlumno' => Input::get('txtCorreo'),
					'contrasenia' => Input::get('txtContrasenia')
				), 
				array
				(
					'nombreCompletoAlumno' => 'required|regex:/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/',
					'telefonoAlumno' => 'required|numeric',
					'correoAlumno' => 'required|unique:Alumno|email',
					'contrasenia' => 'required|max:50'
				)
			);

			if($validator->fails())
			{
				/* Si no se cumple con las validavciones retornamos un mensaje de error al usuario */
				return Redirect::to('registro')->withInput(Request::except('txtContrasenia'))->withErrors($validator);
			} else {
				/* Inserción del alumno */
				$alumno = new Alumno;
					$alumno->nombreCompletoAlumno = Input::get('txtNombre');
					$alumno->telefonoAlumno = Input::get('txtTelefono');
					$alumno->correoAlumno = Input::get('txtCorreo');
					$alumno->contrasenia = Crypt::encrypt(Input::get('txtContrasenia'));
				$alumno->save();
				return Redirect::to('registro')->with('mensaje', 'Registro Exitoso.');
			}
		}
		return View::make('registro');
	}

	public function informacionAlumno()
	{
		$q = DB::table('Alumno')->whereRaw('correoAlumno = ?', [Session::get('usuario-alumno')])->get();

		if(Session::has('usuario-alumno'))
		{
			if(count($q) > 0 && count($q) < 2)
			{	
				$id = $q[0]->idAlumno;
				$informacionAlumno = Alumno::find($id);
				$cursosAlumno = Alumno::find($id)->cursos;

				/* Si el alumno tiene cursos inscritos mostramos si información personal y la
				   información de sus cursos */
				if(count($cursosAlumno) > 0)
				{
					return View::make('cursos/informacionalumno', array('datos' => $informacionAlumno, 'misCursos' => $cursosAlumno));
				} else {
					/* Si no tiene cursos inscritos solo mostramos su información personal */
					return View::make('cursos/informacionalumno', array('datos' => $informacionAlumno));
				}
			}
		}
		return View::make('cursos/informacionalumno');
	}

	public function cerrarSesion()
	{
		/* Eliminamos la sesión y redireccionamos al login */
		Session::forget('usuario-alumno');
		return Redirect::to('login');
	}

	/* Función para generar el comprobante del alumno */
	public function generarPDFAlumno()
	{
		$datos = DB::table('Alumno')->whereRaw('correoAlumno = ?', [Session::get('usuario-alumno')])->get();

		$id = $datos[0]->idAlumno;
		$cursosAlumno = Alumno::find($id)->cursos;

		$obj = new AlumnoController();

		$prueba = DB::table('Curso')
            ->join('Aula', 'Curso.idAula', '=', 'Aula.idAula')
            ->join('Profesor', 'Curso.idAula', '=', 'Profesor.idProfesor')
            ->select('Curso.nombreCurso', 'Aula.aula', 'Profesor.nombreCompletoProfesor')
            ->get();

        /* ***************************************************** */
		$fPdf = new Fpdf();
        $fPdf->AddPage();
        $fPdf->SetFont('Arial', 'B', 11);

        $i=0;

        $fPdf->Cell(50, 3*$i, 'NOMBRE COMPLETO');
    	$fPdf->Cell(65, 3*$i, 'CORREO');
    	$fPdf->Cell(50, 3*$i, utf8_decode('TELEFONO'));
    	
    	$i++;

    	$obj->pdf2($fPdf);
        
        foreach($datos as $key => $value)
        {
        	$fPdf->Cell(50, 3*$i, utf8_decode($value->nombreCompletoAlumno));
        	$fPdf->Cell(65, 3*$i, utf8_decode($value->correoAlumno));
        	$fPdf->Cell(50, 3*$i, utf8_decode($value->telefonoAlumno));
        }
        /* ***************************************************** */

        $obj->pdf($fPdf);

        $fPdf->Cell(50, 3*$i, 'Tus Cursos');
    	$fPdf->Cell(65, 3*$i, 'Horario');

    	$obj->pdf2($fPdf);
        
        foreach($cursosAlumno as $key)
        {
        	$fPdf->Cell(50, 3*$i, utf8_decode($key->nombreCurso));
        	$fPdf->Cell(65, 3*$i, utf8_decode($key->horario));
        	$fPdf->Ln();
        }

        /* ***************************************************** */

        $obj->pdf($fPdf);

        $fPdf->Cell(50, 3*$i, 'Nuestros Cursos');
    	$fPdf->Cell(65, 3*$i, 'Aula');
    	$fPdf->Cell(65, 3*$i, 'Profesor');

        $obj->pdf2($fPdf);

        foreach($prueba as $key)
        {
        	$fPdf->Cell(50, 3*$i, utf8_decode($key->nombreCurso));
        	$fPdf->Cell(65, 3*$i, utf8_decode($key->aula));
        	$fPdf->Cell(50, 3*$i, utf8_decode($key->nombreCompletoProfesor));
        	$fPdf->Ln();
        }

        /* ***************************************************** */
        $headers=['Content-Type' => 'application/pdf'];
        return Response::make($fPdf->Output(), 200, $headers);	
	}

	private function pdf($fPdf)
	{
		$fPdf->SetFont('Arial', 'B', 11);
        $i=0;
        $fPdf->Ln();
        $fPdf->Ln();
        $fPdf->Ln();
        $fPdf->Ln();
	}

	private function pdf2($fPdf)
	{
		$i = 0;
		$i++;
		$fPdf->Cell(20, 3*$i, '', 0, 1, 'C');
    	$fPdf->Cell(20, 3*$i, '', 0, 1, 'C');
    	$fPdf->SetFont('Arial', '', 10);
	}
}

?>
