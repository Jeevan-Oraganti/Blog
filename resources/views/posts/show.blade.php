<x-layout>

    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="{{ asset('storage/' .  $post->thumbnail) }}" alt="thumbnail" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published
                    <time>{{ $post->created_at->diffForHumans() }}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold"><a
                                href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a></h5>
                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <div class="mb-4">
                        <a href="{{ url()->previous() }}" class="inline-flex items-center hover:text-blue-600">
                            <svg class="h-6 w-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            <span class="text-blue-500">Back</span>
                        </a>
                    </div>

                    <div class="space-x-2">
                        <x-category-button :category="$post->category"/>
                    </div>
                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                    {{ $post->title }}
                </h1>
                <div class="space-y-4 lg:text-lg leading-loose">
                    {!! $post->body !!}
                </div>
            </div>
            <section class="col-span-8 col-start-5 mt-10 space-y-6">

                @include('posts._add-comment-form')

                @foreach($post->comments()->paginate(3) as $comment)
                    <x-post-comment :comment="$comment" :index="$loop->index"/>
                @endforeach

                {{ $post->comments()->paginate(3)->links() }}
            </section>
        </article>
    </main>

</x-layout>
