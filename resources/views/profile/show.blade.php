<!-- resources/views/profile/show.blade.php -->
<x-layout>
    <div class="container mx-auto px-4 mt-20">
        <h1 class="text-3xl font-bold mb-6">Profile</h1>

        <a href="/admin/users"
            class="transition-colors duration-300 relative inline-flex items-center font-size-.8em text-blue-500 hover:hover-blue-600">
            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-1">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path class="fill-current"
                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                    </path>
                </g>
            </svg>
            Back to Users
        </a>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
            <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                User Information
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Personal details and application.
                </p>
            </div>
            <div>
                <a href="/admin/user/{{ $user->id }}/edit"
                class="text-blue-500 hover:text-blue-600">
                <img
                    src="{{ asset('images/edit.svg') }}"
                    class="w-10 h-10">
                </a>
            </div>
            </div>

            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Full name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $user->name }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Email address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $user->email }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Profile Picture
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <img src="{{ $user->profileImageUrl() }}" alt="Profile Image" width="60" height="60"
                                class="rounded-xl">
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Posts
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul>
                                @foreach($user->posts as $post)
                                <li><a href="/post/{{ $post->slug }}"
                                        class="text-blue-500 hover:text-blue-600">{{ $post->title }}</a></li>
                                @endforeach
                            </ul>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-layout>