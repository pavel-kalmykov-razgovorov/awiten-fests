<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Festival;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;


class FestivalController extends Controller
{
    private $festivals;
    private $genres;

    public function init()
    {
        // 		$ms = Person::where('name', '=', 'Foo Bar')->firstOrFail();
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
        $generos = array("Future");
        //dd($request);
        $genres = \App\Genre::get();
        foreach ($genres as $genre) {
            if ($request->has($genre->genre))
                array_push($generos, $genre->genre);
        }
        //dd($generos);
        $festivals = new \Illuminate\Database\Eloquent\Collection;
        for ($i = 0; $i < count($generos); $i++) {
            $festivals = $festivals->merge(\App\Genre::where('genre', $generos[$i])->firstOrFail()->festivals);
        }
        \App\Festival::join('festival_genre','festival_genre.festival_id',"=",'festival.id')->where('genre_id','=',2)->get();
        /*
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $collection = new Collection($festivals);
        $perPage = 5;
        $currentPageSearchResults = $collection->slice($currentPage * $perPage, $perPage)->all();
        */
        $paginator = new LengthAwarePaginator($festivals, count($festivals),2);
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

           \App\Genre::where('genre',"Techno")->firstOrFail()->festivals;
           \App\Genre::where('genre',"Trance")->firstOrFail()->festivals;
           $generos = array("Techno","Trance");
           \App\Genre::with('festivals')->whereIn('genre',$generos)->unique()->get();
           */

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
        return view('festival.details', [
            'permalink' => $permalink,
            'festival' => Festival::where('permalink', $permalink)->firstOrFail()
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

}
