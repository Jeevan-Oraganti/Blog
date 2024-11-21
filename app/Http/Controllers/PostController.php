<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Post;
use App\Models\User;
use \Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author'])
            )->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }
    public function blog()
    {
        $users = User::when(request('id'), function ($query) {
            return $query->where('id', (int) request('id'));
        })->get();

        $posts = Post::latest()->filter(
            request(['search', 'category', 'author'])
        )->paginate(20)->withQueryString();


        return view('components.blog.view', compact('posts', 'users'));
    }

    public function blogsOpen(Post $post)
    {
        return view('components.blog.show', [
            'post' => $post
        ]);
    }

}
