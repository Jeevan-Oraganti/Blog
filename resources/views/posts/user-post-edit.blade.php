<x-layout>
    <div class="mb-4 mt-20">
        <a href="/user/posts" class="inline-flex items-center text-blue-500 hover:text-blue-600">
            <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span>Back</span>
        </a>
    </div>

    <div class="flex justify-center items-center mb-6">
        <h1 class="text-2xl font-semibold mr-4">Edit Post</h1>
        <img src="{{ asset('images/edit.svg') }}" class="w-8 h-8">
    </div>

    <form method="POST" action="/post/{{ $post->id }}" enctype="multipart/form-data" class="space-y-6 max-w-lg mx-auto">
        @csrf
        @method('PATCH')

        <x-form.input name="title" :value="old('title', $post->title )" />
        <x-form.input name="slug" :value="old('title', $post->slug )" />
        <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="thumbnail" class="mt-4 w-32 h-32 object-cover rounded-md">
        <x-form.textarea name="excerpt">{{old('excerpt', $post->excerpt)}}</x-form.textarea>
        <x-form.textarea name="body">{{old('body', $post->body)}}</x-form.textarea>

        <x-form.field>
            <x-form.label name="category" />
            <select name="category_id" id="category_id" class="w-full border border-gray-300 rounded-md p-2">
                @foreach(\App\Models\Category::all() as $category)
                    <option
                        value="{{ $category->id }}" {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ ucwords($category->name) }}
                    </option>
                @endforeach
            </select>
            <x-form.error name="category" />
        </x-form.field>

        <x-form.button>Update</x-form.button>
    </form>
</x-layout>
