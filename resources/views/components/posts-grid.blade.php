@props(['posts'])

<x-post-featured-card :post="$posts[0]" class="mb-6"/>

@if($posts->count()>1)
    <div class="lg:grid lg:grid-cols-6 lg:gap-6">
        @foreach($posts->skip(1) as $post)
            <x-post-card :post="$post" class="{{ $loop->iteration <3 ? 'col-span-3' : 'col-span-2' }} mb-6"/>
        @endforeach
    </div>
@endif
