<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller implements AdministrableController
{

    public function FormNew()
    {
        return "Not yet implemented";
    }

    public function Create(Request $request)
    {
        return "Not yet implemented";
    }

    public function DetailsAdmin($permalink)
    {
        return "Not yet implemented";
    }

    public function Edit($permalink)
    {
        return "Not yet implemented";
    }

    public function Update(Request $request, $permalink)
    {
        return "Not yet implemented";
    }

    public function DeleteConfirm($permalink)
    {
        return redirect()->action('AdminController@PostsList')
            ->with('deleted', Post::where('permalink', $permalink)->delete());
    }
}