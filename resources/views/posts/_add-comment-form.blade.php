@auth
<x-panel>
    <form method="POST" action="/post/{{ $post->slug }}/comment" class="space-y-6">
        @csrf
        <header class="flex items-center space-x-4">
            <img src="{{ auth()->user()->profileImageUrl() ?? asset('images/default-profile.svg') }}"
                alt="Profile Image"
                class="w-14 h-14 rounded-full border-2 border-blue-500">
            <h2 class="text-lg font-semibold text-blue-600">We'd love to hear your thoughts!</h2>
        </header>
        <div>
            <textarea name="body"
                id="body"
                class="w-full text-sm focus:outline-none focus:ring focus:ring-blue-500 rounded-xl p-4 border border-gray-300"
                placeholder="Share your thoughts..."
                rows="5"
                required></textarea>

            @error('body')
            <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror
        </div>
        <div class="text-right">
            <x-form.button class="bg-blue-500 hover:bg-blue-600 text-white">Post Comment</x-form.button>
        </div>
    </form>
</x-panel>
@else
<p class="font-semibold text-center text-gray-700">
    <a href="/register" class="text-blue-500 hover:underline">Register</a> or <a href="/login"
        class="text-blue-500 hover:underline">Log in</a> to join the conversation.
</p>
@endauth
