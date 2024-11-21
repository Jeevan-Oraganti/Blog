<x-layout>
    <div class="mt-20 font-bold uppercase items-center text-blue-500">
        <a href="/blog">All Posts in a Table</a>
    </div>
    <table class="min-w-full divide-y divide-gray-200 mt-8">
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
                Category
            </th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                Published On
            </th>
        </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        @php
            $startingIndex = ($posts->currentPage() - 1) * $posts->perPage();
        @endphp
        @foreach($posts as $index => $post)
            <tr class="{{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-100' }}"
                onclick="window.location.href='/blog/id={{ $post->id }}'" style="cursor:pointer;">
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $startingIndex + $index + 1 }}</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-blue-500">
                        <a href="/post/{{ $post->slug }}">{{ $post->title }}</a>
                        @if($post->isLatest())
                            <sup class="bg-blue-500 text-white text-base/4 px-1 py-0.5 rounded-full">
                                New
                            </sup>
                        @endif
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-blue-500">
                        <a href="{{ url()->current() }}/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-blue-500">
                        <a href="{{ url()->current() }}/?category={{ $post->category->slug }}">{{ $post->category->name }}</a>
                    </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $post->created_at->format('M d, Y') }}</div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-6">
        {{ $posts->links() }}
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
            $startingIndex = ($posts->currentPage() - 1) * $posts->perPage();
        @endphp

        @foreach ($posts as $index => $post)
            <div class="p-6 rounded-lg shadow-lg mt-20 relative"
                 style="background-image: url('{{ asset('storage/' . $post->thumbnail) }}'); background-size: cover; background-position: center;"
                 class="rounded-lg">
                <div class="overlay absolute top-0 left-0 right-0 bottom-0 bg-black opacity-50 rounded-lg"></div>
                <div class="relative z-10 text-white">
                    <h2 class="text-balance font-semibold tracking-tight text-white-900">{{ $startingIndex + $index + 1 }}.
                        <a href="/post/{{ $post->slug }}">{{ $post->title }}</a>
                        @if($post->isLatest())
                            <sup class="bg-blue-500 text-white text-base/4 px-1 py-0.5 rounded-full z-10">
                                New
                            </sup>
                        @endif
                    </h2>
                    <p class="text-white mt-2">{!! $post->excerpt !!}</p>
                    <h1 class="text-xl font-bold mt-2"><a
                            href="{{ url()->current() }}/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                    </h1>
                    <a href="/posts/{{ $post->slug }}" class="text-blue-500 hover:underline mt-2">Read more</a>
                </div>
            </div>
        @endforeach
    </div>

</x-layout>
