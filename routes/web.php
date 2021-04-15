<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CheckoutController;
use App\Models\BlogPost;


Route::get('/', function () {


    return view('welcome');
});
Route::resource('/dashboard/posts', BlogPostController::class);
Route::post('/dashboard/posts/{post}/comment', [BlogPostController::class, "storeComment"]);
Route::get('/dashboard/posts/{post}/comment', [BlogPostController::class, "showComment"]);
Route::resource('/dashboard/categories', Categorycontroller::class);

Route::get('/dashboard/catposts/{id}', [BlogPostController::class, 'showcate']);


Route::post('/dashboard/checkout', [CheckoutController::class, "checkout"]);
Route::get('/dashboard/checkout', [CheckoutController::class, "afterpayment"]);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
