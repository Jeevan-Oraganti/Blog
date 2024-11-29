<header id="posts" class="max-w-2xl mx-auto mt-20 text-center">
    <h1 class="text-5xl font-bold">
        Discover the <span class="text-blue-500">Latest Posts</span> on Our Blog
    </h1>

    <div class="space-y-4 lg:space-y-0 lg:space-x-6 mt-6">
        <div class="relative lg:inline-flex bg-gray-100 rounded-full shadow-md px-4 py-2">
            <x-category-dropdown />
        </div>

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-full shadow-md px-4 py-2">
            <form method="GET" action="/">
                @if(request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input type="text"
                    name="search"
                    placeholder="Search for something..."
                    class="bg-transparent text-black rounded-full pl-4 pr-10 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ request('search') }}">
            </form>
        </div>
    </div>
</header>