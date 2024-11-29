<!-- resources/views/posts/user-posts.blade.php -->
<x-layout>
    <h1 class="mt-20 uppercase font-bold ml-9">My Posts</h1>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="mt-4 flow-root">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    @if($posts->isEmpty())
                        <p class="text-center text-gray-500">No posts available.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Title
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($posts as $post)
                                <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-100' }}">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-blue-500">
                                            <a href="/post/{{ $post->slug }}">{{ $post->title }}</a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $post->approved ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                            {{ $post->approved ? 'Approved and Published' : 'Pending Approval' }}
                                        </span>
                                    <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0"
                                        colspan="2">
                                        <div class="flex justify-start space-x-4 ml-2">
                                            <a href="post/{{ $post->id }}/edit"
                                               class="text-blue-500 hover:text-blue-600" title="Edit">
                                                <img src="{{ asset('images/edit.svg') }}"
                                                     class="w-9 h-9 transition-all duration-300 ease-in-out transform hover:scale-110">
                                            </a>

                                            <form method="POST" action="post/{{ $post->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-600"
                                                        title="Delete">
                                                    <img src="{{ asset('images/delete.svg') }}"
                                                         class="w-9 h-9 transition-all duration-300 ease-in-out transform hover:scale-110">
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(!$posts->isEmpty())
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    @endif

    <x-flash/>
</x-layout>
