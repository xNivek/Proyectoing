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
    return view('welcome');
});

Route::get("/admin", function(){
    return view('auth.register');
});

Route::get('indexEstudiante', 'BitacoraController@indexEstudiante');
Route::get('indexEstudiante', 'BitacoraController@indexEstudiante')->name('bitacora.indexEstudiante');
Route::get('indexProfesor', 'BitacoraController@indexProfesor');
Route::get('indexProfesor', 'BitacoraController@indexProfesor')->name('bitacora.indexProfesor');
Route::resource('bitacora', 'BitacoraController');
Route::get('/indexProfesor/{id}','AvanceController@indexProfesor');
Route::get('/indexProfesor/{id}','AvanceController@indexProfesor')->name('indexProfesor');

Route::get('/index/{id}','ComentarioController@index');
Route::get('/index/{id}','ComentarioController@index')->name('indexComentario');

Route::get('cambio','BitacoraController@cambio');
Route::get('cambio','BitacoraController@cambio')->name('cambio');






Route::get('/indice/{id}', 'AvanceController@index')->name('indice');
Route::get('/crear/{id}', 'AvanceController@create')->name('crear');

Route::get('/comen/{id}', 'ComentarioController@index')->name('comen');
Route::get('/showProfesor/{id}', 'AvanceController@showProfesor');
Route::get('/showProfesor/{id}', 'AvanceController@showProfesor')->name('avance.showProfesor');
Route::resource('avance', 'AvanceController');
Route::resource('user', 'UserController');

Route::get('/com/{id}','ComentarioController@create');
Route::get('/com/{id}','ComentarioController@create')->name('com');

Route::resource('comentario','ComentarioController');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


