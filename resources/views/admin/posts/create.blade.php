@php use App\Models\Category; @endphp
<x-layout>
    <x-setting heading="Publish New Post">

        @if(session('warning'))
        <div id="warning-message" class="bg-yellow-500 text-white p-4 rounded mb-6">
            {{ session('warning') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('warning-message').style.display = 'none';
            }, 3000);
        </script>
        @endif

        @if(session('success'))
        <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-6">
            {{ session('success') }}
        </div>
        <script>
            setTimeout(function() {
                document.getElementById('success-message').style.display = 'none';
            }, 3000);
        </script>
        @endif

        <form method="POST" action="/admin/post" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" />
            <x-form.input name="slug" />
            <x-form.input name="thumbnail" type="file" />
            <x-form.textarea name="excerpt" />
            <x-form.textarea name="body" />

            <x-form.field>
                <x-form.label name="category" />
                <select name="category_id" id="category_id">
                    @foreach(Category::all() as $category)
                    <option
                        value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ ucwords($category->name) }}
                    </option>
                    @endforeach
                </select>
                <x-form.error name="category" />
            </x-form.field>

            <x-form.button>Publish</x-form.button>
        </form>
    </x-setting>

</x-layout>