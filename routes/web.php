<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/posts', BlogPostController::class);
Route::post('/posts/{post}/comment', [BlogPostController::class, "storeComment"]);
Route::get('/posts/{post}/comment', [BlogPostController::class, "showComment"]);

Route::resource('/categories', Categorycontroller::class);

Route::get('/catposts/{id}', [BlogPostController::class, 'showcate']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
