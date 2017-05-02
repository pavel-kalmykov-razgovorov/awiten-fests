<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Mail;
use App\Mail\NewUserWelcome;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:20|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'username' => $data['username'],
            'token' => str_random(25),
        ]);
    }

    protected function register(Request $request){
        //$this->validator($request->all())->validate();

        $data = $this->create($request->all())->toArray();
        $data['token'] = str_random(25);

        $user = User::find($data['id']);
        $user->token = $data['token'];

/*
        Mail::send('mails.confirmation', $data, function($message) use ($data){
            $message->to($data['email']);
            $message->subject('Registration Confirmation');
        });
*/
        $url = 'http://localhost:8000/confirmation/' . $data['token'];
        $content = [ 'url' => $url, 'button' => 'Aqui'];
        Mail::to($data['email'])->send(new NewUserWelcome($content));

        $user->save();
        return redirect('/registradoOk');
        /*
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
        */
    }

    public function confirmation($token){
        $user = User::where('token', $token)->first();

        if(!is_null($user)){
            $user->confirmed = 1;
            $user->token = '';
            $user->save();
            return redirect('login')->with('status', 'Tu activación está completada');
        }
        return redirect('/login')->with('status','Algo ha ido mal');
    }
}
