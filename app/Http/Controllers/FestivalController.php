<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Festival;
use Carbon\Carbon;
use App\Post;
use Illuminate\Http\Request;


class FestivalController extends Controller
{
    private $festivals;
    private $genres;


    public function init()
    {
        $festivals = \App\Festival::paginate(3);
        $genres = \App\Genre::get();
        return view('festival-plantilla.all')
            ->with('festivals', $festivals)
            ->with('genres', $genres);
    }

    public function busquedaPorGenero(Request $request)
    {
        $generos = array();
        $genres = \App\Genre::get();
        $url = null;
        foreach ($genres as $genre) {
            $generoSinEspacios = str_replace(' ','_',$genre->genre);
            if ($request->has($generoSinEspacios)){
                array_push($generos, $genre->id);
            }
        }
        $request->session()->flash('generos-marcados', $generos);
        $festivals = \App\Festival::join('festival_genre',"festival_genre.festival_id","=","id")->whereIn('genre_id',$generos)->groupBy("id")->paginate(4);
        $festivals->appends($request->except('page'));
        return view('festival-plantilla.all')
            ->with('festivals', $festivals)
            ->with('genres', $genres);
            
    }

    public function busqueda(Request $request)
    {
        $buscado = $request->input('buscado');
        $festivals = \App\Festival::where('name', 'like', '%' . $buscado . '%')->paginate(3);
        $genres = \App\Genre::get();
        $festivals->appends($request->except('page'));
        return view('festival-plantilla.all')
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
        return view('festival-plantilla.all')
            ->with('festivals', $festivals)
            ->with('genres', $genres);
    }


    public function All()
    {
        return view('festival.all', ['festivals' => Festival::get(['permalink', 'name'])]);
    }


    public function FormNew()
    {
        return view('festival.create', ['artists' => Artist::get(['id', 'name'])]);
    }


    public function Create(Request $request)
    {
        $request->session()->flash('temp-artists', $request->get('artists-select') ?? []);
        $this->validate($request, ['name' => 'required|unique:festivals']);
        $festival = new Festival([
            'name' => $request->get('name'),
            'pathLogo' => $request->get('logo'),
            'pathCartel' => $request->get('cartel'),
            'location' => $request->get('location'),
            'province' => $request->get('province'),
            'date' => Carbon::createFromFormat('d/m/Y', $request->get('date')
                ?? Carbon::now()->format('d/m/Y')),
            'permalink' => str_slug($request->get('name'))
        ]);
        $festival->save();
        $festival->artists()->attach(array_unique($request->get('artists-select') ?? []));
        return redirect()->action('FestivalController@Details', [$festival])->with('created', true);
    }


    public function Details($permalink)
    {
        $variableFest = Festival::where('permalink', $permalink)->firstOrFail();
        $variableFest->setRelation('posts', $variableFest->posts()->paginate(2));
        return view('festival.details', [
            'permalink' => $permalink,
            'festival' => $variableFest 
        ]);
    }


    

    public function Edit($permalink)
    {
        $festival = Festival::where('permalink', $permalink)->firstOrFail();
        $artists = Artist::get(['id', 'name']);

        return view('festival.edit', [
            'permalink' => $permalink,
            'festival' => $festival,
            'artists' => $artists
        ]);
    }

    public function DeletePost($idpost)
    {
        \App\Post::find($idpost)->delete();
        return redirect()->action('FestivalController@All');
    }


    public function Update(Request $request, $permalink)
    {
        //TODO Comprobar que el nuevo nombre no exista ya, pero si es el mismo dejar modificar
        $festival = Festival::where('permalink', $permalink)->firstOrFail();
        $festival->name = $request->get('name');
        $festival->pathLogo = $request->get('logo');
        $festival->pathCartel = $request->get('cartel');
        $festival->location = $request->get('location');
        $festival->province = $request->get('province');
        $festival->date = Carbon::createFromFormat(
            'd/m/Y', $request->get('date')
            ?? Carbon::now()->format('d/m/Y'));
        $festival->permalink = str_slug($request->get('name'));
        $festival->save();
        $festival->artists()->sync(array_unique($request->get('artists-select') ?? []));
        return redirect()->action('FestivalController@Details', [$festival])->with('updated', true);
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
        Festival::where('permalink', $permalink)->delete();
        return redirect()->action('FestivalController@All')->with('deleted', true);
    }

    public function MostrarNoticia($idpost)
    {
        return view('festival.mostrarNoticia', [
            'post' => Post::where('id', $idpost)->first(),
            

        ]);
    }

    

}
