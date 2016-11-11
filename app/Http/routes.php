<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Rutas INDEX
Route::get('/','indexController@index');
Route::get('/quienes-somos','indexController@qs');
Route::get('/contacto','indexController@contacto');
Route::get('/noticia/{id}','indexController@noticia');
Route::post('contacto/register','indexController@regContacto');

//Rutas ADMIN
Route::group(['prefix'	=> 'admin', 'middleware'	=> 'admin'],function(){
	//NOTICIAS
	Route::resource('noticias','noticiasController');
	Route::get('noticias/{id}/destroy','noticiasController@destroy');
	Route::get('noticias/{id}/recovery','noticiasController@recovery');
	Route::get('noticias/{id}/remove','noticiasController@remove')->middleware('superadmin');
	//USUARIOS
	Route::resource('users','usersController');
	//CONTACTO
	Route::get('contacto','contactoController@index');
	Route::get('contacto/{id}','contactoController@show');
	//PASSWORD
	Route::get('password','passwordsController@showChange');
	Route::post('password/change','passwordsController@change');
});

//Rutas AUTH
Route::get('auth/login','authController@showLogin')->middleware('authenticated');
Route::post('auth/authentication','authController@login')->middleware('authenticated');
Route::get('auth/logout','authController@logout');