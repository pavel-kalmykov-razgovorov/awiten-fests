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

Route::get('festivals-plantilla', 'FestivalController@init');
Route::get('festivalsLookFor', 'FestivalController@busqueda');
Route::get('festivalsLookForGenre', 'FestivalController@busquedaPorGenero');
Route::get('festivalsLookForParametrized', 'FestivalController@busquedaConParametros');

Route::get('artistsLookFor', 'ArtistController@busqueda');
Route::get('artistsLookForParametrized', 'ArtistController@busquedaConParametros');
Route::get('artistsLookForGenre', 'ArtistController@busquedaPorGenero');
Route::get('artists', 'ArtistController@init');
Route::get('artist/new', 'ArtistController@FormNew');
Route::post('artist/new/create', 'ArtistController@Create');
Route::get('artist/{permalink}', 'ArtistController@Details');
Route::get('artist/{permalink}/edit', 'ArtistController@Edit');
Route::put('artist/{permalink}/edit/update', 'ArtistController@Update');
Route::get('artist/{permalink}/delete', 'ArtistController@Delete');
Route::get('artist/{permalink}/delete/confirm', 'ArtistController@DeleteConfirm');

Route::get('festivals', 'FestivalController@All');
Route::get('fesitvals/new', 'FestivalController@FormNew');
Route::post('festivals/new/create', 'FestivalController@Create');
Route::get('festival/{permalink}', 'FestivalController@Details');
Route::get('festival/{permalink}/edit', 'FestivalController@Edit');
Route::put('festival/{permalink}/edit/update', 'FestivalController@Update');
Route::get('festival/{permalink}/delete', 'FestivalController@Delete');
Route::get('festival/{permalink}/delete/confirm', 'FestivalController@DeleteConfirm');

Route::get('deletePost/{id}', 'FestivalController@DeletePost');
Route::get('festival/mostrarPost/{id}', 'FestivalController@MostrarNoticia');