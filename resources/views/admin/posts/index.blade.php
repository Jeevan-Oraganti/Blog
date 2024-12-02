<!-- resources/views/admin/posts/index.blade.php -->
<x-layout>
    <x-setting heading="Manage Posts">
        <div class="px-2 sm:px-6 lg:px-8">
            <div class="mt-4 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    No.
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Title
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Author
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Profile
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    No. of Comments
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Created At
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($posts as $post)
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-0">
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
                                            <img src="{{ $post->author->profileImageUrl() ?? asset('images/default-profile.svg')  }}" alt="profile"
                                                class="w-10 h-10 mx-auto rounded-full">
                                        </a>
                                    </td>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="ml-4">
                                            <span
                                                class="text-sm text-gray-500">{{ $post->comments_count }} comments</span>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="ml-4">
                                            <span
                                                class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() ?? 'N/A' }}</span>
                                        </div>
                                    </td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        @if(!$post->approved)
                                        <div class="flex space-x-2">
                                            <form method="POST" action="{{ route('admin.post.approve', $post) }}">
                                                @csrf
                                                <button type="submit" class="text-green-500 hover:text-green-600"
                                                    title="Approve">
                                                    <img
                                                        src="{{ asset('images/approve.svg') }}"
                                                        class="w-9 h-9 transition-all duration-300 ease-in-out transform hover:scale-110">
                                                </button>
                                            </form>
                                            <form method="POST" action="{{ route('admin.post.reject', $post) }}">
                                                @csrf
                                                <button type="submit" class="text-red-500 hover:text-red-600"
                                                    title="Reject">
                                                    <img
                                                        src="{{ asset('images/reject.svg') }}"
                                                        class="w-9 h-9 transition-all duration-300 ease-in-out transform hover:scale-110">
                                                </button>
                                            </form>
                                        </div>
                                        @else
                                        <span class="mr-4 bg-green-100 text-green-800 p-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full">Published</span>
                                        @endif
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

        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </x-setting>
</x-layout>
