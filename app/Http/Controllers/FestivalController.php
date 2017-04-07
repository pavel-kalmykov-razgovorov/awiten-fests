<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Festival;
use App\Genre;
use Carbon\Carbon;
use App\Post;
use Illuminate\Http\Request;
use Schema;


class FestivalController extends Controller implements AdministrableController
{
    private $festivals;
    private $genres;


    public function init()
    {
        $festivals = \App\Festival::paginate(3);
        $genres = \App\Genre::get();
        return view('festival.all')
            ->with('festivals', $festivals)
            ->with('genres', $genres);
    }

    public function busquedaPorGenero(Request $request)
    {
        $generos = array();
        $genres = \App\Genre::get();
        foreach ($genres as $genre) {
            $generoSinEspacios = str_replace(' ','_',$genre->name);
            if ($request->has($generoSinEspacios)){
                array_push($generos, $genre->id);
            }
        }
        $request->session()->flash('generos-marcados-festival', $generos);
        $festivals = \App\Festival::join('festival_genre',"festival_genre.festival_id","=","id")->whereIn('genre_id',$generos)->groupBy("id")->paginate(3);
        $festivals->appends($request->except('page'));
        return view('festival.all')
            ->with('festivals', $festivals)
            ->with('genres', $genres);

    }

    public function busqueda(Request $request)
    {
        $buscado = $request->input('buscado');
        $festivals = \App\Festival::where('name', 'like', '%' . $buscado . '%')->paginate(3);
        $genres = \App\Genre::get();
        $festivals->appends($request->except('page'));
        return view('festival.all')
            ->with('festivals', $festivals)
            ->with('genres', $genres);
    }

    public function busquedaConParametros(Request $request){
         $buscado = $request->input('buscado');
         $porPag = $request->input('paginadoA');
         $orden = $request->input('ordenado');
        $festivals = \App\Festival::where('name', 'like', '%' . $buscado . '%')->orderBy('date', $orden)->paginate($porPag);
        $genres = \App\Genre::get();
        $festivals->appends($request->except('page'));
        return view('festival.all')
            ->with('festivals', $festivals)
            ->with('genres', $genres);
    }


    public function All()
    {
        return view('festival.all', ['festivals' => Festival::get(['permalink', 'name'])]);
    }


    public function FormNew()
    {
        return view('festival.create', [
            'artists' => Artist::get(['id', 'name']),
            'genres' => Genre::get(['id', 'name']),
        ]);
    }


    public function Create(Request $request)
    {
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
        $request->session()->flash('artists', $request->get('artists', []));
        $this->validate($request, [
            'name' => 'required',
            'permalink' => 'required|unique:festivals',
            'date' => 'date_format:d/m/Y'
        ]);
        $festival = new Festival([
            'name' => $request->get('name'),
            'pathLogo' => $request->get('logo'),
            'pathCartel' => $request->get('cartel'),
            'location' => $request->get('location'),
            'province' => $request->get('province'),
            'date' => Carbon::createFromFormat('d/m/Y',
                $request->get('date') ?? Carbon::now()->format('d/m/Y')),
            'permalink' => $request->get('permalink')
        ]);
        $festival->saveOrFail();
        $festival->artists()->sync($request->get('artists'));
        $festival->genres()->sync($genres_id);
        return redirect()->action('FestivalController@DetailsAdmin', [$festival])->with('created', true);
    }

    public function Details($permalink)
    {
        $variableFest = Festival::where('permalink', $permalink)->firstOrFail();
        $artists = $variableFest->artists()->simplePaginate(3);
        $variableFest->setRelation('posts', $variableFest->posts()->paginate(4));
        return view('festival.details', [
            'permalink' => $permalink,
            'festival' => $variableFest,
            'artistas' => $artists
        ]);
    }

    public function DetailsAdmin($permalink)
    {
        $festival = Festival::where('permalink', $permalink)->firstOrFail();
        return view('festival.details-admin', [
            'column_names' => Schema::getColumnListing(strtolower(str_plural('festivals'))),
            'permalink' => $permalink,
            'festival' => $festival
        ]);
    }

    public function Edit($permalink)
    {
        $festival = Festival::where('permalink', $permalink)->firstOrFail();
        $festival->date = Carbon::parse($festival->date)->format('d/m/Y');
        $artists = Artist::get(['id', 'name']);
        $genres = Genre::get(['id', 'name']);
        foreach ($genres as $genre) {
            $genre->checked = '';
            foreach ($festival->genres as $festival_genre) {
                if ($festival_genre->id == $genre->id) {
                    $genre->checked = 'checked';
                    break;
                }
            }
        }
        return view('festival.edit', [
            'permalink' => $permalink,
            'festival' => $festival,
            'artists' => $artists,
            'genres' => $genres
        ]);
    }

    public function DeletePost($idpost)
    {
        \App\Post::find($idpost)->delete();
        return redirect()->action('FestivalController@All');
    }


    public function Update(Request $request, $permalink)
    {
        if ($request->get('permalink', '') != $permalink) {
            $this->validate($request, [
                'name' => 'required',
                'permalink' => 'required|unique:festivals'
            ]);
        }
        $festival = Festival::where('permalink', $permalink)->firstOrFail();
        $festival->name = $request->get('name');
        $festival->pathLogo = $request->get('logo');
        $festival->pathCartel = $request->get('cartel');
        $festival->location = $request->get('location');
        $festival->province = $request->get('province');
        $festival->date = Carbon::createFromFormat('d/m/Y',
            $request->get('date') ?? Carbon::now()->format('d/m/Y'));
        $festival->permalink = $request->get('permalink');
        $festival->saveOrFail();
        $festival->artists()->sync($request->get('artists'));
        $festival->genres()->sync($request->get('genres'));
        return redirect()->action('FestivalController@DetailsAdmin', [$festival])->with('updated', true);
    }

    public function Delete($permalink)
    {
        $festival = Festival::where('permalink', $permalink)->firstOrFail();
        return view('festival.delete', [
            'permalink' => $permalink,
            'festival' => $festival
        ]);
    }

    public function DeleteConfirm($permalink)
    {
        return redirect()->action('AdminController@FestivalsList')
        ->with('deleted', Festival::where('permalink', $permalink)->delete());
    }

    public function MostrarNoticia($idpost)
    {
        return view('festival.mostrarNoticia', [
            'post' => Post::where('id', $idpost)->first(),
        ]);
    }



}
