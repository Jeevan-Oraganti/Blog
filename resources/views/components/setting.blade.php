@props(['heading'])

<section class="py-8 max-w-7xl mx-auto mt-16 px-4 sm:px-6 lg:px-8">
    <nav class="mb-8 pb-4 border-b-2 border-gray-200">
        <ul class="flex justify-center space-x-6">
            <li>
                <a href="/admin/posts" class="text-lg text-gray-700 hover:text-blue-500 transition-colors {{ request()->is('admin/posts') ? 'font-semibold text-blue-500' : '' }}">
                    All Posts
                </a>
            </li>
            <li>
                <a href="/admin/users" class="text-lg text-gray-700 hover:text-blue-500 transition-colors {{ request()->is('admin/users') ? 'font-semibold text-blue-500' : '' }}">
                    All Users
                </a>
            </li>
            <li>
                <a href="/admin/post/create" class="text-lg text-gray-700 hover:text-blue-500 transition-colors {{ request()->is('admin/post/create') ? 'font-semibold text-blue-500' : '' }}">
                    New Post
                </a>
            </li>
        </ul>
    </nav>

    <h1 class="text-2xl font-semibold text-center mb-8">
        {{ $heading }}
    </h1>

    <div class="flex flex-col lg:flex-row gap-2">
        <main class="w-full">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
