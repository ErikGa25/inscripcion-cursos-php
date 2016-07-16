<?php

class Alumno extends Eloquent 
{
	protected $table = 'Alumno';
	protected $primaryKey= 'idAlumno';
	public $timestamps = false;

	public function cursos()
	{
		return $this->belongsToMany('Curso', 'Inscripcion', 'idAlumno', 'idCurso');
	}
}

?>