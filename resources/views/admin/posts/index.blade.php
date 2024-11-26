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
                                    <td>
                                        <img src="{{ $post->author->profileImageUrl() }}" alt="profile"
                                            class="w-12 mx-auto rounded-full">
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
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="ml-4">
                                            <span
                                                class="text-sm text-gray-500">{{ $post->comments_count }} comments</span>
                                        </div>
                                    </td>
                                    </td>
                                    <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <a href="/admin/posts/{{ $post->id }}/edit"
                                            class="text-blue-500 hover:text-blue-600">
                                            <img
                                                src="{{ asset('images/edit.svg') }}"
                                                class="w-10 h-10">
                                        </a>
                                    </td>
                                    <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <form method="POST" action="/admin/post/{{ $post->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-600">
                                                <img
                                                    src="{{ asset('images/delete.svg') }}"
                                                    class="w-10 h-10">
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

        <div class="mt-6">
            {{ $posts->links() }}
        </div>

    </x-setting>

</x-layout>