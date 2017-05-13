<?php

namespace App\Http\Controllers;




use Illuminate\Http\Request;
use App\Http\Requests;
use App\Post;
use Mail;
use Session;


class PagesController extends Controller
{
    public function getContact() {
		return view('pages.contacto');
	}

    
	public function postContact(Request $request) {
		$this->validate($request, [
			'email' => 'required|email',
			'subject' => 'min:3',
			'message' => 'min:10']);

		$data = array(
			'email' => $request->email,
			'subject' => $request->subject,
			'bodyMessage' => $request->message
			);

		Mail::send('emails.contacto', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to('awitenfest@gmail.com');
			$message->subject($data['subject']);
		});

		Session::flash('success', 'Your Email was Sent!');

		return redirect('/');
	}
    
}
