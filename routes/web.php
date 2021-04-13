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
