<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CommentNotify;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;

use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;

use Illuminate\Support\Facades\DB;


class BlogPostController extends Controller
{
  

  public function storeComment(Request $request, $blog_post_id)
  {
      $post = Comment::create([
          'post_id' => $blog_post_id,
          'user_name' => auth()->user()->name,
          'message' => $request->message,
      ]);

      $user = User::where('id',$request->user_id)->first();

      $data =  BlogPost::find($request->id);  
      $name = auth()->user()->name;
      $title = $data->title;
         $details = [
            
          'greeting' => $name,
          'hello'=>'hello',
          'text'=>'you commented on',

          'body' => $title,

          'thanks' => 'Thank you for comments!',
      ];

      Notification::send($user, new CommentNotify($details));
     return redirect()->back();

  }





  public function showComment($blog_post_id)
  {
      $comments = Comment::where('post_id', $blog_post_id)->get();
      return print_r($comments);
  }




   

    public function index()
    {
        $categories = Category::get();

        $blog_posts = BlogPost::with('category')->get();
        return view('index', compact('blog_posts'), compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $post = BlogPost::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $imageName,
            'category_id' => $request->category_id,
            'user_id' => auth()->user()->id,


        ]);

        return redirect()->route('posts.index');
    }


    public function show($id)
    {

        $post = BlogPost::where('id', $id)->first();
        $comments = Comment::where('post_id', $id)->get();

        return view('show', ['post' => $post, 'comments' => $comments]);
    }
    public function edit($id)
    {
        $post = BlogPost::where('id', $id)->first();
        return view('edit')->with('post', $post);
    }

    public function update(Request $request, $id)
    {
        BlogPost::table('blog_posts')->where('id', $request->id)->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        return view('show', compact('blog_posts'));
    }


    public function destroy($id)
    {

        BlogPost::where('id', $id)->delete();
        return redirect()->back();
    }


  
    //==================================endComment=====================================================

    //categoy
    //=======================

    public function showcate($id)
    {
        $catview = BlogPost::where('category_id', $id)->get();


        return view('catpostview', compact('catview'));
    }
    //end cat
    //===================


    public function search()
    {
        $search = $_GET('query');
        $blog_posts = BlogPost::where('title', 'LIKE', '%' . $search . '%')->with('category')->get();
        return view('search', compact('blog_posts'));
    }
}
