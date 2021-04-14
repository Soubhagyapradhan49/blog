@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="row mb-5">

            @foreach ($catview as $cat)
            <div class="col-md-4">
                <div class="card">

                    <blockquote>{{$cat->title}}</blockquote>
                    <div class="card-body">
                        <h5 class="card-title">{{$cat->body}}</h5>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection