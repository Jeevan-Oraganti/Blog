<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostCommentsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NavigationController;


Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('blog', [PostController::class, 'blog']);
Route::get('blogs/id={post}', [PostController::class, 'blogsOpen']);

Route::get('post/{post:slug}', [PostController::class, 'show']);
Route::post('post/{post:slug}/comment', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store']);
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('contact-us', [ContactController::class, 'contact']);
Route::post('contact', [ContactController::class, 'store']);

//Admin
Route::middleware('can:admin')->group(function () {
    Route::get('admin/posts', [AdminPostController::class, 'index']);
    Route::post('admin/post', [AdminPostController::class, 'store']);
    Route::get('admin/contacts', [AdminPostController::class, 'contacts']);
    Route::get('admin/post/create', [AdminPostController::class, 'create']);
    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('admin/post/{post}', [AdminPostController::class, 'destroy']);
});


Route::get('/navigation', [NavigationController::class, 'index'])->name('navigation.index');
