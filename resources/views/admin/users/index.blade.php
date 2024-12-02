<x-layout>
    <x-setting heading="Manage Users">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-4 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

                        <table class="min-w-full divide-y divide-gray-300">
                            <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">
                                    No.
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Profile
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Author
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Email
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    No. of Posts
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            @foreach($users as $user)
                                <tr>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $loop->index + 1 }}</div>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="ml-7 flex-shrink-0">
                                            <img
                                                src="{{ $user->profileImageUrl() ?? asset('images/default-profile.svg') }}"
                                                alt="Profile Image"
                                                class="w-10 h-10 rounded-full">
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="ml-4">
                                            <a href="/profile/{{ $user->id }}">
                                                <div
                                                    class="font-medium text-blue-500 hover:text-blue-600">{{ $user->name }}</div>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="ml-4">
                                            <a href="mailto:{{ $user->email }}">
                                                <div
                                                    class="font-medium text-blue-500 hover:text-blue-600">{{ $user->email }}</div>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="ml-4">
                                            <span class="text-sm text-gray-500">{{ $user->posts_count }} posts</span>
                                        </div>
                                    </td>
                                    <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <a href="/admin/user/{{ $user->id }}/edit"
                                           class="text-blue-500 hover:text-blue-600" title="Edit">
                                            <img
                                                src="{{ asset('images/edit.svg') }}"
                                                class="w-10 h-10 transition-all duration-300 ease-in-out transform hover:scale-110">
                                        </a>
                                    </td>
                                    <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <!-- <form method="POST" action="/admin/user/{{ $user->id }}">
                                            @csrf
                                        @method('DELETE') -->
                                        <form method="GET" action="/admin/user/delete/{{ $user->id }}">
                                            <button type="submit" class="text-red-500 hover:text-red-600"
                                                    title="Delete">
                                                <img
                                                    src="{{ asset('images/delete.svg') }}"
                                                    class="w-10 h-10 transition-all duration-300 ease-in-out transform hover:scale-110">
                                            </button>
                                        </form>
                                    </td>
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
            {{ $users->links() }}
        </div>

    </x-setting>

    <x-flash/>

</x-layout>
