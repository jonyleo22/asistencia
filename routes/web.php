<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/inicio','inicioController@index')->name('inicio.sistema');

Route::get ('/usuarios','usuariosController@index')->name('mostrar.index.usuarios');

Route::get('/formulario-usuarios','usuariosController@formulario')->name('formulario_usuario');

Route::post('/registrar-usuario','usuariosController@registrar_usuario')->name('registrar.usuario');

Route::get('/asistencias-index','asistenciaController@index')->name('asistencias.index');

Route::post('/registrar-asistencia','asistenciaController@registrar_asistencia')->name('registrar.asistencia');

Route::get('/informes','asistenciaController@informes')->name('asistencias.informe');

Route::get('/informe-ifai','asistenciaController@informe_ifai')->name('informe.ifai');

Route::get('/formulario-observacion/{id}','asistenciaController@formulario_observacion')->name('formulario.observacion');

Route::put('/registrar-observacion', 'asistenciaController@registrar_observacion')->name('registrar.observacion');

Route::get('/licencias-index','licenciaController@index')->name('licencia.index');
Route::get('/formulario-maternidad','licenciaController@formulario_maternidad')->name('formulario.maternidad');
Route::get('/formulario-enfermedad','licenciaController@formulario_enfermedad')->name('formulario.enfermedad');
Route::get('/formulario-altamedica','licenciaController@formulario_altamedica')->name('formulario.altamedica');

Route::get('/editar-usuario/{id}','usuariosController@mostrar_edicion_usuario')->name('formulario.edicion.usuario') ;

route::put('/actualizar-usuario','usuariosController@actualizar_usuario')->name('actualizar.usuario');

// RUTAS LEGAJO

route::get('/legajos-index','legajosController@index')->name('legajos.index');
