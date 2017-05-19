<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{


   use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/entities';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
            $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

     public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            $mensaje = 'Tu usuario todavía no está activo';
            if(Auth::user()->confirmed == true){
                if(Auth::user()->locked == false){
                    return $this->sendLoginResponse($request);
                } else {
                    $mensaje = 'Tu usuario está bloqueado';
                }
            }
            $this->guard()->logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('/login')->with('status',$mensaje);
        }

        $this->incrementLoginAttempts($request);
        return $this->sendFailedLoginResponse($request);
    }

    public function username(){
        return 'username';
    }
}
