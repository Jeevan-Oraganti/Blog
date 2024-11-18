<x-layout>


    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
        <x-posts-grid :posts="$posts" />

        {{ $posts->links() }}
        @else
        <p class="text-center">No posts yet. Please check back later.</p>
        @endif
    </main>


    <table class="min-w-full divide-y divide-gray-200 mt-20">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                    No.
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                    Title
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                    Author
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                    Published At
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($posts as $index => $post)
            <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-100'}}">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $index + 1 }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-blue-500">
                        <a href="/posts/{{$post->slug}}">
                            {{$post->title }}
                        </a>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-blue-500">
                        <a href="/?author={{ $post->author->username }}">
                            {{ $post->author->name }}
                        </a>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $post->created_at->format('M d, Y') }}</div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <nav class="mt-6">
        <a href="/blogs" class="text-blue-500">Blogs<sup>All</sup></a>
    </nav>
</x-layout>