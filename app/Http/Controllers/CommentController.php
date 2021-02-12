<?php

namespace App\Http\Controllers;

use App\Comments;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    // public function index(){
    //     $comments = Comments::get();
    //     return view('posts.main', compact('comments'));
    // }

    public function store(Request $request, $id){
        $this->validate($request, [
            'comment' => 'required|max:255'
        ]);
        // return$id;
        $input = $request->all();
        Comments::create([
            'comment' => $input['comment'],
            'post_id' => $id
        ]);

        

        return back();
    }
}
