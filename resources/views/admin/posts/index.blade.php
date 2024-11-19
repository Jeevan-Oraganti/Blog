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
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $loop->index + 1 }}</div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="ml-4">
                                            <a href="/posts/{{ $post->slug }}">
                                                <div
                                                    class="font-medium text-blue-500 hover:text-blue-600">{{ $post->title }}</div>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="thumbnail"
                                             class="w-10 h-10">
                                    </td>
                                    <!-- <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                        <span
                                            class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">
                                            Published
                                        </span>
                                    </td> -->
                                    <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <a href="/admin/posts/{{ $post->id }}/edit"
                                           class="text-blue-500 hover:text-blue-600">
                                            <img
                                                src="https://icons.veryicon.com/png/o/miscellaneous/blue-soft-fillet-icon/edit-173.png"
                                                class="w-10 h-10">
                                        </a>
                                    </td>
                                    <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <form method="POST" action="/admin/posts/{{ $post->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-600">Delete
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

    </x-setting>

</x-layout>
