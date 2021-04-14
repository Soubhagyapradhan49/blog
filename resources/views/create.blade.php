@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <a href="/index" class="btn btn-outline-primary btn-sm">Go back</a>
            <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="display-4">Create a New Post</h1>


                <hr>

                <form method="POST" action="/posts" enctype='multipart/form-data'>
                    @csrf
                    <div class="row">
                        <div class="control-group col-12">
                            <label for="title">Post Title</label>
                            <input type="text" id="title" class="form-control" name="title" placeholder="Enter Post Title" required>
                        </div>
                        <div class="control-group col-12 mt-2">
                            <label for="body">Post Body</label>
                            <textarea id="body" class="form-control" name="body" placeholder="Enter Post Body" rows="" required></textarea>
                            <div class="dropdown">
                                <select name="category_id" class="form-select" aria-label="Default select example">
                           
                                    @foreach($categories as $category)
                                    <option value="{{$category->id }}">{{$category->name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Choose Image</label>
                                <input id="image" type="file" name="image">
                            </div>

                        </div>
                        <div class="row mt-2">
                            <div class="control-group col-12 text-center">

                                <button id="btn-submit" class="btn btn-primary">
                                    Create Post
                                </button>

                            </div>
                        </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection