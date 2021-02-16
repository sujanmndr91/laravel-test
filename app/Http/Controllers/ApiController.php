<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //Get all posts
    public function index(){
        $post = Post::get()->toJson(JSON_PRETTY_PRINT);

        return response($post, 200);
    }

    // Create a post
    public function create(Request $request){
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user_id;
        $post->save();

        return response()->json([
            "message" => "Post Created"
        ], 201);
    }

    // Show a certain post
    public function show($id){
        if(Post::where('id', $id)->exists()){
            $post = Post::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($post, 200);
        }else{
            return response()->json([
                "message" => "Post does not exist"
            ], 404);
        }
    }

    // Update a certain post
    public function update(Request $request, $id){
        if(Post::where('id', $id)->exists()){
            $post = Post::find($id);
            $post->title = $request->title;
            $post->body = $request->body;
            $post->save();

            return response()->json([
                "message" => "Post Updated"
            ]);
        }else{
            return response()->json([
                "message" => "Post does not exist"
            ]);
        }
    }

    // Delete a certain post
    public function delete($id){
        if(Post::where('id', $id)->exists()){
            $post = Post::find($id);
            $post->delete();

            return response()->json([
                "message" => "Post Deleted"
            ], 202);
        }else{
            return response()->json([
                "message" => "Post does not exist"
            ], 404);
        }
    }
}
