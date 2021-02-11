<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        if(!Auth::check()){
            return redirect('/login');

        }
    }

    public function show(){
        $posts = Post::get(); // Get all posts and assign to $posts

        $posts = auth()->user()->posts;

        return view('posts.show', compact('posts'));   
    }
}
