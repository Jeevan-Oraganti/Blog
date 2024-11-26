<x-layout>
    <div class="mt-10 container mx-auto px-6 py-12 md:px-16">

        <div class="bg-white shadow-2xl rounded-3xl p-10 space-y-10">
            @admin
            <div class="flex items-center mb-8">
                <a href="/admin/users"
                   class="text-lg text-blue-600 hover:text-blue-700 flex items-center transition-all duration-300 ease-in-out">
                    <svg class="h-6 w-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                         xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back
                </a>
            </div>
            @endadmin
            <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0 mb-12">
                <div class="flex items-center space-x-8">
                    <div class="relative">
                        <img src="{{ $user->profileImageUrl() }}" alt="Profile Image"
                             class="w-40 h-40 rounded-full shadow-xl object-cover border-4 border-gray-200">
                    </div>

                    <div>
                        <h1 class="text-4xl font-extrabold text-gray-900">{{ $user->name }}</h1>
                        <p class="text-lg text-gray-600 mt-2">{{ $user->email }}</p>
                    </div>
                </div>

                @admin
                <a href="/admin/user/{{ $user->id }}/edit"
                   class="inline-flex items-center text-white bg-blue-600 hover:bg-blue-700 px-8 py-4 rounded-full shadow-xl transition-all duration-300 ease-in-out">
                    Edit Profile
                </a>
                @endadmin

            </div>

            <div class="space-y-8">
                <h2 class="text-2xl font-semibold text-gray-900">User Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    <div class="flex flex-col space-y-2">
                        <span class="text-sm text-gray-500 font-medium">Full Name</span>
                        <div class="text-lg text-gray-900 font-semibold">{{ $user->name }}</div>
                    </div>

                    <div class="flex flex-col space-y-2">
                        <span class="text-sm text-gray-500 font-medium">Email Address</span>
                        <div class="text-lg text-gray-900 font-semibold">{{ $user->email }}</div>
                    </div>

                    <div class="flex flex-col space-y-2">
                        <span class="text-sm text-gray-500 font-medium">Profile Picture</span>
                        <div class="flex items-center space-x-4">
                            <img src="{{ $user->profileImageUrl() }}" alt="Profile Image"
                                 class="w-16 h-16 rounded-full border-2 border-gray-300 shadow-md object-cover">
                        </div>
                    </div>

                </div>
            </div>

            <div class="mt-12">
                <h2 class="text-2xl font-semibold text-gray-900 mb-6">Posts</h2>
                <div class="space-y-6">
                    @foreach($user->posts as $post)
                        <div class="flex justify-between items-center border-b py-4">
                            <a href="/post/{{ $post->slug }}"
                               class="text-s font-semibold text-blue-600 hover:text-blue-700 transition-all duration-300 ease-in-out">
                                {{ $post->title }}
                            </a>
                            <span class="text-sm text-gray-500">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    @endforeach
                    @if($user->posts->isEmpty())
                        <p class="text-gray-600 text-sm">No posts available.</p>
                    @endif
                </div>
            </div>

            <div class="mt-12">
                <h2 class="text-2xl font-semibold text-gray-900 mb-6">Comments</h2>
                <div class="space-y-6">
                    @forelse($user->comments()->paginate(10) as $comment)
                        <div class="flex justify-between border-b pb-6">
                            <div>
                                <p class="text-sm text-gray-800">{{ $comment->body }}</p>
                                <p class="text-xs text-gray-500 mt-2">On
                                    <a href="/post/{{ $comment->post->slug }}"
                                       class="text-blue-600 hover:text-blue-700 transition-all duration-300 ease-in-out">{{ $comment->post->title }}</a>
                                </p>
                            </div>
                            <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                    @empty
                        <p class="text-gray-600 text-sm">No comments available.</p>
                    @endforelse
                </div>
                <div class="mt-6">
                    {{ $user->comments()->paginate(10)->links() }}
                </div>
            </div>

        </div>
    </div>
</x-layout>
