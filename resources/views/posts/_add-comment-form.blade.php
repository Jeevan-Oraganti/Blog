@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}"
                     alt="Profile Image"
                     width="60"
                     height="60"
                     class="rounded-xl">
                <h2 class="ml-4">Want to participate?</h2>
            </header>
            <div class="mt-6">
                <textarea name="body"
                          id="body"
                          class="w-full text-sm focus:outline-none focus:ring focus:ring-blue-500 rounded-xl p-1"
                          placeholder="Quick, think of something to say!"
                          rows="5"
                          required></textarea>


                @error('body')
                <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4 rounded-xl text-center border-t border-gray-200 pt-4">
                <x-form.button>Post</x-form.submit-button>
            </div>
        </form>
    </x-panel>
@else
    <p class="font-semibold text-center text-gray-700">
        <a href="/register" class="text-blue-500">Register</a> or <a href="/login"
                                                                     class="text-blue-500">Log in</a> to leave a comment.
    </p>
@endauth
