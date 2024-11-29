<x-layout>
    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <a href="/" class="flex text-blue-500">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back
        </a>
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-12 mb-10">
                <img src="{{ $post->thumbnailUrl() ?? asset('images/default-thumbnail.svg') }}" alt="thumbnail" class="rounded-xl w-full h-auto">
            </div>

            <div class="col-span-12">
                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $post->title }}
                </h1>
                <div class="space-y-4 lg:text-lg leading-loose">
                    {!! $post->body !!}
                </div>
            </div>

            <div class="col-span-12 lg:text-right text-sm mt-4">
                <p class="text-gray-400 text-xs">
                    Published
                    <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>
                <div class="flex items-center justify-end text-sm mt-4">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar" class="w-10 h-10 rounded-full">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">
                            <a href="/?author={{ $post->author->username }}" class="hover:underline">{{ $post->author->name }}</a>
                        </h5>
                    </div>
                </div>
            </div>
            <section class="col-span-12 mt-10 space-y-6">
                @include('posts._add-comment-form')

                @if($post->comments()->count())
                    @foreach($post->comments as $index => $comment)
                        <div class="flex items-start space-x-4 p-4 rounded-lg shadow-md {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                            <img src="{{ $comment->author->profileImageUrl() }}" alt="{{ $comment->author->name }}" class="w-10 h-10 rounded-full">
                            <div class="flex-1">
                                <div class="flex justify-between items-center">
                                    <h5 class="font-bold">{{ $comment->author->name }}</h5>
                                    <p class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                                <p class="mt-2 text-gray-700">{{ $comment->body }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-500">No comments yet. Be the first to comment!</p>
                @endif
            </section>
        </article>
    </main>
</x-layout>