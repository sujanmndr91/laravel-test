<?php

namespace App\Exports;

use App\Comments;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;




class CommentsExport implements FromCollection,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
   	function __construct($request) {
        
        $this->request = $request;
 	}

    // public function collection()
    // {
    // 	// $userId = Auth::id();
    //  //    return Comments::where('user_id', $userId)->get();
    // 	return Comments::where('post_id', $this->id)->get();
    // }

    // public function collection(){

    // 	if(is_null($this->request->post_id)){
    // 		return Comments::where('user_id', $this->request->user_id)->get();
    // 	}
    // 	else if(is_null($this->request->user_id)){
    // 		return Comments::where('post_id', $this->request->post_id)->get();
    // 	}
    // 	else{
    // 		return Comments::where('post_id', $this->request->post_id)->where('user_id', $this->request->user_id)->get();
    // 	}

    // }

    public function collection(){

    	if(is_null($this->request->post_id)){
    		return Comments::where('user_id', $this->request->user_id)->get();
    	}
    	else if(is_null($this->request->user_id)){
    		return Comments::where('post_id', $this->request->post_id)->get();
    	}
    	else{
    		return Comments::where('post_id', $this->request->post_id)->where('user_id', $this->request->user_id)->get();
    	}
	}

	// use Exportable;

	// public function query()
	//     {
	//         return Comments::query()->where('id', $this->id);
	//     }

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
