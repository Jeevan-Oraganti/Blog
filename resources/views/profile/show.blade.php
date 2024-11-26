<!-- resources/views/profile/show.blade.php -->
<x-layout>
    <div class="container mt-20 mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6">Profile</h1>

        <div class="mb-4">
            <a href="{{ url()->previous() }}" class="inline-flex items-center hover:text-blue-600">
                <svg class="h-6 w-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                <span class="text-blue-500">Back</span>
            </a>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    User Information
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Personal details and application.
                </p>
                <a href="/admin/user/{{ $user->id }}/edit"
                   class="text-blue-500 hover:text-blue-600">
                    <img src="{{ asset('images/edit.svg') }}"
                         class="w-10 h-10 float-right">
                </a>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Full name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <a href="{{ route('profile.show', $user->id) }}" class="text-blue-500 hover:text-blue-600">
                                {{ $user->name }}
                            </a>
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
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Comments
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <ul class="list-disc pl-5 space-y-2">
                                @forelse($user->comments as $comment)
                                    <li>
                                        <p class="text-sm">{{ $comment->body }}</p>
                                        <p class="text-xs text-gray-500">on <a href="/post/{{ $comment->post->slug }}"
                                                                               class="text-blue-500 hover:text-blue-600">{{ $comment->post->title }}</a>
                                        </p>
                                    </li>
                                @empty
                                    <li>No comments available.</li>
                                @endforelse
                            </ul>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-layout>
