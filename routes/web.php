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

//Methods for add values
Route::post('/serie/create', 'SeriesController@store')->name('serie.salvar');

//Methods for removing values
Route::delete('/serie/{id}', 'SeriesController@destroy')->name('serie.remove');
