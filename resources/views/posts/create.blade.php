<!-- resources/views/posts/create.blade.php -->
<x-layout>
    <div class="flex justify-center items-center mb-6 mt-20">
        <h1 class="text-2xl font-semibold mr-4">Create Post</h1>
        <img src="{{ asset('images/edit.svg') }}" class="w-8 h-8">
    </div>
    <div class="mt-8 flex justify-center">
        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data"
              class="space-y-6 w-full max-w-lg">
            @csrf

            <x-form.input name="title" class="block w-full border-gray-300 rounded-md shadow-sm"/>
            <x-form.input name="slug" class="block w-full border-gray-300 rounded-md shadow-sm"/>
            <x-form.input name="thumbnail" type="file" class="block w-full border-gray-300 rounded-md shadow-sm"/>
            <x-form.textarea name="excerpt" class="block w-full border-gray-300 rounded-md shadow-sm"/>
            <x-form.textarea name="body" class="block w-full border-gray-300 rounded-md shadow-sm"/>
            <x-form.field>
                <x-form.label name="category" class="block text-sm font-medium text-gray-700"/>
                <select name="category_id" id="category_id"
                        class="block w-full mt-1 border-gray-300 rounded-md shadow-sm">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>
                <x-form.error name="category" class="mt-2 text-sm text-red-600"/>
            </x-form.field>

            <x-form.button
                class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 disabled:opacity-25 transition">
                Submit
            </x-form.button>
        </form>
    </div>
</x-layout>
