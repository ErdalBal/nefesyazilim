<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable=['name','email','message','blog_id','status'];

    public function blog()
    {
        return $this->hasOne(Post::class,'id','blog_id');
    }
}
