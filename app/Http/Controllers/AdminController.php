<?php

namespace App\Http\Controllers;

use App\User;
use App\Artist;
use App\Festival;
use App\Genre;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AdminController extends Controller
{
    public function AvailableEntities()
    {
        return view('admin.master');
    }

    public function ArtistsList()
    {
       // $column_names = ['name','permalink', 'soundcloud','website','country'];
        //return $this->tableViewByModelName(Artist::select($column_names)->paginate(15), 'Artist', 'Artista', 'Artistas',$column_names);
        return $this->tableViewByModelName(Artist::paginate(15), 'Artist', 'Artista', 'Artistas');
    }

    public function UsersList(Request $request)
    {
        $request->session()->flash('sonUsuarios', true);
       // $column_names = ['name','username', 'email','typeOfUser','confirmed','created_at','updated_at'];
        return $this->tableViewByModelName(User::where('typeOfUser','!=','admin')->paginate(15), 'User', 'Usuarios', 'Usuarios');
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
   // private function tableViewByModelName($model, string $modelName, string $spanishModelName, string $pluralSpanishModelName, $column_names)
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
       // $column_names = ['name','permalink','pathLogo','location','date','province'];
        return $this->tableViewByModelName(Festival::paginate(15), 'Festival', 'Festival', 'Festivales');
    }

    public function GenresList(Request $request)
    {
        $request->session()->flash('sonUsuarios', false);
        //$column_names = ['name','permalink''];
        return $this->tableViewByModelName(Genre::paginate(15), 'Genre', 'Género', 'Géneros');
    }

    public function PostsList()
    {
        // $column_names = ['title','permalink','lead','body','festival_id'];
        return $this->tableViewByModelName(Post::paginate(15), 'Post', 'Noticia de festival', 'Noticias de festival');
    }

    public function PhotosList()
    {
        // $column_names = ['name','permalink','path','festival_id'];
        return $this->tableViewByModelName(Photo::paginate(15), 'Photo', 'Foto de festival', 'Fotos de festival');
    }
}
