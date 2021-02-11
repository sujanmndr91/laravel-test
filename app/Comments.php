<?php

namespace App;
use App\Post;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    //
    protected $fillable = [
        'comment',
        'post_id'
    ];

    public function posts(){
        return $this->belongsTo(Post::class);
    }
}
