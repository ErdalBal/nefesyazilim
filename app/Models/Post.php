<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded=[];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function blog_category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'blog_id'); // 'post_id' ile bağlandığını varsayıyoruz
    }
   
}
