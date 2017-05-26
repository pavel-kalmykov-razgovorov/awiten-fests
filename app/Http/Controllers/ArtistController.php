<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Festival;
use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Schema;

class ArtistController extends Controller implements AdministrableController
{
    private $artists;
    private $genres;

    public function init()
    {
        $artists = \App\Artist::paginate(3);
        $genres = \App\Genre::get();
        return view('artist.all')
            ->with('artists', $artists)
            ->with('genres', $genres);
    }

    public function busquedaPorGenero(Request $request)
    {
        $generos = array();
        $genres = \App\Genre::get();
        foreach ($genres as $genre) {
            $generoSinEspacios = str_replace(' ', '_', $genre->name);
            if ($request->has($generoSinEspacios)) {
                array_push($generos, $genre->id);
            }
        }
        $request->session()->flash('generos-marcados-artista', $generos);
        $artists = \App\Artist::join('artist_genre', "artist_genre.artist_id", "=", "id")->whereIn('genre_id', $generos)->groupBy("id")->paginate(3);
        $artists->appends($request->except('page'));
        return view('artist.all')
            ->with('artists', $artists)
            ->with('genres', $genres);

    }

    public function listByGenre($permalink)
    {
        $genres = Genre::get();
        $artists = Artist::whereHas('genres', function ($query) use ($permalink) {
            $query->where('permalink', $permalink);
        })->paginate(3);
        $selected_genres_id[] = Genre::where('permalink', $permalink)->firstOrFail()->id;
        session()->flash('generos-marcados-artista', $selected_genres_id);
        return view('artist.all', [
            'artists' => $artists,
            'genres' => $genres,
        ]);
    }

    public function busquedaConParametros(Request $request)
    {
        $buscado = $request->input('buscado');
        $porPag = $request->input('paginadoA');
        $orden = $request->input('ordenado');
        $artists = \App\Artist::where('name', 'like', '%' . $buscado . '%')->orderBy('name', $orden)->paginate($porPag);
        $genres = \App\Genre::get();
        $artists->appends($request->except('page'));
        return view('artist.all')
            ->with('artists', $artists)
            ->with('genres', $genres);
    }

    public function All()
    {
        return view('artist.all', ['artists' => Artist::paginate(3)]);
    }

    public function FormNew()
    {
        return view('artist.create', [
            'festivals' => Festival::get(['id', 'name']),
            'genres' => Genre::get(['id', 'name']),
        ]);
    }

    public function Create(Request $request)
    {
        if (!Auth::user()) return redirect()->back()->withErrors('auth', 'User not authenticated');
        $genres_id = $request->get('genres', []);
        $genres = Genre::get(['id', 'name']);
        foreach ($genres as $genre) {
            $genre->checked = '';
            foreach ($genres_id as $genre_id) {
                if ($genre_id == $genre->id) {
                    $genre->checked = 'checked';
                    break;
                }
            }
        }
        $request->session()->flash('genres', $genres);
        $request->session()->flash('festivals', $request->get('festivals', []));
        $this->validate($request, [
            'name' => 'required',
            'pathProfile' => 'required',
            'pathHeader' => 'required',
            'permalink' => 'required|unique:artists'
        ]); //Sabemos que los datos del nuevo artista están correctos

        //Guardado de ficheros
        $artistsFolder = "artists/$request->permalink"; //La carpeta en donde guardaremos las imágenes
        $pathProfileFilename = null;
        $pathHeaderFilename = null;
        if ($request->hasFile('pathProfile') && $request->pathProfile->isValid()) {
            $pathProfileFilename = $request->pathProfile->getClientOriginalName();
            $request->pathProfile->storeAs("$artistsFolder", $pathProfileFilename);
        }
        if ($request->hasFile('pathHeader') && $request->pathHeader->isValid()) {
            $pathHeaderFilename = $request->pathHeader->getClientOriginalName();
            $request->pathHeader->storeAs("$artistsFolder", $pathHeaderFilename);
        }

        $artist = new Artist([
            'name' => $request->get('name'),
            'soundcloud' => $request->get('soundcloud'),
            'website' => $request->get('website'),
            'country' => $request->get('country'),
            'pathProfile' => $pathProfileFilename,
            'pathHeader' => $pathHeaderFilename,
            'permalink' => $request->get('permalink'),
            'manager_id' => Auth::user()->id
        ]);
        $user = Auth::user();
        $artist->user()->associate($user);
        $artist->saveOrFail();
        //Al nuevo artista le pongo como sus festivales los que recibe de los select
        //OJO: usamos array_unique por si en el formulario hubiese dos select con el mismo festival
        $artist->festivals()->sync($request->get('festivals'));
        $artist->genres()->sync($genres_id);
        return redirect()->action('ArtistController@DetailsAdmin', [$artist])->with('created', true);
    }

    public function Details($permalink)
    {
        return view('artist.details', [
            'permalink' => $permalink,
            'artist' => Artist::where('permalink', $permalink)->first()
        ]);
    }

    public function DetailsAdmin($permalink)
    {
        //Comprobar que el usuario identificado tiene acceso al artista indicado
        $user = Auth::user();
        $artist = Artist::select('id')->where('permalink', $permalink)->where('manager_id', $user->id)->first();
        if ($artist == null) {
            return redirect('/noPermision');
        }
        return view('artist.details-admin', [
            'column_names' => Schema::getColumnListing(strtolower(str_plural('artists'))),
            'permalink' => $permalink,
            'artist' => Artist::where('permalink', $permalink)->first()
        ]);
    }

