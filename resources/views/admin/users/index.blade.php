<x-layout>
    <x-setting heading="Manage Posts">
        <div class="px-4 sm:px-6 lg:px-8">
            <div class="mt-4 flow-root">
                <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">

                        @if(session('warning'))
                        <div id="warning-message" class="bg-yellow-500 text-white p-4 rounded mb-6">
                            {{ session('warning') }}
                        </div>
                        <script>
                            setTimeout(function() {
                                document.getElementById('warning-message').style.display = 'none';
                            }, 3000);
                        </script>
                        @endif

                        @if(session('success'))
                        <div id="success-message" class="bg-green-500 text-white p-4 rounded mb-6">
                            {{ session('success') }}
                        </div>
                        <script>
                            setTimeout(function() {
                                document.getElementById('success-message').style.display = 'none';
                            }, 3000);
                        </script>
                        @endif


                        <table class="min-w-full divide-y divide-gray-300">
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($users as $user)
                                <tr>
                                    <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-0">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $loop->index + 1 }}</div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="ml-7 flex-shrink-0 whitespace-nowrap">
                                            <img src="https://i.pravatar.cc/60?u={{ $user->id }}" alt="Profile Image" width="40"
                                                height="40" class="rounded-full">
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
                                            <a href="/admin/user/{{ $user->email }}">
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
                                            class="text-blue-500 hover:text-blue-600">
                                            <img
                                                src="{{ asset('images/edit.svg') }}"
                                                class="w-10 h-10">
                                        </a>
                                    </td>
                                    <td class="relative whitespace-nowrap py-5 pl-3 pr-4 text-right text-sm font-medium sm:pr-0">
                                        <!-- <form method="POST" action="/admin/user/{{ $user->id }}">
                                            @csrf
                                            @method('DELETE') -->
                                        <form method="GET" action="/admin/user/delete/{{ $user->id }}">
                                            <button type="submit" class="text-red-500 hover:text-red-600">
                                                <img
                                                    src="{{ asset('images/delete.svg') }}"
                                                    class="w-10 h-10">
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

</x-layout>