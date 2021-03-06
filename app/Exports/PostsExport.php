<?php

namespace App\Exports;

use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;


class PostsExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Post::where('user_id', Auth::id())->get();
    }

     public function headings(): array
    {
        return [
            'id',
            'title',
            'user_id',
            'body',
            'created_at',
            'updated_at'
        ];
    }
}
