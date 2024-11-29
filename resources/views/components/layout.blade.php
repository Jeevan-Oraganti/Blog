<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="font-sans bg-gray-100 text-gray-900" style="font-family: 'Open Sans', sans-serif">

    <section class="flex flex-col px-6 py-8 min-h-screen">
        <nav class="md:flex md:justify-between md:items-center bg-gray-900 p-5 shadow-lg rounded-xl fixed top-3 left-1 right-1 z-50">

            <div>
                <a href="/" class="home-icon ml-4">
                    <i class="fas fa-house fa-2x ml-4 text-blue-500 hover:text-blue-600"></i>
                </a>
            </div>

            @auth
            <div class="flex items-center ml-40">
                <form method="GET" action="{{ url()->current() }}" class="relative ml-4">
                    @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                        class="bg-gray-200 text-gray-900 rounded-full pl-4 pr-10 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="absolute right-0 top-0 mt-2 mr-2">
                        <i class="fas fa-search text-gray-400 hover:text-gray-900"></i>
                    </button>
                </form>
            </div>
            @endauth

            <div class="mt-8 md:mt-0 flex items-center mr-6">
                @auth
                <x-dropdown>
                    <x-slot name="trigger">
                        <div class="flex items-center space-x-4">
                            <button class="text-xs font-bold uppercase text-white">
                                Welcome, {{ auth()->user()->name }}
                            </button>
                            <img src="{{ auth()->user()->profileImageUrl() ?? asset('images/default-profile.svg') }}" alt="Profile Image"
                                class="w-10 h-10 rounded-full border-2 border-blue-100 shadow-xl object-cover transition-transform duration-300 ease-in-out hover:scale-110 cursor-pointer">
                        </div>
                    </x-slot>

                    @admin
                    <x-dropdown-item href="/admin/posts">Dashboard</x-dropdown-item>
                    <x-dropdown-item href="/admin/post/create" :active="request()->Is('admin/posts/create')">New Post</x-dropdown-item>
                    <x-dropdown-item href="/admin/users">All Users</x-dropdown-item>
                    <x-dropdown-item href="/admin/contacts">Contacts</x-dropdown-item>
                    <x-dropdown-item href="/blog">Blog</x-dropdown-item>
                    <x-dropdown-item href="/subscription">Subscription</x-dropdown-item>
                    @endadmin

                    <x-dropdown-item href="{{ route('user.posts') }}">All Posts</x-dropdown-item>
                    <x-dropdown-item href="{{ route('posts.create') }}">Create a Post</x-dropdown-item>
                    <x-dropdown-item href="/profile/{{ auth()->user()->id }}">Profile</x-dropdown-item>
                    <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>

                    <form id="logout-form" method="POST" action="/logout" class="hidden">
                        @csrf
                    </form>
                </x-dropdown>

                <a href="/contact-us">
                    <i class="fas fa-phone fa-1x ml-4 mr-4" style="color: dodgerblue;"></i>
                </a>
                @else

                <a href="/register" class="text-xs font-bold uppercase text-gray-900">Register</a>
                <a href="/login" class="ml-4 mr-4 text-xs text-blue-500 font-bold uppercase">Log In</a>
                <a href="/contact-us">
                    <i class="fa-solid fa-phone fa-1x ml-4 mr-4" style="color: dodgerblue;"></i>
                </a>
                @endauth

                <div x-data="{ open: false }" @click.away="open = false" class="relative">
                    <button id="menu-toggle" @click="open = !open"
                        class="bg-blue-500 ml-4 rounded-full text-xs font-semibold text-white uppercase py-2 px-5 transition duration-300 ease-in-out transform hover:scale-105">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div id="menu" x-show="open" x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 transform scale-100"
                        x-transition:leave-end="opacity-0 transform scale-95"
                        class="absolute right-0 bg-white shadow-md rounded-lg mt-2 py-2 w-48">
                        @auth
                        @foreach ($navItems as $item)
                        @if (!$item->is_disabled)
                        <?php
                        printf(
                            '<a href="%s" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-blue-500 transition duration-150 ease-in-out" %s>
                        <i class="%s"></i> %s
                    </a>',
                            $item->url,
                            isset($item->onclick) ? '@click.prevent="' . $item->onclick . '"' : '',
                            $item->icon_url,
                            $item->name
                        );
                        ?>
                        @else
                        <?php
                        printf(
                            '<span class="block px-4 py-2 text-sm text-gray-700 cursor-not-allowed">
                        <i class="%s"></i> %s
                    </span>',
                            $item->icon_url,
                            $item->name
                        );
                        ?>
                        @endif
                        @endforeach

                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>
                        @else
                        <a href="/register" class="text-xs font-bold uppercase text-gray-900">Register</a>
                        <a href="/login" class="ml-4 mr-4 text-xs text-blue-500 font-bold uppercase">Log In</a>
                        <a href="/contact-us">
                            <i class="fa-solid fa-phone fa-1x ml-4 mr-4" style="color: dodgerblue;"></i>
                        </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <main>
            <div class="mt-20 relative isolate">
                <svg class="absolute inset-x-0 top-0 -z-10 h-[64rem] w-full stroke-gray-200 [mask-image:radial-gradient(32rem_32rem_at_center,white,transparent)]" aria-hidden="true">
                    <defs>
                        <pattern id="1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84" width="200" height="200" x="50%" y="-1" patternUnits="userSpaceOnUse">
                            <path d="M.5 200V.5H200" fill="none" />
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" stroke-width="0" fill="url(#1f932ae7-37de-4c0a-a8b0-a6e3b4d44b84)" />
                </svg>
                <div class="absolute left-1/2 right-0 top-0 -z-10 -ml-24 transform-gpu overflow-hidden blur-3xl lg:ml-24 xl:ml-48" aria-hidden="true">
                    <div class="aspect-[801/1036] w-[50.0625rem] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(63.1% 29.5%, 100% 17.1%, 76.6% 3%, 48.4% 0%, 44.6% 4.7%, 54.5% 25.3%, 59.8% 49%, 55.2% 57.8%, 44.4% 57.2%, 27.8% 47.9%, 35.1% 81.5%, 0% 97.7%, 39.2% 100%, 35.2% 81.4%, 97.2% 52.8%, 63.1% 29.5%)"></div>
                </div>
                <div class="overflow-hidden">
                    <div class="mx-auto max-w-7xl px-6 pb-32 pt-36 sm:pt-60 lg:px-8 lg:pt-32">
                        <div class="mx-auto max-w-2xl gap-x-14 lg:mx-0 lg:flex lg:max-w-none lg:items-center">
                            <div class="relative w-full lg:max-w-xl lg:shrink-0 xl:max-w-2xl">
                                <h1 class="text-5xl font-semibold tracking-tight text-gray-900 sm:text-7xl">Welcome to Our Blog</h1>
                                <p class="mt-8 text-lg font-medium text-gray-500 sm:max-w-md sm:text-xl/8 lg:max-w-none">Dive into a world of insightful articles, tips, and stories. Our blog is your go-to source for the latest trends, expert advice, and inspiring content. Stay informed and entertained with our diverse range of posts.</p>
                                <div class="mt-10 flex items-center gap-x-6">
                                    <a href="#posts" class="rounded-md bg-blue-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Explore Posts</a>
                                </div>
                            </div>
                            <div class="mt-14 flex justify-end gap-8 sm:-mt-44 sm:justify-start sm:pl-20 lg:mt-0 lg:pl-0">
                                <div class="ml-auto w-44 flex-none space-y-8 pt-32 sm:ml-0 sm:pt-80 lg:order-last lg:pt-36 xl:order-none xl:pt-80">
                                    <div class="relative">
                                        <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&h=528&q=80" alt="" class="aspect-[2/3] w-full rounded-xl object-cover shadow-lg">
                                    </div>
                                </div>
                                <div class="mr-auto w-44 flex-none space-y-8 sm:mr-0 sm:pt-52 lg:pt-36">
                                    <div class="relative">
                                        <img src="https://images.unsplash.com/photo-1485217988980-11786ced9454?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&h=528&q=80" alt="" class="aspect-[2/3] w-full rounded-xl object-cover shadow-lg">
                                    </div>
                                    <div class="relative">
                                        <img src="https://images.unsplash.com/photo-1559136555-9303baea8ebd?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=focalpoint&fp-x=.4&w=396&h=528&q=80" alt="" class="aspect-[2/3] w-full rounded-xl object-cover shadow-lg">
                                    </div>
                                </div>
                                <div class="w-44 flex-none space-y-8 pt-32 sm:pt-0">
                                    <div class="relative">
                                        <img src="https://images.unsplash.com/photo-1670272504528-790c24957dda?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&crop=left&w=400&h=528&q=80" alt="" class="aspect-[2/3] w-full rounded-xl object-cover shadow-lg">
                                    </div>
                                    <div class="relative">
                                        <img src="https://images.unsplash.com/photo-1670272505284-8faba1c31f7d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&h=528&q=80" alt="" class="aspect-[2/3] w-full rounded-xl object-cover shadow-lg">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </main>

        <div class="mt-24 mb-10">
            {{$slot}}
        </div>

        <footer id="newsletter" class="relative w-full bg-gray-800 text-white border border-black border-opacity-5 rounded-xl text-center py-8 px-10 mt-auto">
            <i class="fas fa-envelope mx-auto mb-6 text-blue-400 text-8xl" style="width: 200px;"></i>
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-700 rounded-full">
                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                        @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>
                            <div>
                                <input id="email" name="email" type="text" placeholder="Your email address"
                                    class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none text-gray-900">

                                @error('email')
                                <span class="text-xs text-red-500">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
            <div class="mt-6 text-xs text-gray-400">
                © <?php
                    $copyYear = 2008;
                    $curYear  = date('Y');
                    echo $copyYear . (($copyYear != $curYear) ? '-' . $curYear : '');
                    ?> Copyright
            </div>
        </footer>
    </section>

    <x-flash />
</body>

</html>