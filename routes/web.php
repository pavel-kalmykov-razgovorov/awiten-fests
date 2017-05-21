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


Auth::routes();
Route::get('festivals', 'FestivalController@init');
Route::get('festivalsLookFor', 'FestivalController@busqueda');
Route::get('festivalsLookForGenre', 'FestivalController@busquedaPorGenero');
Route::get('festivalsLookForParametrized', 'FestivalController@busquedaConParametros');
Route::get('festivals/{permalink}/details', 'FestivalController@Details');
Route::get('fesitvals/{permalink}/images/{filename}', [
    'uses' => 'FestivalController@getFestivalImage',
    'as' => 'festival.image'
]);
Route::get('deletePost/{id}', 'FestivalController@DeletePost');
Route::get('festival/mostrarPost/{id}', 'FestivalController@MostrarNoticia');

Route::get('artistsLookFor', 'ArtistController@busqueda');
Route::get('artistsLookForParametrized', 'ArtistController@busquedaConParametros');
Route::get('artistsLookForGenre', 'ArtistController@busquedaPorGenero');
Route::get('artists', 'ArtistController@init');
Route::get('artists/{permalink}/details', 'ArtistController@Details');
Route::get('artists/{permalink}/images/{filename}', [
    'uses' => 'ArtistController@GetArtistImage',
    'as' => 'artist.image'
]);


Route::get('/contacto', 'PagesController@getContact');
Route::post('/contacto', 'PagesController@postContact');

/*
 * ADMIN
 */
Route::get('admin', function () {
    redirect()->action('Auth\LoginController@login');
});

//List
Route::get('admin/entities', 'AdminController@AvailableEntities');

Route::group(['middleware' => 'forAdmin'], function() {
    Route::get('admin/users', 'AdminController@UsersList');
    Route::get('admin/users/add', 'UserController@FormNew');
    Route::post('admin/users/new/create', 'UserController@Create');
    Route::get('admin/users/{permalink}/details', 'UserController@DetailsAdmin');
    Route::get('admin/users/{permalink}/lock', 'UserController@Lock');
    Route::get('admin/users/{permalink}/delete', 'UserController@Delete');
    //Genres
    Route::get('admin/genres', 'AdminController@GenresList');
    Route::get('admin/genres/add', 'GenreController@FormNew');
    Route::post('admin/genres/create', 'GenreController@Create');
    Route::get('admin/genres/{permalink}/details', 'GenreController@DetailsAdmin');
    Route::get('admin/genres/{permalink}/edit', 'GenreController@Edit');
    Route::put('admin/genres/{permalink}/update', 'GenreController@Update');
    Route::get('admin/genres/{permalink}/delete', 'GenreController@Delete');
});

Route::group(['middleware' => 'forManager'], function() {
    Route::get('admin/artists', 'AdminController@ArtistsList');
    Route::get('admin/artists/add', 'ArtistController@FormNew');
    Route::post('admin/artists/create', 'ArtistController@Create');
    Route::get('admin/artists/{permalink}/edit', 'ArtistController@Edit');
    Route::put('admin/artists/{permalink}/update', 'ArtistController@Update');
    Route::get('admin/artists/{permalink}/details', 'ArtistController@DetailsAdmin');
    Route::get('admin/artists/{permalink}/delete', 'ArtistController@Delete');
    //Asistance confirmation
    Route::get('admin/artists/confirm/{artistPermalink}_{festivalPermalink}_{confirmation}', 'ArtistController@ConfirmAssistance');
});

Route::group(['middleware' => 'forPromoter'], function() {
    //List
    Route::get('admin/festivals', 'AdminController@FestivalsList');
    Route::get('admin/posts', 'AdminController@PostsList');
    Route::get('admin/photos', 'AdminController@PhotosList');
    //Add
    Route::get('admin/festivals/add', 'FestivalController@FormNew');
    Route::get('admin/posts/add', 'PostController@FormNew');
    Route::get('admin/photos/add', 'PhotoController@FormNew');
    //Create
    Route::post('admin/festivals/create', 'FestivalController@Create');
    Route::post('admin/posts/create', 'PostController@Create');
    Route::post('admin/photos/create', 'PhotoController@Create');
    //Details
    Route::get('admin/festivals/{permalink}/details', 'FestivalController@DetailsAdmin');
    Route::get('admin/posts/{permalink}/details', 'PostController@DetailsAdmin');
    Route::get('admin/photos/{permalink}/details', 'PhotoController@DetailsAdmin');
    //Edit
    Route::get('admin/festivals/{permalink}/edit', 'FestivalController@Edit');
    Route::get('admin/posts/{permalink}/edit', 'PostController@Edit');
    Route::get('admin/photos/{permalink}/edit', 'PhotoController@Edit');
    //Update
    Route::put('admin/festival/{permalink}/update', 'FestivalController@Update');
    Route::put('admin/posts/{permalink}/update', 'PostController@Update');
    Route::put('admin/photos/{permalink}/update', 'PhotoController@Update');
    //Delete
    Route::get('admin/posts/{permalink}/delete', 'PostController@Delete');
    Route::get('admin/photos/{permalink}/delete', 'PhotoController@Delete');
    Route::get('admin/festival/{permalink}/delete', 'FestivalController@Delete');
});

//Funciones del perfil para managers y promotores
Route::get('admin/users/edit/', 'UserController@Edit')->middleware('auth');
Route::put('admin/users/update/', 'UserController@Update')->middleware('auth');

Route::get('/home', function() {
    return view('home');
})->middleware('forManager');
Route::get('/home-admin', function() {
    return view('admin2');
})->middleware('forAdmin');
//->middleware('forPromoter');
Route::get('/noPermision', function() {
    return view('noPermision');
});
Route::get('/confirmation/{token}', 'Auth\RegisterController@confirmation');
