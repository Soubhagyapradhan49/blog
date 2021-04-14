<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request,)
    {
        
       $post= Comment::create([
        'message'=> $request->message,
       ]);
       return redirect()->back();
    }
   

}
