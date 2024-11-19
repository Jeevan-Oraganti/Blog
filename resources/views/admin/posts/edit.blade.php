<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <a href="/admin/posts"
           class="transition-colors duration-300 relative inline-flex items-center font-size-.8em text-blue-500 hover:hover-blue-600">
            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-1">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path class="fill-current"
                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                    </path>
                </g>
            </svg>
            Back to Dashboard
        </a>
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
