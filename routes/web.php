<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});



Auth::routes();



//Rutas de Vistas
Route::resource('estudiantes','EstudianteController');
Route::resource('academicos','AcademicoController');
Route::resource('actividades','ActividadController');
Route::resource('home', 'HomeController');
Route::resource('registrarExamen','RegistrarExamenController');
Route::resource('anularTrabajo','AnularController');
Route::resource('inscripcionFormal','InscripcionFormalController');
Route::resource('autorizar','AutorizarController');
Route::get('home', 'HomeController@index')->name('home');

//Rutas de Funciones de controladores
Route::get('correctcom', 'TrabajoController@editComisionCorrectora')->name('correctcom');

Route::get('trabajos/updateExamenTitulo', 'TrabajoController@updateExamenTitulo')->name('trabajos.updateExamenTitulo');
route::get('trabajos/regExTitulo', 'TrabajoController@regExTitulo')->name('trabajos.regExTitulo');
Route::get('trabajos/editExamenTitulo', 'TrabajoController@editExamenTitulo')->name('trabajos.editExamenTitulo');
Route::resource('trabajos','TrabajoController');


