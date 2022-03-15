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

use Illuminate\Support\Facades\Auth;

Route::get('/series', 'SeriesController@index')->name('series.index');
Route::get('/series/create', 'SeriesController@create')->name('series.cadastrar')->middleware('aut');;
Route::get('/series/{serieID}/temporadas', 'TemporadasController@index');

Route::post('/series/create', 'SeriesController@store')->name('series.salvar')->middleware('aut');;
Route::post('/series/{id}/editarSerie', 'SeriesController@editarSerie')->middleware('aut');;

Route::delete('/series/{id}', 'SeriesController@destroy')->name('series.remove')->middleware('aut');;

Route::get('/temporadas/{temporada}/episodios', 'EpisodiosController@index');

Route::post('/temporadas/{temporada}/episodios/assistir', 'EpisodiosController@assistir')->middleware('aut');;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/entrar', 'EntrarController@index');

Route::post('/entrar', 'EntrarController@entrar');

Route::get('/registrar', 'RegistroController@create');

Route::post('/registrar', 'RegistroController@store');

Route::get('/sair', function () {
    Auth::logout();
    return redirect('/entrar');
});

Route::get('/visualizando-email', function () {
    return new \App\Mail\NovaSerie(
        'Arrow', 5, 20
    );
});

Route::get('/enviando-email', function () {
    $email = new \App\Mail\NovaSerie(
        'Arrow', 5, 20
    );
    $user = (object)[
        'email' => 'd0870870cf-a61a2a@inbox.mailtrap.io',
        'name' => 'junior'
    ];
    $email->subject('Nova Serie Adicionada');

    \Illuminate\Support\Facades\Mail::to($user)->send($email);
    return 'enviado';
});