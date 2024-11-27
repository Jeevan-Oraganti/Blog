@props(['heading'])

<section class="py-8 max-w-6xl mx-auto mt-10">
    <h1 class="text-xl font-bold text-center mb-6 pb-8 border-b z-50">
        {{ $heading }}
    </h1>

    <div class="flex flex-wrap">
        <aside class="w-full sm:w-1/4 lg:w-1/5 flex-shrink-0">
            <h4 class="font-bold mb-6">Links</h4>
            <ul>
                <li class="mb-2">
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All Posts</a>
                </li>
                <li class="mb-2">
                    <a href="/admin/users" class="{{ request()->is('admin/users') ? 'text-blue-500' : '' }}">All Users</a>
                </li>
                <li>
                    <a href="/admin/post/create" class="{{ request()->is('admin/post/create') ? 'text-blue-500' : '' }}">New Post</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1 w-full">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
