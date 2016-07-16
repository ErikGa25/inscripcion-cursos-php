<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'AlumnoController@index');
Route::any('/login', 'AlumnoController@login');
Route::any('/registro', 'AlumnoController@registrarAlumno');
Route::any('/cursos/informacionalumno', 'AlumnoController@informacionAlumno');
Route::any('/cursos/cerrarsesion', 'AlumnoController@cerrarSesion');
Route::any('/cursos/generarpdf', 'AlumnoController@generarPDFAlumno');
Route::any('/cursos/informacioncursos', 'CursoController@informacionCurso');
Route::any('/cursos/registrarcurso/{d}/{h}', 'CursoController@registrarCurso');