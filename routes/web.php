<?php

use App\Http\Controllers\AdminController;
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
Route::get('blog/id={post}', [PostController::class, 'blogsOpen']);

Route::get('post/{post:slug}', [PostController::class, 'show']);
Route::post('post/{post:slug}/comment', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store']);
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('contact-us', [ContactController::class, 'index']);
Route::post('contact', [ContactController::class, 'store']);

//Admin
Route::middleware('can:admin')->group(function () {
    Route::get('admin/posts', [AdminController::class, 'index']);
    Route::post('admin/post', [AdminController::class, 'store']);
    Route::get('admin/users', [AdminController::class, 'usersIndex']);
    Route::delete('admin/user', [AdminController::class, 'userDestroy']);
    Route::get('admin/user/{slug}/edit', [AdminController::class, 'userEdit']);
    Route::patch('admin/user/{slug}', [AdminController::class, 'userUpdate']);
    Route::get('admin/contacts', [AdminController::class, 'contacts']);
    Route::get('admin/post/create', [AdminController::class, 'create']);
    Route::get('admin/posts/{post}/edit', [AdminController::class, 'edit']);
    Route::patch('admin/posts/{post}', [AdminController::class, 'update']);
    Route::delete('admin/post/{post}', [AdminController::class, 'destroy']);
});


Route::get('/navigation', [NavigationController::class, 'index'])->name('navigation.index');
