<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'username'   => 'required|min:1',
        'password' => 'required|min:4'
      ]);

      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
       // dd($this,Auth::guard('admin')->guest());

      }

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('username', 'remember'));
    }
}
