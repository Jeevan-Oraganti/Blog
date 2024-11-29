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
use App\Http\Controllers\ProfileController;

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
    Route::get('admin/posts', [AdminController::class, 'index'])->name('admin.posts.index');
    Route::post('admin/post', [AdminController::class, 'store'])->name('admin.posts.store');
    Route::get('admin/users', [AdminController::class, 'usersIndex']);
    Route::get('admin/user/{slug}/edit', [AdminController::class, 'userEdit']);
    Route::patch('admin/user/{user}', [AdminController::class, 'userUpdate']);

    Route::get('admin/contacts', [AdminController::class, 'contacts'])->name('admin.contacts');

    Route::get('admin/post/create', [AdminController::class, 'create'])->name('admin.posts.create');
    Route::get('admin/posts/{post}/edit', [AdminController::class, 'edit'])->name('admin.posts.edit');
    Route::patch('admin/posts/{post}', [AdminController::class, 'update'])->name('admin.posts.update');
    Route::delete('admin/post/{post}', [AdminController::class, 'destroy'])->name('admin.posts.destroy');
    Route::post('admin/post/{post}/approve', [AdminController::class, 'approve'])->name('admin.post.approve');
    Route::post('admin/post/{post}/reject', [AdminController::class, 'reject'])->name('admin.post.reject');
    Route::get('admin/contacts', [AdminController::class, 'contacts']);

    Route::delete('admin/user/{user}', [AdminController::class, 'userDestroy']);

    Route::get('admin/user/delete/{user}', [AdminController::class, 'userDestroy']);
});


Route::get('/subscription', [NavigationController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('profile/{slug}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

    Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('post', [PostController::class, 'store'])->name('post.store');
    Route::get('user/post/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('post/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::get('user/posts', [PostController::class, 'userPosts'])->name('user.posts');
    Route::delete('user/post/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});
