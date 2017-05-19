<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Festival;
use App\Genre;
use App\Post;
use Carbon\Carbon;
use App\User;
use Schema;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Notifications\ConfirmacionAsistenciaEvento;
use Illuminate\Support\Facades\Auth;

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
            $generoSinEspacios = str_replace(' ', '_', $genre->name);
            if ($request->has($generoSinEspacios)) {
                array_push($generos, $genre->id);
            }
        }
        $request->session()->flash('generos-marcados-festival', $generos);
        $festivals = \App\Festival::join('festival_genre', "festival_genre.festival_id", "=", "id")->whereIn('genre_id', $generos)->groupBy("id")->paginate(3);
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

    public function busquedaConParametros(Request $request)
    {
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
        $request->session()->flash('artists', $request->get('artists', []));
        $this->validate($request, [
            'name' => 'required',
            'permalink' => 'required|unique:festivals',
            'date' => 'date_format:d/m/Y'
        ]);


        $artists_id = $request->get('artists', []);
        foreach ($artists_id as $artist_id) {
            $datosArtistas = Artist::findOrFail($artist_id);
            foreach ($datosArtistas->festivals as $festival) {
                if ($festival->date->toDateString() == Carbon::createFromFormat('d/m/Y', $request->get('date') ?? Carbon::now()->format('d/m/Y'))->toDateString()) {
                    $rules['unreal_input'] = 'required'; // a confusing error in your errors list...
                    $messages['unreal_input.required'] = 'El artista ' . $datosArtistas->name . ' actua ese dia en ' . $festival->name . '.';
                    $validator = Validator::make($request->all(), $rules, $messages);
                    if ($validator->fails()) return redirect()->back()->withErrors($validator)->withInput();

                }
            }
        }

        $artists_id = $request->get('artists', []);
        foreach ($artists_id as $artist_id) {
            $datosArtistas = Artist::findOrFail($artist_id);
            //Obtener manager del artista
            $admin = User::find(1);
            
            
            $content = [ 'urlok' => 'http://localhost:8000/admin/artists/confirm/' . $datosArtistas->permalink . '_' . $request->get('name') . '_true/', 
            'urlnoOk' => 'http://localhost:8000/admin/artists/confirm/' . $datosArtistas->permalink . '_' . $request->get('name') . '_false/',
            'urlShow' => 'http://localhost:8000/admin/artists/details/' . $datosArtistas->permalink,
            'nameArtist' => $datosArtistas->name, 'fecha' => Carbon::createFromFormat('d/m/Y',$request->get('date') ?? Carbon::now()->format('d/m/Y'))->toDateString(), 'nameFestival' => $request->get('name')];
            $admin->notify(new ConfirmacionAsistenciaEvento($content));
        }
            
        $festival = new Festival([
            'name' => $request->get('name'),
            'pathLogo' => $request->get('logo'),
            'pathCartel' => $request->get('cartel'),
            'location' => $request->get('location'),
            'province' => $request->get('province'),
            'date' => Carbon::createFromFormat('d/m/Y',
                $request->get('date') ?? Carbon::now()->format('d/m/Y')),
            'permalink' => $request->get('permalink'),
            'promoter_id' => Auth::user()->id
        ]);
        $user = Auth::user();
        $festival->user()->associate($user);
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
        $artists_ids = Festival::where('permalink', $permalink)
            ->firstOrFail()
            ->artists()
            ->get(['id'])
            ->map(function ($item, $key) {
                return $item->id;
            });
        return view('festival.edit', [
            'permalink' => $permalink,
            'festival' => $festival,
            'artists' => $artists,
            'genres' => $genres,
            'artists_ids' => $artists_ids
        ]);
    }

    public function DeletePost($idpost)
    {
        Post::find($idpost)->delete();
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
        $festival->date = Carbon::createFromFormat('Y-m-d H:i:s',
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

    public function getFestivalImage($permalink, $filename)
    {
        $file = Storage::disk('local')->get("festivals/$permalink/$filename");
        return new Response($file, 200);
    }
}
