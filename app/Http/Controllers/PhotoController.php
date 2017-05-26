<?php

namespace App\Http\Controllers;

use App\Festival;
use App\Photo;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller implements AdministrableController
{
    public function FormNew()
    {
        $festivals = Auth::user()->festivals;
        return view('photo.create', [
            'festivals' => $festivals,
        ]);
    }

    public function Create(Request $request)
    {
        $this->validate($request, [
            'festival' => 'exists:festivals,id'
        ]);
        if ($request->hasFile('input-image')) {
            $uploadedFile = $request->file('input-image')[0];
            $festival = Festival::findOrFail($request->festival);
            $festivalFolder = "festivals/$festival->permalink";
            $fileName = $uploadedFile->getClientOriginalName();
            if (!Storage::exists("$festivalFolder/$fileName")) {
                $uploadedFile->storeAs($festivalFolder, $fileName);
                $photo = new Photo([
                    'name' => $fileName,
                    'permalink' => str_slug($fileName),
                    'festival_id' => $request->festival
                ]);
                $photo->save();
                return json_encode(true);
            } else {
                return "Ya existe una imagen con ese nombre";
            }
        } else {
            return "No se ha podido enviar la imagen";
        }
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

    public function Delete($permalink)
    {
        //Comprobar que el usuario identificado tiene acceso al festival indicado
        $festivals = Auth::user()->festivals()->get();
        $festivals_id = array();
        foreach($festivals as $fest){
           array_push($festivals_id, $fest->id);
        }
        $photo =  Photo::where('permalink', $permalink)->whereIn('festival_id',$festivals_id)->first();
        if($photo == null){
            return redirect('/noPermision');
        }
        $festival = Festival::where('id',$photo->festival_id)->first();
        Storage::delete("festivals/$festival->permalink/$photo->name");
        return redirect()->action('AdminController@PhotosList')
            ->with('deleted', $photo->delete());

    }
}
