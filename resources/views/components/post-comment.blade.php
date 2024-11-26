@props(['comment' => $comment, 'index' => $index])

<x-panel :class="$index % 2 === 0 ? 'bg-white' : 'bg-gray-100'" wire:key="comment-{{ $comment->id }}">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="{{ $comment->author->profileImageUrl() }}" alt="Profile Image" width="60" height="60"
                class="rounded-xl">
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->name ?? 'Anonymous' }}</h3>
                <p class="text-xs">Posted
                    <time>{{ $comment->created_at->format('F j, Y, g:i a') ?? 'N/A' }}</time>
                </p>
            </header>
            <p>
                {{ $comment->body ?? 'No comment body available.' }}
            </p>
        </div>

    </article>
</x-panel>