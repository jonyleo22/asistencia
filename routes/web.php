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