    public function Edit($permalink)
    {
        //Comprobar que el usuario identificado tiene acceso al artista indicado
        $user = Auth::user();
        $artist = Artist::where('permalink', $permalink)->where('manager_id', $user->id)->first();
        if ($artist == null) {
            return redirect('/noPermision');
        }
        //$artist = Artist::where('permalink', $permalink)->first();
        $festivals = Festival::get(['id', 'name']);
        $genres = Genre::get(['id', 'name']);
        foreach ($genres as $genre) {
            $genre->checked = '';
            foreach ($artist->genres as $artist_genre) {
                if ($artist_genre->id == $genre->id) {
                    $genre->checked = 'checked';
                    break;
                }
            }
        }
        return view('artist.edit', [
            'permalink' => $permalink,
            'artist' => $artist,
            'festivals' => $festivals,
            'genres' => $genres,
        ]);
    }

    public function Update(Request $request, $permalink)
    {
        //Comprobar que el usuario identificado tiene acceso al artista indicado
        $user = Auth::user();
        $artist = Artist::where('permalink', $permalink)->where('manager_id', $user->id)->first();
        if ($artist == null) {
            return redirect('/noPermision');
        }
        if ($request->get('permalink', '') != $permalink) {
            $this->validate($request, [
                'name' => 'required',
                'pathProfile' => 'required',
                'pathHeader' => 'required',
                'permalink' => 'required|unique:artists'
            ]);
        }

        //Guardado de ficheros
        $festivalFolder = "artists/$request->permalink"; //La carpeta en donde guardaremos las imágenes
        $pathProfileFilename = null;
        $pathHeaderFilename = null;
        if ($request->hasFile('pathProfile') && $request->pathProfile->isValid()) {
            Storage::delete("$festivalFolder/$artist->pathProfile"); //Si vamos a actualizar la imagen, borramos la anterior
            $pathProfileFilename = $request->pathProfile->getClientOriginalName();
            $artist->pathProfile = $pathProfileFilename;
            $request->pathProfile->storeAs("$festivalFolder", $pathProfileFilename);
        }
        if ($request->hasFile('pathHeader') && $request->pathHeader->isValid()) {
            Storage::delete("$festivalFolder/$artist->pathHeader"); //Si vamos a actualizar la imagen, borramos la anterior
            $pathHeaderFilename = $request->pathHeader->getClientOriginalName();
            $artist->pathHeader = $pathHeaderFilename;
            $request->pathHeader->storeAs("$festivalFolder", $pathHeaderFilename);
        }

        $artist->name = $request->get('name');
        $artist->soundcloud = $request->get('soundcloud');
        $artist->website = $request->get('website');
        $artist->country = $request->get('country');
        $artist->permalink = $request->get('permalink');
        $artist->saveOrFail();
        $artist->genres()->sync($request->get('genres'));
        return redirect()->action('ArtistController@DetailsAdmin', [$artist])->with('updated', true);
    }

    public function Delete($permalink)
    {
        $user = Auth::user();
        $artist = Artist::where('permalink', $permalink)->where('manager_id', $user->id)->first();
        if ($artist == null) {
            return redirect('/noPermision');
        }
        //Borrado de archivos
        Storage::deleteDirectory("artists/$artist->permalink");
        return redirect()->action('AdminController@ArtistsList')->with('deleted', $artist->delete());
    }

    public function ConfirmAssistance($artistPermalink, $festivalPermalink, $confirmation)
    {
        $user = Auth::user();
        $festival_id = Festival::select('id')->where('permalink', $festivalPermalink)->first()->id;
        $artist_id = Artist::select('id')->where('permalink', $artistPermalink)->where('manager_id', $user->id)->first()->id;
        if ($artist_id == null) {
            return redirect('/noPermision');
        }
        $detallesArtista = Artist::findOrFail($artist_id);
        $detallesFestival = Festival::findOrFail($festival_id);
        $confirmation = filter_var($confirmation, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

        if ($confirmation) {
            $data = array(
                'title' => "¡¡Nueva confirmación!!",
                'permalink' => $artistPermalink . $festivalPermalink . ".",
                'lead' => "Atención a todos los fans de " . $detallesArtista->name . "! Si tú eres uno de ellos no te puedes perder esto.",
                'body' => "¡¡Así es!! Despúes de un cúmulo de rumores y escpeculaciónes, el afamado " . $detallesArtista->name .
                    " ha confirmado su presencia en el festival " . $detallesFestival->name . ". Los numerosos fans de este grandismo Dj
            están de enhorabuena tras esta confirmación ya que su presencía no estaba asegurada debido a los accidentes ocurridos 
            en su ultima actuación en la Metro, donde un apasiando fan de este Dj, llamado Arnau o también conocido por la policia
            como 'Aguita el subnormal' se abalanzó sobre él, al grito de ¡¡¡" . $detallesArtista->name . " POSA TECHNOOOO!!. Finalmente, a pesar
            de este bochornoso aconteciomiento el gran " . $detallesArtista->name . " si acudirá a nuestro festival.",
                'festival_id' => $detallesFestival->id
            );
            app('App\Http\Controllers\PostController')->Create2($data);
        }

        Artist::where('permalink', $artistPermalink)->firstOrFail()->festivals()
            ->updateExistingPivot(
                Festival::where('permalink', $festivalPermalink)->firstOrFail()->id,
                ['confirmed' => $confirmation]);

        return redirect()->back();
    }

    public function GetArtistImage($permalink, $filename)
    {
        $file = Storage::disk('local')->get("artists/$permalink/$filename");
        return new Response($file, 200);
    }
}
