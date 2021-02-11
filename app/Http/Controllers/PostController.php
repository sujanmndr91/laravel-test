<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function index(){
        // with can be used to define and get more value of the relationship
        $posts = Post::with('user')->get();
        
        return view('index', compact('posts'));
    }

    // Storing data
    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|max:128',
            'body' => 'required',
            
        ]);
        if (Auth::check()) {
            $input = $request->all();
            Post::create([
            'title'=>$input['title'],
            'body' =>$input['body'],
            'user_id' => auth()->id(),
        ]);
        }
        else{
            return redirect('/login');
        }
        return redirect('/userposts');
    }

    // Posts creating page redirect 
    public function create(){
        return view('posts.create');
    }

    // Delete data
    public function destroy(Post $post){
        $post->delete();
        return redirect('/userposts');
    }

    // Show data for editing
    public function edit($id) {
        $posts = Post::find($id);
        return view('posts.edit', compact('posts'));
    }

     // Update the data
     public function update(Request $request, $id){

        $this->validate($request, [
            'title' => 'required|max:128',
            'body' => 'required'
        ]);


        $input = $request->all();
        Post::where('id', $id)->update([
            'title' => $input['title'],
            'body' => $input['body']
        ]);
     
        return redirect('/userposts');

    }

    public function show(Post $post){
        return view('posts.main', ['posts'=> $post]);
    }
}
