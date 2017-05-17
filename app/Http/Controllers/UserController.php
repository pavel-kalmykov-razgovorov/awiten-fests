<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Schema;
use App\Notifications\UserConfirmed;

class UserController extends Controller
{
    public function FormNew()
    {
        return view('users.create');
    }

    public function crearUsuario(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'username' => $data['username'],
            'confirmed' => 1,
            'typeOfUser' =>  $data['tipo'],
        ]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:20|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function Create(Request $request)
    {
        $this->validator($request->all())->validate();
        $info = $request->all();
        if($request->has('tipo-usuario')){
          $info['tipo'] = 'manager';
        } else{
          $info['tipo'] = 'promoter';
        }
        $data = $this->crearUsuario($info)->toArray(); 
        $user = User::find($data['id']);
      //  $user->notify(new UserConfirmed());
        $nombre = $user->name;
        //return redirect('/admin/users/add')->with('crearUsuario-status', 'Registrado Usuario Correctamente'); 
        return redirect()->action('UserController@DetailsAdmin', [$nombre])->with('created', true);     
    }

    public function DetailsAdmin($username)
    {
        return view('users.details-admin', [
            'column_names' =>  ['id','name','username', 'email','typeOfUser','confirmed','created_at','updated_at'],
            //Schema::getColumnListing(strtolower(str_plural('users'))),
            'name' => $username,
            'user' => User::where('username', $username)->first()
        ]);
    }

    public function Edit($username)
    {
        return "Editar sin terminar";
    }

    public function Update(Request $request, $permalink)
    {
        return "Actualizar sin terminar";
    }

    public function DeleteConfirm($username)
    {
        return "Borrado sin terminar";
    }
}
