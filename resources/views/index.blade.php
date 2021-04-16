@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="row mb-5">

            @foreach ($blog_posts as $post)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{asset('/images/'.$post->image)}}" class="card-img-top" />
                    <blockquote>{{$post->title}}</blockquote>
                    <div class="card-body">
                        <h5 class="card-title">{{$post->body}}</h5>
                      
                        <a >
                            <p style="color: blue;">{{$post->category->name}}</p>
                        </a>
                        <a href="{{ route('posts.edit', ['post'=>$post->id]) }}"> Edit</a>
                        <a href="{{ route('posts.show', ['post'=>$post->id]) }}"> show</a>
                        <form method="post" action="/posts/{{$post->id}}">
                            <input type="submit" value="delete" />
                            <input type="hidden" name="_method" value="delete" />
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
    <!-- Right SIdebar -->
    <div class="col-md-4">
        <!-- Search -->
        <div class="card mb-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
                <form action="{{url('/')}}">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" />
                        <div class="input-group-append">
                            <button class="btn btn-dark" type="button" id="button-addon2">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Categoris -->
        <div class="card mb-4">
            <h5 class="card-header">Category</h5>
            <div class="list-group list-group-flush">
                <ul class="list">

                    @foreach ($categories as $category)
                    <a href="/catposts/{{$category->id}}">
                        <li class="option" id="{{$category->id}}" value="{{$category->id}}">{{$category->name}}</li>
                    </a>
                    @endforeach

                </ul>

            </div>
        </div>
    </div>
</div>
@endsection