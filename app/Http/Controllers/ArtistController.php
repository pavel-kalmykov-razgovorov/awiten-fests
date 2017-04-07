<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Festival;
use App\Genre;
use Illuminate\Http\Request;
use Schema;

class ArtistController extends Controller
{
    private $artists;
    private $genres;

    public function init()
    {
        // 		$ms = Person::where('name', '=', 'Foo Bar')->first();
        // 		$persons = Person::order_by('list_order', 'ASC')->get();
        // 		return $view->with('data', ['ms' => $ms, 'persons' => $persons]));
        $artists = \App\Artist::paginate(3);
        $genres = \App\Genre::get();
        //r		eturn view('festivals', ['festivals' => \App\Festival::get(['permalink', 'name', 'pathLogo', 'date','id'])]);
        return view('artist.all')
            ->with('artists', $artists)
            ->with('genres', $genres);
        // 		return view('festival-plantilla.all', ['festivals' => \App\Festival::get(['permalink', 'name', 'pathLogo', 'date','id'])]);
    }

    public function ordenar()
    {
        $artists = \App\Artist::orderBy('name', 'asc')->paginate(3);
        $genres = \App\Genre::get();
        return view('artist.all')
            ->with('artists', $artists)
            ->with('genres', $genres);
    }

    public function en6()
    {
        $artists = \App\Artist::paginate(6);
        $genres = \App\Genre::get();
        return view('artist.all')
            ->with('artists', $artists)
            ->with('genres', $genres);
    }

    public function busqueda(Request $request)
    {
        $buscado = $request->input('buscado');
        $artists = \App\Artist::where('name', 'like', '%' . $buscado . '%')->paginate(3);
        $genres = \App\Genre::get();
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
        $request->session()->flash('temp-festivals', $request->get('festivals-select') ?? []);
        $this->validate($request, ['name' => 'required|unique:artists']);
        //Sabemos que los datos del nuevo artista están correctos
        $artist = new Artist([
            'name' => $request->get('name'),
            'soundcloud' => $request->get('soundcloud'),
            'website' => $request->get('website'),
            'country' => $request->get('country'),
            'permalink' => str_slug($request->get('name'))
        ]);
        $artist->save();
        //Al nuevo artista le pongo como sus festivales los que recibe de los select
        //OJO: usamos array_unique por si en el formulario hubiese dos select con el mismo festival
        $artist->festivals()->attach(array_unique($request->get('festivals-select') ?? []));
        return redirect()->action('ArtistController@Details', [$artist])->with('created', true);
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
        return view('artist.details-admin', [
            'column_names' => Schema::getColumnListing(strtolower(str_plural('artists'))),
            'permalink' => $permalink,
            'artist' => Artist::where('permalink', $permalink)->first()
        ]);
    }

    public function Edit($permalink)
    {
        $genres = Genre::get(['id', 'name']);
        $artist = Artist::where('permalink', $permalink)->first();
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
            'festivals' => Festival::get(['id', 'name']),
            'genres' => $genres,
        ]);
    }

    public function Update(Request $request, $permalink)
    {
        //TODO Comprobar que el nuevo nombre no exista ya, pero si es el mismo dejar modificar
        $artist = Artist::where('permalink', $permalink)->first();
        $artist->name = $request->get('name');
        $artist->soundcloud = $request->get('soundcloud');
        $artist->website = $request->get('website');
        $artist->country = $request->get('country');
        $artist->permalink = str_slug($request->get('name'));
        $artist->save();
        $artist->festivals()->sync(array_unique($request->get('festivals-select') ?? []));
        $artist->genres()->sync($request->get('genres'));
        return redirect()->action('ArtistController@DetailsAdmin', [$artist])->with('updated', true);
    }

    public function Delete($permalink)
    {
        return view('artist.delete', [
            'permalink' => $permalink,
            'artist' => Artist::where('permalink', $permalink)->first()
        ]);
    }

    public function DeleteConfirm($permalink)
    {
        return redirect()->action('AdminController@ArtistsList')->with('deleted', Artist::where('permalink', $permalink)->delete());
    }
}
