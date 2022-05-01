<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['id','comment','post_id','user_id'];
    function user(){
       return $this->belongsTo(User::class);
    }
    function post(){
        return $this->belongsTo(Post::class);
    }
}
