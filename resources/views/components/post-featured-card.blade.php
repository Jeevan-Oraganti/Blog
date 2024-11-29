@props(['post'])
<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl shadow-lg">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ $post->thumbnailUrl() ?? asset('images/default-thumbnail.svg') }}" alt="Blog Post illustration" class="rounded-xl w-full h-80 object-cover">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-category-button :category="$post->category" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl font-bold text-gray-800">
                        <a href="/post/{{ $post->slug }}" class="hover:underline">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-500 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4 text-gray-700">
                <p>
                    {!! $post->excerpt !!}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <div class="flex-shrink-0">
                        <img src="{{ $post->author->profileImageUrl() ?? asset('images/default-profile.svg') }}" alt="Profile Image" width="60" height="60"
                            class="w-10 h-10 rounded-full">
                    </div>
                    <div class="ml-3">
                        <h5 class="font-bold text-gray-800">
                            <a href="/?author={{ $post->author->username }}" class="hover:underline">{{ $post->author->name }}</a>
                        </h5>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/post/{{ $post->slug }}"
                        class="transition-colors duration-300 text-xs font-semibold bg-blue-500 hover:bg-blue-600 text-white rounded-full py-2 px-8">Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
