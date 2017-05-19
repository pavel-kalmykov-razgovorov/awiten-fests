<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;
use Schema;
use App\Notifications\UserConfirmed;

class UserController extends Controller implements AdministrableController
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
            'confirmed' => true,
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

    public function Lock($username)
    {
        $user = User::where('username', $username)->first();
        if(!is_null($user)){
            if($user->isAdmin()){
                return redirect('/noPermision');
            } else {
                if($user->locked == false){
                    $user->locked = true; 
                    $user->save();
                    return redirect()->action('AdminController@UsersList')
                            ->with('locked', 'Usuario correctamente bloqueado');
                } else{
                    $user->locked = false; 
                    $user->save();
                    return redirect()->action('AdminController@UsersList')
                            ->with('unlocked', 'Usuario correctamente desbloqueado');
                }
            }
        }
        return redirect()->action('AdminController@UsersList')
                ->with('locked', 'Error al bloquear el usuario');
    }

    public function Edit()
    {
        $user = Auth::user();
         return view('users.edit', ['user' => $user,]);
    }
  
    public function Update(Request $request)
    {
        $originalUser = Auth::user();
        $this->validate($request, ['name' => 'required|max:255',]);
        if($request->get('username', '') != $originalUser->username){
             $this->validate($request, ['username' => 'required|max:20|unique:users']);
        }
        if($request->get('email', '')  != $originalUser->email){
             $this->validate($request, ['email' => 'required|email|max:255|unique:users']);
        }
        $user = User::where('username', $originalUser->username)->first(); 
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->saveOrFail();
        return redirect()->action('UserController@Edit')
                ->with('Update', 'Usuario correctamente actualizado');
    }

    public function Delete($username)
    {
        $user = User::where('username', $username)->first();
        if(!is_null($user)){
            if($user->isPromoter()){
                $user->delete();    //Borrar sus festivales
            }else if($user->isManager()){
                $user->delete();    //Borrar sus artistas
            }else if($user->isAdmin()){
                return redirect('/noPermision');
            }
        }
        return redirect()->action('AdminController@UsersList')
            ->with('deleted', 'usuario');
    }
}
