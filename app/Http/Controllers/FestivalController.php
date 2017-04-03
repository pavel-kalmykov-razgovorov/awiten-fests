<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class FestivalController extends Controller
{
    private $festivals;
    private $genres;

    public function init()
    {
        // 		$ms = Person::where('name', '=', 'Foo Bar')->first();
        // 		$persons = Person::order_by('list_order', 'ASC')->get();
        // 		return $view->with('data', ['ms' => $ms, 'persons' => $persons]));
        $festivals = \App\Festival::paginate(4);
        $genres = \App\Genre::get();
        //r		eturn view('festivals', ['festivals' => \App\Festival::get(['permalink', 'name', 'pathLogo', 'date','id'])]);
        return view('festival-plantilla.all')
            ->with('festivals', $festivals)
            ->with('genres', $genres);
        // 		return view('festival-plantilla.all', ['festivals' => \App\Festival::get(['permalink', 'name', 'pathLogo', 'date','id'])]);
    }

    public function ordenar()
    {
        $festivals = \App\Festival::orderBy('date', 'asc')->paginate(4);
        $genres = \App\Genre::get();
        return view('festival-plantilla.all')
            ->with('festivals', $festivals)
            ->with('genres', $genres);
    }

    public function cambio()
    {
        $festivals = \App\Festival::paginate(2);
        $genres = \App\Genre::get();
        return view('festival-plantilla.all')
            ->with('festivals', $festivals)
            ->with('genres', $genres);
    }

    public function busquedaPorGenero(Request $request)
    {
        //$festivals = \App\Festival::paginate(2);
        $generos = array();
        //dd($request);
        $genres = \App\Genre::get();
        foreach ($genres as $genre) {
            if ($request->has($genre->genre))
                array_push($generos, $genre->genre);
        }
        //dd($generos);
        $festivals = new \Illuminate\Database\Eloquent\Collection;
        for ($i = 0; $i < count($generos); $i++) {
            $festivals = $festivals->merge(\App\Genre::where('genre', $generos[$i])->first()->festivals);
        }
        /*
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $collection = new Collection($festivals);
        $perPage = 5;
        $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();
        */
        $paginator = new LengthAwarePaginator($festivals, count($festivals), count($festivals));


        return view('festival-plantilla.all')
            ->with('festivals', $paginator)
            ->with('genres', $genres);
        /*

          // $genres = \App\Genre::get(['genre']);
               $genres = \App\Genre::get();
        return view('festival-plantilla.all')
           ->with('festivals',$festivals)
           ->with('genres',$genres);*/
        //  <li><a class="btn btn-default" type="checkbox" autocomplete="off" value="{{$genre->genre}}">{{$genre->genre}}</a></li>

    }

    public function busqueda(Request $request)
    {
        $buscado = $request->input('buscado');
        $festivals = \App\Festival::where('name', 'like', '%' . $buscado . '%')->paginate(2);
        $genres = \App\Genre::get();
        return view('festival-plantilla.all')
            ->with('festivals', $festivals)
            ->with('genres', $genres);

        /*

           \App\Genre::where('genre',"Techno")->first()->festivals;
           \App\Genre::where('genre',"Trance")->first()->festivals;
           $generos = array("Techno","Trance");
           \App\Genre::with('festivals')->whereIn('genre',$generos)->unique()->get();
           */

    }

    public function All()
    {

    }

    public function New()
    {

    }

    public function Create(Request $request)
    {

    }

    public function Details($permalink)
    {

    }

    public function Edit($permalink)
    {

    }

    public function Update(Request $request, $permalink)
    {

    }

    public function Delete($permalink)
    {

    }

    public function DeleteConfirm($permalink)
    {

    }
}
