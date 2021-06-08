<?php

use App\Http\Controllers\legajosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inicio','inicioController@index')->name('inicio.sistema');

// RUTAS usuarios

Route::get ('/usuarios','usuariosController@index')->name('mostrar.index.usuarios');

Route::get('/formulario-usuarios','usuariosController@formulario')->name('formulario_usuario');

Route::post('/registrar-usuario','usuariosController@registrar_usuario')->name('registrar.usuario');

Route::get('/editar-usuario/{id}','usuariosController@mostrar_edicion_usuario')->name('formulario.edicion.usuario') ;

Route::put('/actualizar-usuario','usuariosController@actualizar_usuario')->name('actualizar.usuario');

// RUTAS Asistencias

Route::get('/asistencias-index','asistenciaController@index')->name('asistencias.index');

Route::post('/registrar-asistencia','asistenciaController@registrar_asistencia')->name('registrar.asistencia');

Route::get('/informes','asistenciaController@informes')->name('asistencias.informe');

Route::get('/informe-siap','asistenciaController@informe_siap')->name('informe.siap');

Route::get('/formulario-observacion/{id}','asistenciaController@formulario_observacion')->name('formulario.observacion');

Route::put('/registrar-observacion', 'asistenciaController@registrar_observacion')->name('registrar.observacion');

// RUTAS Inasistencias

Route::get('/inasistencia-index','inasistenciaController@index')->name('inasistencia.index');
Route::get('/registrar-inasistencias','inasistenciaController@registrar_inasistencias')->name('registrar.inasistencias');

// RUTAS licencias

Route::get('/licencias-index','licenciaController@index')->name('licencia.index');
Route::get('/formulario-maternidad','licenciaController@formulario_maternidad')->name('formulario.maternidad');
Route::get('/formulario-enfermedad','licenciaController@formulario_enfermedad')->name('formulario.enfermedad');
Route::get('/formulario-altamedica','licenciaController@formulario_altamedica')->name('formulario.altamedica');

// RUTAS LEGAJO

Route::get('/legajos-index','legajosController@index')->name('legajos.index');
Route::get('/legajo-formulario','legajosController@formulario_legajo')->name('formulario.legajo');
Route::post('/legajo-registro','legajosController@legajo_registro')->name('legajo.registro');
Route::get('/legajo-datos-familia','legajosController@datos_familia')->name('datos.familia');
Route::get('/legajo-datos-hijos','legajosController@datos_hijos')->name('datos.hijos');

// vacaciones (lar)

Route::get('/vacaciones-index/{id}','vacacionesController@index')->name('vacaciones.index');
