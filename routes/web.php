<?php

use App\Http\Controllers\legajosController;
use App\Http\Controllers\licenciaController;
use App\Http\Controllers\vacacionesController;
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

Route::post('/lista-siap', 'asistenciaController@lista_siap')->name('lista.siap');

// RUTAS Inasistencias

Route::get('/inasistencia-index','inasistenciaController@index')->name('inasistencia.index');
Route::get('/registrar-inasistencias','inasistenciaController@registrar_inasistencias')->name('registrar.inasistencias');

// RUTAS licencias

Route::get('/licencias-index','licenciaController@index')->name('licencia.index');
Route::get('/formulario-maternidad','licenciaController@formulario_maternidad')->name('formulario.maternidad');
Route::get('/formulario-enfermedad','licenciaController@formulario_enfermedad')->name('formulario.enfermedad');
Route::get('/formulario-altamedica','licenciaController@formulario_altamedica')->name('formulario.altamedica');
Route::post('/buscar-dni-enfermedad','licenciaController@buscar_dni_enfermedad')->name('buscar.dni.enfermedad');
Route::Post('/buscar-dni-alta','licenciaController@buscar_dni_alta')->name('buscar.dni.alta');
//registro paso 2  licencias medicas

Route::post('/maternidad-registro','licenciaController@maternidad_registro')->name('maternidad.registro');
Route::get('/maternidad-paso2','licenciaController@maternidad_paso2')->name('maternidad.paso2');
Route::post('/enfermedad-registro','licenciaController@enfermedad_registro')->name('enfermedad.registro');
Route::get('/enfermedad-paso2/{id}','licenciaController@enfermedad_paso2')->name('enfermedad.paso2');
Route::post('/alta-registro','licenciaController@alta_registro')->name('alta.registro');
Route::get('/alta-paso2/{id}','licenciaController@alta_paso2')->name('alta.paso2');
Route::post('/actualizar-estado-licencia','licenciaController@actualizar_estado_licencia')->name('actualizar.estado.licencia');
//finalizar licencia

Route::get('/finalizar-enfermedad/{id}','licenciaController@finalizar_enfermedad')->name('finalizar.enfermedad');
Route::get('/finalizar-alta-medica/{id}','licenciaController@finalizar_alta_medica')->name('finalizar.alta.medica');
Route::post('/registrar-finalizar-enfermedad','licenciaController@registrar_finalizar_enfermedad')->name('registrar.finalizar.enfermedad');
Route::post('/registrar-alta-medica','licenciaController@registrar_finalizar_alta')->name('registra.finalizar.alta');
//RUTA PARA DECRETOS / LICENCIA

Route::get('/decreto-index','licenciaController@decreto_index')->name('decreto.index');
Route::get('/formulario-decreto','licenciaController@formulario_decreto')->name('formulario.decreto');
Route::post('/registrar-decreto','licenciaController@registrar_decreto')->name('registrar.decreto');
Route::get('/decreto-editar/{id}','licenciaController@decreto_editar')->name('editar.decreto');
Route::put('/actualizar-decreto','licenciaController@actualizar_decreto')->name('actualizar.decreto');
Route::get('/ver-articulos/{id}','licenciaController@ver_articulos')->name('ver.articulos');

//RUTA PARA ARTICULO / LICENCIA

Route::get('/articulo-index','licenciaController@articulo_index')->name('articulo.index');
Route::get('/formulario-articulo','licenciaController@formulario_articulo')->name('formulario.articulo');
Route::post('/registrar-articulo','licenciaController@registrar_articulo')->name('registrar.articulo');
Route::get('/articulo-editar/{id}','licenciaController@articulo_editar')->name('editar.articulo');
Route::put('/actualizar-articulo','licenciaController@actualizar_articulo')->name('actualizar.articulo');


// RUTAS LEGAJO

Route::get('/legajos-index','legajosController@index')->name('legajos.index');
Route::get('/legajo-formulario','legajosController@formulario_legajo')->name('formulario.legajo');
Route::post('/legajo-registro','legajosController@legajo_registro')->name('legajo.registro');
Route::get('/legajo-editar/{id}','legajosController@editar_legajo')->name('editar.legajo');
Route::get('/legajo-editar-empleado/{id}','legajosController@editar_legajo_empleado')->name('editar.legajo.empleado');
Route::put('/legajo-actualizar','legajosController@actualizar_legajo')->name('legajo.actualizar');
Route::put('/legajo-actualizar-empleado','legajosController@actualizar_legajo_empleado')->name('legajo.actualizar.empleado');

// vacaciones (lar)

Route::get('/vacaciones-index','vacacionesController@index')->name('vacaciones.index');
Route::get('/vacaciones-formulario/{id}','vacacionesController@formulario_vacaciones')->name('formulario.vacaciones');
Route::post('/registrar-vacaiones','vacacionesController@registrar_vacaciones')->name('registrar.vacaciones');
Route::get('/historial-vacaiones/{id}','vacacionesController@historial_vacaciones')->name('historial.vacaciones');
Route::get('/vacaciones-formulario-sali/{id}','vacacionesController@formulariosali_vacaciones')->name('formulariosali.vacaciones');
Route::post('/registrarsali-vacaciones','vacacionesController@registrarsali_vacaciones')->name('registrarsali.vacaciones');
Route::get('/nota-lar','vacacionesController@nota_lar')->name('nota.lar');
