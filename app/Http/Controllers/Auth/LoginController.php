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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function showLoginForm()
    {
        return view('auth.login');
    }
/*
    public function showLoginForm()
    {
        return view('auth.login');
    }
*/
    public function login(Request $request){
        //Validate the form data
        $this->validate($request, [
          'username' => 'required|min:1',
          'password' => 'required|min:4'
        ]);

        // Attempt to log the user in
        if(Auth::attempt(['username' => $request->username, 'password' => $request->password],$request->remember)){
          // $this->middleware('guest', ['except' => 'logout']);
             $this->middleware('auth');
           // dd(Auth::guest());
            return redirect()->intended();
        }else if(Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password],$request->remember)){
             // If successful, then redirect to their intended location
             $this->middleware('auth:admin');
             $request->session()->put('esAdmin',true);
              return redirect()->intended();
          //  \App::make('App\Http\Controllers\Auth\AdminLoginController')->login($request);
        }

        // If unsuccesful, then redirect back to tje login with the form data
        return redirect()->back()->withInput($request->only('username','remember'));
    }

    public function username(){
        return 'username';
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }

    public function guard()
    {
        return Auth::guard();
    }



}
