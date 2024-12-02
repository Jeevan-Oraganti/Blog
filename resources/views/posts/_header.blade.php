<main>
    <div class="relative isolate overflow-hidden bg-gradient-to-b from-indigo-100/20 pt-14">
        <svg
            class="absolute inset-x-0 top-0 -z-10 h-[64rem] w-full stroke-gray-200 [mask-image:radial-gradient(32rem_32rem_at_center,white,transparent)]"
            aria-hidden="true">
            <defs>
                <pattern id="1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84" width="200" height="200" x="50%" y="-1"
                         patternUnits="userSpaceOnUse">
                    <path d="M.5 200V.5H200" fill="none"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84)"/>
        </svg>
        <div
            class="absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48"
            aria-hidden="true">
            <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30"
                 style="clip-path: polygon(63.1% 29.5%, 100% 17.1%, 76.6% 3%, 48.4% 0%, 44.6% 4.7%, 54.5% 25.3%, 59.8% 49%, 55.2% 57.8%, 44.4% 57.2%, 27.8% 47.9%, 35.1% 81.5%, 0% 97.7%, 39.2% 100%, 35.2% 81.4%, 97.2% 52.8%, 63.1% 29.5%)"></div>
        </div>
        <div class="overflow-hidden">
            <div class="mx-auto max-w-7xl px-6 pb-32 pt-36 sm:pt-60 lg:px-8 lg:pt-32">
                <div class="mx-auto max-w-2xl gap-x-14 lg:mx-0 lg:flex lg:max-w-none lg:items-center">
                    <div class="relative w-full lg:max-w-xl lg:shrink-0 xl:max-w-2xl">
                        <h1 class="text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">Welcome to Our Blog,
                            @auth
                                <span class="text-blue-500">{{ auth()->user()->name }}</span></h1>
                        <h1 class="mt-6 text-5xl font-semibold tracking-tight text-gray-500 sm:text-2xl">We're glad
                            you are
                            here.</h1>
                        @else
                            <span class="text-blue-500">Guest</span>
                            <h1 class="mt-6 text-2xl font-semibold tracking-tight text-gray-500 sm:text-2xl">Please <a
                                    href="/login" class="text-blue-500">Login</a> to create Post. </h1>
                        @endauth
                        <p class="mt-6 text-lg font-medium text-gray-500 sm:max-w-md sm:text-xl/8 lg:max-w-none">
                            Dive
                            into a world of insightful articles, tips, and stories. Our blog is your go-to source
                            for
                            the latest trends, expert advice, and inspiring content. Stay informed and entertained
                            with
                            our diverse range of posts.</p>
                        <div class="mt-10 flex items-center gap-x-6">
                            <a href="#posts"
                               class="rounded-md bg-blue-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Explore
                                Posts</a>
                        </div>
                    </div>
                    <div class="mt-14 flex justify-end gap-8 sm:-mt-44 sm:justify-start sm:pl-20 lg:mt-0 lg:pl-0">
                        <div
                            class="ml-auto w-44 flex-none space-y-8 pt-32 sm:ml-0 sm:pt-80 lg:order-last lg:pt-36 xl:order-none xl:pt-80">
                            <div class="relative">
                                <img
                                    src="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&h=528&q=80"
                                    alt="" class="aspect-[2/3] w-full rounded-xl object-cover shadow-lg">
                            </div>
                        </div>
                        <div class="mr-auto w-44 flex-none space-y-8 sm:mr-0 sm:pt-52 lg:pt-36">
                            <div class="relative">
                                <img
                                    src="https://images.unsplash.com/photo-1485217988980-11786ced9454?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&h=528&q=80"
                                    alt="" class="aspect-[2/3] w-full rounded-xl object-cover shadow-lg">
                            </div>
                            <div class="relative">
                                <img
                                    src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-x=.4&w=396&h=528&q=80"
                                    alt="" class="aspect-[2/3] w-full rounded-xl object-cover shadow-lg">
                            </div>
                        </div>
                        <div class="w-44 flex-none space-y-8 pt-32 sm:pt-0">
                            <div class="relative">
                                <img
                                    src="https://images.unsplash.com/photo-1670272504528-790c24957dda?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=left&w=400&h=528&q=80"
                                    alt="" class="aspect-[2/3] w-full rounded-xl object-cover shadow-lg">
                            </div>
                            <div class="relative">
                                <img
                                    src="https://images.unsplash.com/photo-1670272505284-8faba1c31f7d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&h=528&q=80"
                                    alt="" class="aspect-[2/3] w-full rounded-xl object-cover shadow-lg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>

<header id="posts" class="max-w-2xl mx-auto text-center mt-16">
    <h1 class="text-5xl font-bold">
        Discover the <span class="text-blue-500">Latest Posts</span> on Our Blog
    </h1>

    <div class="space-y-4 lg:space-y-0 lg:space-x-6 mt-6">
        <div class="relative lg:inline-flex bg-gray-100 rounded-full shadow-md px-4 py-2">
            <x-category-dropdown/>
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
