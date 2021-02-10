<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::get();
        
        return view('index', compact('posts'));
    }

    // Storing data
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|max:128',
            'body' => 'required'
        ]);

        $input = $request->all();
        Post::create([
            'title'=>$input['title'],
            'body' =>$input['body']
        ]);

        return back();
    }
}
