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


Route::get('/series', 'SeriesController@index')->name('series.index');
Route::get('/series/create', 'SeriesController@create')->name('series.cadastrar')->middleware('aut');;
Route::get('/series/{serieID}/temporadas', 'TemporadasController@index');

Route::post('/series/create', 'SeriesController@store')->name('series.salvar')->middleware('aut');;
Route::post('/series/{id}/editarSerie', 'SeriesController@editarSerie')->middleware('aut');;

Route::delete('/series/{id}', 'SeriesController@destroy')->name('series.remove')->middleware('aut');;

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');

Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')->middleware('aut');;

aut::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'EntrarController@index');

Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registrar', 'RegistroController@create');

Route::post('/registrar', 'RegistroController@store');

Route::get('/sair', function () {
    aut::logout();
    return redirect('/entrar');
});
