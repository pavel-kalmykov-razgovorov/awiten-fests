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

Route::get('festivals', function () {
    return view('festivals', ['festivals' => \App\Festival::get(['id', 'name'])]);
});

Route::get('festival/{id}', function ($id) {
    return view('festival', ['festival' => \App\Festival::find($id)]);
})->where('id', '[0-9]+');

Route::get('artists', function () {
    return view('artists', ['artists' => \App\Artist::get(['id', 'name'])]);
});

Route::get('artist/{id}', function ($id) {
    return view('artist', ['artist' => \App\Artist::find($id)]);
})->where('id', '[0-9]+');