<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BlogPost extends Model
{


   protected $fillable =['title','body','image','category_id'];

    protected $table = 'blog_posts';
    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
}

