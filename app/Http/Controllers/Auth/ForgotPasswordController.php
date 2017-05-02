<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('guest');
    }

     public function toMail()
    {
        return (new MailMessage)
            ->line('Recibes este correo porque recibimos una solicitud de reestablecimiento de contraseña para su cuenta')
            ->action('Reestablecer Contraseña', url('password/reset', $this->token)) // <- this url
            ->line('Si no solicitó reestablecer la contraseña, no responda a este mensaje.');
    }
}
