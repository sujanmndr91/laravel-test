<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //Return register page
    public function index(){
        return view('auth.register');
    }

    // Store the registered information
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:128',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        auth()->attempt($request->only('email', 'password'));

        return redirect('/userposts');
    }

    

}
