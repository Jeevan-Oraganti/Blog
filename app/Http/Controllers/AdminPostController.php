<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
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
        $contacts = Contact::latest()->get();
        return view('admin.contacts', ['contacts' => $contacts]);
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
