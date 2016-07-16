<?php

class Curso extends Eloquent 
{
	protected $table = 'Curso';
	protected $primaryKey= 'idCurso';
	public $timestamps = false;

	public function alumnos()
	{
		return $this->belongsToMany('Alumno', 'Inscripcion', 'idAlumno', 'idCurso');
	}
}

?>