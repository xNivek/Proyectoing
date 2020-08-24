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
Route::get('/indice/{id}', 'AvanceController@index')->name('indice');
Route::get('/crear/{id}', 'AvanceController@create')->name('crear');

Route::resource('avance', 'AvanceController');
Route::resource('user', 'UserController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

