<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable =['message','post_id'];


    public function BlogPost()
    {
        return $this->belongsTo(BlogPost::class,'post_id','id');
    }
}
