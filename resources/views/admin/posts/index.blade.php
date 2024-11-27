<x-layout>
    <x-setting heading="Manage Posts">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-4 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($posts as $post)
                                <tr>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">{{ $loop->index + 1 }}</div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="ml-4">
                                            <a href="/post/{{ $post->slug }}">
                                                <div
                                                    class="font-medium text-blue-500 hover:text-blue-600">{{ $post->title }}
                                                    @if($post->isLatest())
                                                        <sup
                                                            class="bg-blue-500 text-white text-base/4 px-1 py-0.5 rounded-full">
                                                            New
                                                        </sup>
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="ml-4">
                                            <a href="/profile/{{ $post->user->id }}">
                                                <div
                                                    class="font-medium text-blue-500 hover:text-blue-600">{{ $post->user->name }}</div>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="/profile/{{ $post->user->id }}">
                                        <img src="{{ $post->author->profileImageUrl() }}" alt="profile"
                                             class="w-12 mx-auto rounded-full">
                                        </a>
                                    </td>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="ml-4">
                                            <span
                                                class="text-sm text-gray-500">{{ $post->comments_count }} comments</span>
                                        </div>
                                    </td>
                                    </td>
                                    <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <a href="/admin/posts/{{ $post->id }}/edit"
                                           class="text-blue-500 hover:text-blue-600" title="Edit">
                                            <img
                                                src="{{ asset('images/edit.svg') }}"
                                                class="w-10 h-10 transition-all duration-300 ease-in-out transform hover:scale-110">
                                        </a>
                                    </td>
                                    <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <form method="POST" action="/admin/post/{{ $post->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-600"
                                                    title="Delete">
                                                <img
                                                    src="{{ asset('images/delete.svg') }}"
                                                    class="w-10 h-10 transition-all duration-300 ease-in-out transform hover:scale-110">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{--        <div class="mt-6">--}}
        {{--            {{ $posts->links() }}--}}
        {{--        </div>--}}


        <div class="mt-6">
            <div class="flex items-center justify-end space-x-2">
                @if ($posts->onFirstPage())
                    <span class="text-gray-500 cursor-not-allowed">&laquo; Previous</span>
                @else
                    <a href="{{ $posts->previousPageUrl() }}" class="text-indigo-600 hover:text-indigo-700">«
                        Previous</a>
                @endif

                <div class="flex relative justify-end -space-x-1.5">
                    @foreach($posts as $post)
                        <div class="relative hover:border-blue-500">
                            <img src="{{ asset('storage/' .  $post->thumbnail) }}" alt="thumbnail"
                                 class="w-8 h-8 rounded-full border-2 border-white object-cover transition-transform duration-200 ease-in-out hover:scale-110">
                        </div>
                    @endforeach
                </div>

                @foreach($posts->links() as $link)
                    <a href="{{ $link->url }}" class="w-10 h-10 rounded-full border-2 border-gray-300">
                        <img src="{{ asset('storage/' .  $post->thumbnail) }}" alt="thumbnail"
                             class="w-8 h-8 rounded-full border-2 border-white object-cover transition-transform duration-200 ease-in-out hover:scale-110">
                    </a>
                @endforeach

                @if ($posts->hasMorePages())
                    <a href="{{ $posts->nextPageUrl() }}" class="text-indigo-600 hover:text-indigo-700">Next »</a>
                @else
                    <span class="text-gray-500 cursor-not-allowed">Next »</span>
                @endif
            </div>
        </div>


    </x-setting>

</x-layout>
