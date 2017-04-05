<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Festival;
use App\Genre;
use App\Photo;
use App\Post;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    public function AvailableEntities()
    {
        return view('admin.master');
    }

    public function ArtistsList()
    {
        return $this->tableViewByModelName(Artist::paginate(15), 'Artist', 'Artista', 'Artistas');
    }

    /**
     * Devuelve la vista de la tabla dado un nombre de modelo
     * Con esto conseguimos visualizar cualquier modelo en forma de tabla con una sola vista blade
     * @param mixed $model
     * @param string $modelName
     * @param string $spanishModelName
     * @param string $pluralSpanishModelName
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param string $modelName el nombre del modelo
     */
    private function tableViewByModelName($model, string $modelName, string $spanishModelName, string $pluralSpanishModelName)
    {
        $column_names = Schema::getColumnListing(strtolower(str_plural($modelName)));
        return view('admin.table', [
            'modelName' => $modelName,
            'spanishModelName' => $spanishModelName,
            'pluralSpanishModelName' => $pluralSpanishModelName,
            'models' => $model,
            'column_names' => $column_names
        ]);
    }

    public function FestivalsList()
    {
        return $this->tableViewByModelName(Festival::paginate(15), 'Festival', 'Festival', 'Festivales');
    }

    public function GenresList()
    {
        return $this->tableViewByModelName(Genre::paginate(15), 'Genre', 'Género', 'Géneros');
    }

    public function PostsList()
    {
        return $this->tableViewByModelName(Post::paginate(15), 'Post', 'Noticia de festival', 'Noticias de festival');
    }

    public function PhotosList()
    {
        return $this->tableViewByModelName(Photo::paginate(15), 'Photo', 'Foto de festival', 'Fotos de festival');
    }
}
