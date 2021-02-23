<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\PostsExport;
use App\Exports\CommentsExport;
use Maatwebsite\Excel\Facades\Excel;


class ExportController extends Controller
{
    public function exportUser() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportPost() 
    {
        return Excel::download(new PostsExport, 'posts.xlsx');
    }

    public function exportComment()
    {
    	return Excel::download(new CommentsExport, 'comments.xlsx');
    }

    public function exportPostComment(Request $request){
    	return Excel::download(new CommentsExport($request->id), 'comments.xlsx');
    }
    
}
