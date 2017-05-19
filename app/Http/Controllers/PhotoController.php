<?php

namespace App\Http\Controllers;

use App\Photo;
use Auth;
use Illuminate\Http\Request;

class PhotoController extends Controller implements AdministrableController
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
        //Comprobar que el usuario identificado tiene acceso al festival indicado
        $user = Auth::user();
        $photo =  Photo::join('festivals', "festivals.id", "=", "festival_id")->where('photos.permalink', $permalink)->where('festivals.promoter_id',$user->id)->first();
        if($photo == null){
            return redirect('/noPermision');
        }
        return redirect()->action('AdminController@PhotosList')
            ->with('deleted', $photo->delete());

    }
}
