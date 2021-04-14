@extends('layouts.app')
@section('content')

<div class="jumbotron text-center" style="margin-bottom:0 ">
  <h1>Welcome to FashionBlog</h1>
</div>



<div class="container" style="margin-top:30px">
</div>
<div class="col-md-8">

  @foreach ($blog_posts as $post)

  <h2>{{$post->title}}</h2>
  <img src="{{asset('/images/'.$post->image)}}" height="100px" width="100px" />

  <p>{{$post->body}}</p>
  <p>{{$post->category->name}}</p>
  

  <a href="{{ route('posts.edit', ['post'=>$post->id]) }}"> Edit</a>
  <a href="{{ route('posts.show', ['post'=>$post->id]) }}"> show</a>
  <form method="post" action="/posts/{{$post->id}}">
    <input type="submit" value="Delete" />
    <input type="hidden" name="_method" value="delete" />
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </form>
</div>
</div>
</div>

@endforeach


@endsection