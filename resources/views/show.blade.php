@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <a href="/posts" class="btn btn-outline-primary btn-sm">Go back</a>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="{{asset('/images/'.$post->image)}}" class="card-img-top" />
                <blockquote>{{$post->title}}</blockquote>
                <div class="card-body">
                    <h5 class="card-title">{{$post->body}}</h5>
                </div>
                <form action="/posts/{{$post->id}}/comment" method="POST">

                    @csrf
                    <textarea class="form-control mb-10" name="message" placeholder="Messege" required=""></textarea>
                    <button type="submit" class="primary-btn mt-20" href="#">Comment</button>
             
                </form>
                <div>
                    @foreach($comments as $comment)

                    <h1>{{$comment->message}}</h1>
                    @endforeach
                
                </div>
           
            </div>
        </div>
    </div>
    @endsection