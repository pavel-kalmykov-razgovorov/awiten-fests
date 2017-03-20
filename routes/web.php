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
use Illuminate\Support\Facades\Input;

Route::get('/', function () {
    return view('welcome');
});

Route::get('festivals', function () {
<<<<<<< HEAD
   // $ms = Person::where('name', '=', 'Foo Bar')->first();
   // $persons = Person::order_by('list_order', 'ASC')->get();
   // return $view->with('data', ['ms' => $ms, 'persons' => $persons]));
   $festivals = \App\Festival::get(['permalink', 'name', 'pathLogo', 'date','id']);
   $genres = \App\Festival::get(['name']);
    //return view('festivals', ['festivals' => \App\Festival::get(['permalink', 'name', 'pathLogo', 'date','id'])]);
   return view('festivals')
   ->with('festivals',\App\Festival::get(['permalink', 'name', 'pathLogo', 'date','id']))
   ->with('genres',\App\Genre::get(['genre']));
=======
    return view('festival.all', ['festivals' => \App\Festival::get(['permalink', 'name'])]);
>>>>>>> 73e27499527a33622930491e423856481c27251d
});

//$festivals = \App\Festival::get(['permalink', 'name', 'pathLogo', 'date','id']);
//$festival->genres->get(1)->genre

Route::get('festival/{permalink}', function ($permalink) {
    $festival = \App\Festival::where('permalink', $permalink)->first();
    return view('festival.details', ['festival' => $festival]);
});



Route::get('artists', function () {
    return view('artist.all', ['artists' => \App\Artist::get(['permalink', 'name'])]);
});

Route::get('artist/new', function() {
    return view('artist.create', ['festivals' => \App\Festival::get(['permalink', 'name'])]);
});

Route::post('artist/new/create', function() {
    try {
        $artist = new \App\Artist;
        $artist->name = Input::get('name');
        $artist->soundcloud = Input::get('soundcloud');
        $artist->website = Input::get('website');
        $artist->country = Input::get('country');
        $artist->permalink = str_slug(Input::get('name'));
        $artist->save();
    } catch (Exception $e) {
        return "Error: " . $e;
    }
    $festival_ids = [];
    foreach(array_unique(Input::get('festivals')) as $festival) {
        $festival_ids[] = \App\Festival::where('permalink', $festival)->first()->id;
    }
    $artist->festivals()->attach($festival_ids);
    return view('artist.create-confirm', ['artist' => $artist]);
});

Route::get('artist/{permalink}', function ($permalink) {
    return view('artist.details', ['artist' => \App\Artist::where('permalink', $permalink)->first()]);
});

Route::get('artist/{permalink}/edit', function($permalink) {
    return view('artist.edit', [
        'artist' => \App\Artist::where('permalink', $permalink)->first(),
        'festivals' => \App\Festival::get(['permalink', 'name'])
        ]);
});

Route::post('artist/{permalink}/edit/update', function($permalink) {
    try {
        $artist = \App\Artist::where('permalink', $permalink)->first();
        $artist->name = Input::get('name');
        $artist->soundcloud = Input::get('soundcloud');
        $artist->website = Input::get('website');
        $artist->country = Input::get('country');
        $artist->permalink = str_slug(Input::get('name'));
        $artist->save();
    } catch (Exception $e) {
        return "Error: " . $e;
    }
    $festival_ids = [];
    foreach(array_unique(Input::get('festivals')) as $festival) {
        $festival_ids[] = \App\Festival::where('permalink', $festival)->first()->id;
    }
    $artist->festivals()->sync($festival_ids);
    return view('artist.edit-confirm', ['artist' => $artist]);
});

Route::get('artist/{permalink}/delete', function ($permalink) {
    return view('artist.delete', ['artist' => \App\Artist::where('permalink', $permalink)->first()]);
});

Route::get('artist/{permalink}/delete/confirm', function ($permalink) {
    $artist = \App\Artist::where('permalink', $permalink)->first();
    $deleted = !is_null($artist) ? $artist->delete() : false;
    return view('artist.delete-confirm', ['name' => $artist->name ?? null, 'deleted' => $deleted]);
});