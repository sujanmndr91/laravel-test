<?php

namespace App\Exports;

use App\Comments;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;


class CommentsExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
   function __construct($id) {
        $this->id = $id;
 }

    public function collection()
    {
    	// $userId = Auth::id();
     //    return Comments::where('user_id', $userId)->get();
    	return Comments::where('post_id', $this->id)->get();
    }

     public function headings(): array
    {
        return [
            'id',
            'comment',
            'post_id',
            'created_at',
            'updated_at',
            'user_id'
        ];
    }
}
