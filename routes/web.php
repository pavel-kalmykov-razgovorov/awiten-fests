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
   // $ms = Person::where('name', '=', 'Foo Bar')->first();
   // $persons = Person::order_by('list_order', 'ASC')->get();
   // return $view->with('data', ['ms' => $ms, 'persons' => $persons]));
   $festivals = \App\Festival::get(['permalink', 'name', 'pathLogo', 'date','id']);
   $genres = \App\Festival::get(['name']);
    //return view('festivals', ['festivals' => \App\Festival::get(['permalink', 'name', 'pathLogo', 'date','id'])]);
   return view('festivals')
   ->with('festivals',\App\Festival::get(['permalink', 'name', 'pathLogo', 'date','id']))
   ->with('genres',\App\Genre::get(['genre']));
});

//$festivals = \App\Festival::get(['permalink', 'name', 'pathLogo', 'date','id']);
//$festival->genres->get(1)->genre

Route::get('festival/{permalink}', function ($permalink) {
    $festival = \App\Festival::where('permalink', $permalink)->first();
    return view('festival', ['festival' => $festival]);
});

Route::get('artists', function () {
    return view('artists', ['artists' => \App\Artist::get(['permalink', 'name'])]);
});

Route::get('artist/{permalink}', function ($permalink) {
    return view('artist', ['artist' => \App\Artist::where('permalink', $permalink)->first()]);
});