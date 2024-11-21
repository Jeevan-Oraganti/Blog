<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->filter(
            request(['search', 'category', 'author'])
        )->paginate(10)->withQueryString();

        return view('admin.posts.index', [
            'posts' => $posts
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        Post::create(array_merge($this->validatePost(), [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->file('thumbnail')->store('thumbnails', 'public')
        ]));

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validatePost(new Post());

        $attributes['updated_at'] = now();

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails', 'public');
        }

        $post->update($attributes);

        return back()->with('Success', 'Post Updated');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted');
    }

    public function contacts()
    {
        $contacts = Contact::latest()->filter([
            'search' => request('search')]
        )->paginate(10)->withQueryString();

        return view('admin.contacts', ['contacts' => $contacts]);
    }

    public function isLatest()
    {
        return $this->created_at->gt(Carbon::now()->subDays(1));
    }

    /**
     * @param Post $post
     * @return mixed
     */
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
