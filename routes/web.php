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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*************************Agenda***********************************************/

Route::get('/agenda', 'AgendaController@index')->name('agenda')->middleware('auth');
Route::get('/agenda/create', 'AgendaController@create')->name('agenda.create')->middleware('auth');
Route::post('/agenda', 'AgendaController@store')->name('agenda.store')->middleware('auth');
Route::get('/agenda/{nota}/editar', 'AgendaController@edit')->name('agenda.edit')->middleware('auth');
Route::patch('/agenda/{nota}', 'AgendaController@update')->name('agenda.update')->middleware('auth');
Route::delete('/agenda/{nota}', 'AgendaController@destroy')->name('agenda.destroy')->middleware('auth');
Route::post('/agenda/show', 'AgendaController@show')->name('agenda.show')->middleware('auth');

/*************************Comunidades***********************************************/

Route::get('/comunidades', 'ComunidadeController@index')->name('comunidades')->middleware('auth');
Route::get('/comunidades/create', 'ComunidadeController@create')->name('comunidades.create')->middleware('auth');
Route::post('/comunidades', 'ComunidadeController@store')->name('comunidades.store')->middleware('auth');
Route::get('/comunidades/{nota}/editar', 'ComunidadeController@edit')->name('comunidades.edit')->middleware('auth');
Route::patch('/comunidades/{nota}', 'ComunidadeController@update')->name('comunidades.update')->middleware('auth');
Route::delete('/comunidades/{nota}', 'ComunidadeController@destroy')->name('comunidades.destroy')->middleware('auth', 'password.confirm');
Route::post('/comunidades/show', 'ComunidadeController@show')->name('comunidades.show')->middleware('auth');
Route::delete('/todos/{id}', 'VecinoController@todos')->name('todos')->middleware('auth', 'password.confirm');

/*************************Vecinos***********************************************/

Route::get('/vecinos', 'VecinoController@index')->name('vecinos')->middleware('auth');
Route::get('/vecinos/create', 'VecinoController@create')->name('vecinos.create')->middleware('auth');
Route::post('/vecinos', 'VecinoController@store')->name('vecinos.store')->middleware('auth');
Route::get('/vecinos/{nota}/{com}/editar', 'VecinoController@edit')->name('vecinos.edit')->middleware('auth');
Route::patch('/vecinos/{nota}', 'VecinoController@update')->name('vecinos.update')->middleware('auth');
Route::delete('/vecinos/{nota}', 'VecinoController@destroy')->name('vecinos.destroy')->middleware('auth', 'password.confirm');
Route::post('/vecinos/show', 'VecinoController@show')->name('vecinos.show')->middleware('auth');
Route::get('/vecinos/error', 'VecinoController@error')->name('vecinos.error')->middleware('auth');

/**************************************Proovedores************************/

Route::get('/proovedores', 'ProovedorController@index')->name('proovedores')->middleware('auth');
Route::get('/proovedores/create', 'ProovedorController@create')->name('proovedores.create')->middleware('auth');
Route::post('/proovedores', 'ProovedorController@store')->name('proovedores.store')->middleware('auth');
Route::get('/proovedores/{nota}/editar', 'ProovedorController@edit')->name('proovedores.edit')->middleware('auth');
Route::patch('/proovedores/{nota}', 'ProovedorController@update')->name('proovedores.update')->middleware('auth');
Route::delete('/proovedores/{nota}', 'ProovedorController@destroy')->name('proovedores.destroy')->middleware('auth', 'password.confirm');
Route::post('/proovedores/show', 'ProovedorController@show')->name('proovedores.show')->middleware('auth');
Route::delete('/proovedores/error/{nota}', 'ProovedorController@error')->name('proovedores.error-borrado')->middleware('auth');
Route::delete('/borrar-todo/{avs}', 'ProovedorController@todos')->name('borrar-todo')->middleware('auth');

/**************************************Avisos************************/

Route::get('/avisos', 'AvisoController@index')->name('avisos')->middleware('auth');
Route::get('/avisos/create', 'AvisoController@create')->name('avisos.create')->middleware('auth');
Route::post('/avisos', 'AvisoController@store')->name('avisos.store')->middleware('auth');
Route::get('/avisos/{nota}/editar', 'AvisoController@edit')->name('avisos.edit')->middleware('auth');
Route::patch('/avisos/{nota}', 'AvisoController@update')->name('avisos.update')->middleware('auth');
Route::delete('/avisos/{nota}', 'AvisoController@destroy')->name('avisos.destroy')->middleware('auth', 'password.confirm');
Route::post('/avisos/show', 'AvisoController@show')->name('avisos.show')->middleware('auth');


/**************************************Mensajes************************/

Route::get('/mensajes', 'MensajeController@index')->name('mensajes')->middleware('auth');
Route::get('/mensajes/create', 'MensajeController@create')->name('mensajes.create')->middleware('auth');
Route::post('/mensajes', 'MensajeController@store')->name('mensajes.store')->middleware('auth');
Route::delete('/mensajes/{nota}', 'MensajeController@destroy')->name('mensajes.destroy')->middleware('auth');

/**************************************Usuarios************************/

Route::get('/usuarios', 'UsuarioController@index')->name('usuarios')->middleware('auth');
Route::get('/usuarios/create', 'UsuarioController@create')->name('usuarios.create')->middleware('auth');
Route::post('/usuarios', 'UsuarioController@store')->name('usuarios.store')->middleware('auth');
Route::get('/usuarios/{nota}/editar', 'UsuarioController@edit')->name('usuarios.edit')->middleware('auth');
Route::patch('/usuarios/{nota}', 'UsuarioController@update')->name('usuarios.update')->middleware('auth');
Route::delete('/usuarios/{nota}', 'UsuarioController@destroy')->name('usuarios.destroy')->middleware('auth', 'password.confirm');
Route::post('/usuarios/show', 'UsuarioController@show')->name('usuarios.show')->middleware('auth');
