<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminController extends Controller
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
        $contacts = Contact::filter([
            'search' => request('search')])->latest()->paginate(10)->withQueryString();

        return view('admin.contacts', ['contacts' => $contacts]);
    }

    public function usersIndex()
    {
        $users = User::latest()->filter(
            request(['search'])
        )->paginate(5)->withQueryString();

        return view('admin.users.index', ['users' => $users]);
    }

    public function userEdit($slug)
    {
        $user = User::where('id', $slug)->firstorFail();
        return view('admin.users.edit', ['user' => $user]);
    }

    public function userUpdate(User $user)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user)],
            'username' => ['required', Rule::unique('users', 'username')->ignore($user)],
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        if ($attributes['password'] ?? false) {
            $attributes['password'] = bcrypt($attributes['password']);
        } else {
            unset($attributes['password']);
        }

        $user->update($attributes);

        return back()->with('success', 'User Updated');
    }


    public function userDestroy($slug)
    {
        $user = User::where('id', $slug)->findorFail($slug);

        if($user->posts()->count() > 0)
        {
            return back()->with('warning', 'Cannot delete user. The user has associated posts.');
        }

        $user->delete();

        return back()->with('success', 'User Deleted');
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
