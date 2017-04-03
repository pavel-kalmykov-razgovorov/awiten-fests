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
Route::get('festivals-plantilla2', 'FestivalController@cambio');
Route::get('festivals-plantilla3', 'FestivalController@ordenar');
Route::get('festivals-plantilla3', 'FestivalController@busqueda');
Route::get('festivals-plantilla4', 'FestivalController@busquedaPorGenero');

//$festivals-plantilla = \App\Festival::get(['permalink', 'name', 'pathLogo', 'date','id']);
//$festival->genres->get(1)->genre

Route::get('festival/{permalink}', function ($permalink) {
    $festival = \App\Festival::where('permalink', $permalink)->first();
    return view('festival.details', ['festival' => $festival]);
});



Route::get('artists', 'ArtistController@All');
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
