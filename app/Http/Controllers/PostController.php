<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Post;
use App\Models\User;
use Illuminate\Validation\Rule;
use \Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::filter(
                request(['search', 'category', 'author'])
            )->where('approved', true)->inRandomOrder()->paginate(6)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails', 'public');
        $attributes['user_id'] = auth()->id();
        $attributes['approved'] = false;

        Post::create($attributes);

        return redirect('/')->with('success', 'Post Created and sent for approval');
    }

    public function show(Post $post)
    {
        if (!$post->approved) {
            return redirect('/user/posts')->with('error', 'Sorry, this post is still waiting for approval');
        }
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.user-post-edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails', 'public');
        }

        $attributes['approved'] = false; // Set approved to false when a post is edited

        $post->update($attributes);

        return back()->with('success', 'Post Updated and sent for approval');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted');
    }

    public function userPosts()
    {
        $posts = Post::where('user_id', auth()->id())->latest()->paginate(10);

        return view('posts.user-posts', [
            'posts' => $posts
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


        return view('components.blog.index', compact('posts', 'users'));
    }

    public function blogsOpen(Post $post)
    {
        return view('components.blog.show', [
            'post' => $post
        ]);
    }

    protected function validatePost(?Post $post = null)
    {
        $post ??= new Post();

        return request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists ? ['image'] : ['required', 'image'],
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', 'exists:categories,id'],
        ]);
    }
}
