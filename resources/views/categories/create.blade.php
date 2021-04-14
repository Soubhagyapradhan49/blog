@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row">
        <div class="col-12 pt-2">
            <a href="/categories.index" class="btn btn-outline-primary btn-sm">Go back</a>
            <div class="border rounded mt-5 pl-4 pr-4 pt-4 pb-4">
                <h1 class="display-4">Create a New Categories</h1>

                <form method="POST" action="/categories" >
                    @csrf
                    <div class="row">
                        <div class="control-group col-12">
                            <label for="title">Category Name</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="Enter category Title" required>
                        </div>




                    </div>
                    <div class="row mt-2">
                        <div class="control-group col-12 text-center">

                            <button id="btn-submit" class="btn btn-primary">
                                Create Category
                            </button>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>


</div>

@endsection