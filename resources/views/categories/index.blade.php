@extends('layouts.app')
@section('content')

<div class="jumbotron text-center" style="margin-bottom:0 ">
  <h1>Welcome to FashionBlog Categories</h1>
</div>

@foreach ($categories as $category)

<h2>{{$category->name}}</h2>
<form method="post" action="/dashboard/categories/{{$category->id}}">
    <input type="submit" value="delete" />
    <input type="hidden" name="_method" value="delete" />
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </form>

@endforeach




@endsection