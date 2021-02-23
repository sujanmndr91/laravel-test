<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Exports\PostsExport;
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
    
}
