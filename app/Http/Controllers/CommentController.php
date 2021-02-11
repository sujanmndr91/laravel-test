<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    // public function index(){
    //     $comments = Comments::get();
    //     return view('posts.main', compact('comments'));
    // }

    public function store(Request $request){
        $this->validate($request, [
            'comment' => 'required|max:255'
        ]);

        $input = $request->all();
        Comments::create([
            'comment' => $input['comment'],
            'post_id' => '6'
        ]);

        return back();
    }
}
