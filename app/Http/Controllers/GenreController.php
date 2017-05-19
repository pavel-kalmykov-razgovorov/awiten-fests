<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Festival;
use App\Genre;
use Illuminate\Http\Request;
use Schema;

class GenreController extends Controller implements AdministrableController
{

    public function FormNew()
    {
        return view('genre.create', [
            'artists' => Artist::get(['id', 'name']),
            'festivals' => Festival::get(['id', 'name']),
        ]);
    }

    public function Create(Request $request)
    {
        $request->session()->flash('artists', $request->get('artists', []));
        $request->session()->flash('festivals', $request->get('festivals', []));
        $this->validate($request, [
            'name' => 'required',
            'permalink' => 'required|unique:genres'
        ]);
        $genre = new Genre([
            'name' => $request->get('name'),
            'permalink' => str_slug($request->get('permalink')),
        ]);
        $genre->saveOrFail();
        $genre->artists()->sync($request->get('artists'));
        $genre->festivals()->sync($request->get('festivals'));
        return redirect()->action('GenreController@DetailsAdmin', [$genre])->with('created', true);
    }

    public function DetailsAdmin($permalink)
    {
        return view('genre.details-admin', [
            'column_names' => Schema::getColumnListing(strtolower(str_plural('genres'))),
            'permalink' => $permalink,
            'genre' => Genre::where('permalink', $permalink)->first()
        ]);
    }

    public function Edit($permalink)
    {
        $genre = Genre::where('permalink', $permalink)->first();
        $festivals = Festival::get(['id', 'name']);
        $artists = Artist::get(['id', 'name']);
        return view('genre.edit', [
            'permalink' => $permalink,
            'genre' => $genre,
            'festivals' => $festivals,
            'artists' => $artists
        ]);
    }

    public function Update(Request $request, $permalink)
    {
        if ($request->get('permalink', '') != $permalink) {
            $this->validate($request, [
                'name' => 'required',
                'permalink' => 'required|unique:genres',
            ]);
        }
        $genre = Genre::where('permalink', $permalink)->firstOrFail();
        $genre->name = $request->get('name');
        $genre->permalink = $request->get('permalink');
        $genre->save();
        return redirect()->action('GenreController@DetailsAdmin', [$genre])->with('updated', true);
    }

    public function Delete($permalink)
    {
        return redirect()->action('AdminController@GenresList')
            ->with('deleted', Genre::where('permalink', $permalink)->delete());
    }
}
