@props(['post'])

<article {{ $attributes->merge(['class' => 'transition-all duration-300 hover:bg-gray-50 border border-gray-200 rounded-2xl shadow-md overflow-hidden', 'style' => 'max-height: fit-content']) }}>
    <div class="py-6 px-6 flex flex-col">
        <!-- Post Image -->
        <div class="mb-6">
            <img src="{{ $post->thumbnailUrl() ?? asset('images/default-thumbnail.svg') }}" alt="Blog Post illustration" class="w-full h-auto object-cover rounded-xl shadow-md" style="max-height: 300px;">
        </div>

        <!-- Post Content -->
        <div class="flex-1 flex flex-col justify-between">
            <header class="mb-4">
                <div class="space-x-2 text-xs font-semibold text-blue-600">
                    <x-category-button :category="$post->category" />
                </div>

                <div class="mt-2">
                    <h1 class="text-2xl font-bold text-gray-800 hover:text-blue-500 transition-colors duration-300">
                        <a href="/post/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-500 text-sm">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <!-- Excerpt -->
            <div class="text-sm text-gray-600 mt-4 space-y-4">
                <p>
                    {!! $post->excerpt !!}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-6">
                <!-- Author Section -->
                <div class="flex items-center text-sm mb-4">
                    <div class="flex-shrink-0">
                        <img src="{{ $post->author->profileImageUrl() }}" alt="Profile Image" class="w-12 h-12 rounded-full border-2 border-blue-100">
                    </div>
                    <div class="ml-3">
                        <h5 class="font-semibold text-gray-800">
                            <a href="/?author={{ $post->author->username }}" class="text-blue-600 hover:underline">
                                {{ $post->author->name }}
                            </a>
                        </h5>
                    </div>
                </div>

                <!-- Read More Button -->
                <div>
                    <a href="/post/{{ $post->slug }}" class="transition-colors duration-300 text-xs font-semibold bg-blue-500 text-white hover:bg-blue-600 rounded-full py-3 px-6">
                        Read More
                    </a>
                </div>
            </footer>
        </div>
    </div>
</article>