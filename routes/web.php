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

//Methods for get values


Route::get('//serie/', 'SeriesController@index')->name('serie.index');
Route::get('/serie/create', 'SeriesController@create')->name('serie.cadastrar');

Route::get('/serie/{serieID}/temporadas', 'TemporadasController@index');

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');

//Methods for add values
Route::post('/serie/create', 'SeriesController@store')->name('serie.salvar');
Route::post('/serie/{id}/editarSerie', 'SeriesController@editarSerie');

Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir');

//Methods for removing values
Route::delete('/serie/{id}', 'SeriesController@destroy')->name('serie.remove');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'EntrarController@index');
Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registrar', 'RegistroController@create');
Route::post('/registrar', 'RegistroController@store');
