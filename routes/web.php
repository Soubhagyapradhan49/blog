<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;

use App\Http\Controllers\StripeController;
use App\Models\BlogPost;


Route::get('/', function () {


    return view('welcome');
});
Route::resource('/dashboard/posts', BlogPostController::class);
Route::post('/dashboard/posts/{post}/comment', [BlogPostController::class, "storeComment"]);
Route::get('/dashboard/posts/{post}/comment', [BlogPostController::class, "showComment"]);
Route::resource('/dashboard/categories', Categorycontroller::class);

Route::get('/dashboard/catposts/{id}', [BlogPostController::class, 'showcate']);

Route::get('/dashboard/stripe-payment', [StripeController::class, 'handleGet']);
Route::post('dashboard/stripe-payment', [StripeController::class, 'handlePost'])->name('stripe.payment');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
