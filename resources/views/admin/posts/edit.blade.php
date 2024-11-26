<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">

        <div class="mb-4">
            <a href="{{ url()->previous() }}" class="inline-flex items-center hover:text-blue-600">
                <svg class="h-6 w-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="text-blue-500">Back</span>
            </a>
        </div>
        
        <img src="https://icons.veryicon.com/png/o/miscellaneous/blue-soft-fillet-icon/edit-173.png" class="w-8 h-8" style="float: right;">
        <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title )" />
            <x-form.input name="slug" :value="old('title', $post->slug )" />
            <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="thumbnail" class="mt-4">
            <x-form.textarea name="excerpt">{{old('excerpt', $post->excerpt)}}</x-form.textarea>
            <x-form.textarea name="body">{{old('body', $post->body)}}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category" />
                <select name="category_id" id="category_id">
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
    </x-setting>

</x-layout>
