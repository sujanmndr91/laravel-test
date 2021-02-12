<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class LoginController extends Controller
{
   
    //
    public function index(Request $request){
        return view('auth.login');
    }



    // Login Validation
    public function store(Request $request){
       return $redirect = $request->redirect ?? 'Chaina';
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Invalid login details');
        }

        return redirect('/userposts');
    }
   
}
