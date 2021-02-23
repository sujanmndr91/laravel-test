<?php

namespace App\Exports;

use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PostsExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Post::all();
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
