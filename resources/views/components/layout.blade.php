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
    <nav
        class="md:flex md:justify-between md:items-center bg-gray-900 p-5 shadow-lg rounded-xl fixed top-3 left-3 right-3 z-50 bg-grey-700 backdrop-blur-sm transition-all duration-300">

        <div>
            <a href="/" class="home-icon ml-4">
                <i class="fas fa-house fa-2x ml-4 text-blue-500 hover:text-blue-600"></i>
            </a>
        </div>

        @auth
            <div class="flex items-center ml-40">
                <form method="GET" action="{{ url()->current() }}" class="relative ml-2">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input type="text" name="search" placeholder="Search..." value="{{ request('search') }}"
                           class="bg-gray-700 text-white rounded-full pl-4 pr-10 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit" class="absolute right-0 top-0 mt-2 mr-2">
                        <i class="fas fa-search text-gray-400 hover:text-gray-900"></i>
                    </button>
                </form>
            </div>
        @endauth

        <div class="mt-8 md:mt-0 flex items-center mr-6">
            <!-- @auth
                <x-dropdown>
                    <x-slot name="trigger">
                        <div class="flex items-center mr-4">
                            <img src="{{ auth()->user()->profileImageUrl() ?? asset('images/default-profile.svg') }}"
                                alt="Profile Image"
                                class="w-10 h-10 rounded-full border-2 border-blue-100 shadow-xl object-cover transition-transform duration-300 ease-in-out hover:scale-110 cursor-pointer">
                        </div>
                    </x-slot>

                    @admin
                    <x-dropdown-item href="/admin/posts">Dashboard</x-dropdown-item>
                    <x-dropdown-item href="/admin/post/create" :active="request()->Is('admin/posts/create')">New Post
                    </x-dropdown-item>
                    <x-dropdown-item href="/admin/contacts">Contacts</x-dropdown-item>
                    <x-dropdown-item href="/blog">Blog</x-dropdown-item>
                    @endadmin

                    <x-dropdown-item href="{{ route('user.posts') }}">All Posts</x-dropdown-item>
                    <x-dropdown-item href="{{ route('posts.create') }}">New Post</x-dropdown-item>
                    <x-dropdown-item href="/profile/{{ auth()->user()->id }}">My Profile</x-dropdown-item>
                    <x-dropdown-item href="/subscription">Subscription</x-dropdown-item>
                    <x-dropdown-item href="#" x-data="{}"
                        @click.prevent="document.querySelector('#logout-form').submit()">Log Out
                    </x-dropdown-item>

                    <form id="logout-form" method="POST" action="/logout" class="hidden">
                        @csrf
                </form>
            </x-dropdown>





            @else

                <a href="/register" class="text-xs font-bold uppercase text-gray-900">Register</a>
                <a href="/login" class="ml-4 mr-4 text-xs text-blue-500 font-bold uppercase">Log In</a>
                <a href="/contact-us">
                    <i class="fa-solid fa-phone fa-1x ml-4 mr-4" style="color: dodgerblue;"></i>
                </a>




            @endauth -->

            @auth

                <div x-data="{ open: false }" @click.away="open = false" class="relative">
                    <button id="menu-toggle" @click="open = !open"
                            class="rounded-full text-xs font-semibold text-white uppercase transition duration-300 ease-in-out transform hover:scale-105">
                        <div class="flex items-center mr-4">
                            <img src="{{ auth()->user()->profileImageUrl() ?? asset('images/default-profile.svg') }}"
                                 alt="Profile Image"
                                 class="w-10 h-10 rounded-full border-2 border-blue-100 shadow-xl object-cover transition-transform duration-300 ease-in-out hover:scale-110 cursor-pointer">
                        </div>
                    </button>
                    <div id="menu" x-show="open" x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="opacity-100 transform scale-100"
                         x-transition:leave-end="opacity-0 transform scale-95"
                         class="absolute right-0 bg-white shadow-md rounded-lg mt-2 py-2 w-48">

                        @foreach ($navItems as $item)

                            {{--                        @if (!$item->is_disabled)--}}
                            {{--                        <?php--}}
                            {{--                        printf(--}}
                            {{--                            '<a href="%s" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-blue-500 transition duration-150 ease-in-out" %s>--}}
                            {{--                        <i class="%s"></i> %s--}}
                            {{--                    </a>',--}}
                            {{--                            $item->url,--}}
                            {{--                            isset($item->onclick) ? '@click.prevent="' . $item->onclick . '"' : '',--}}
                            {{--                            $item->icon_url,--}}
                            {{--                            $item->name--}}
                            {{--                        );--}}
                            {{--                        ?>--}}
                            {{--                        @else--}}
                            {{--                        <?php--}}
                            {{--                        printf(--}}
                            {{--                            '<span class="block px-4 py-2 text-sm text-gray-700 cursor-not-allowed">--}}
                            {{--                        <i class="%s"></i> %s--}}
                            {{--                    </span>',--}}
                            {{--                            $item->icon_url,--}}
                            {{--                            $item->name--}}
                            {{--                        );--}}
                            {{--                        ?>--}}
                            {{--                        @endif--}}

                            @if (!$item->is_disabled && $item->name != 'Log Out')
                                @if (!$item->is_featured)
                                    @if (strpos($item->name, 'Profile') !== false)
                                        <x-dropdown-item href="/profile/{{ auth()->user()->id }}"
                                                         :active="request()->is('profile/*')">
                                            <i class="{{ $item->icon_url }}"></i> {{ $item->name }}
                                        </x-dropdown-item>
                                    @else
                                        <x-dropdown-item href="{{ $item->url }}"
                                                         :active="request()->is(ltrim($item->url, '/'))">
                                            <i class="{{ $item->icon_url }}"></i> {{ $item->name }}
                                        </x-dropdown-item>
                                    @endif
                                @endif
                            @endif
                        @endforeach

                        @admin
                        @foreach ($navItems as $item)
                            @if ($item->is_featured && !$item->is_disabled && $item->name != 'Log Out')
                                <x-dropdown-item href="{{ $item->url }}"
                                                 :active="request()->is(ltrim($item->url, '/'))">
                                    <i class="{{ $item->icon_url }}"></i> {{ $item->name }}
                                </x-dropdown-item>
                            @endif
                        @endforeach
                        @endadmin
                        @if ($item->name == 'Log Out')
                            <x-dropdown-item href="#" x-data="{}"
                                             @click.prevent="document.querySelector('#logout-form').submit()">
                                <i class="{{ $item->icon_url }}"></i> {{ $item->name }}
                            </x-dropdown-item>
                            <form id="logout-form" method="POST" action="/logout" class="hidden">
                                @csrf
                            </form>
                        @endif
                        @else
                            <a href="/register" class="text-xs font-bold uppercase text-white">Register</a>
                            <a href="/login" class="ml-4 mr-4 text-xs text-blue-500 font-bold uppercase">Log In</a>
                            <a href="/contact-us">
                                <i class="fa-solid fa-phone fa-1x ml-4 mr-4" style="color: dodgerblue;"></i>
                            </a>
                        @endauth
                    </div>
                </div>
        </div>
    </nav>

    <div class="mb-10">
        {{$slot}}
    </div>

    <footer id="newsletter"
            class="mt-20 relative w-full bg-gray-800 text-white border border-black border-opacity-5 rounded-xl text-center py-8 px-10">
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
                                   class="text-white lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

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

        <div class="mt-6 flex justify-center items-center space-x-4">
            <a href="#posts" class="flex items-center text-blue-500 hover:text-blue-600">
                <span class="ml-2 text-sm">Home</span>
            </a>
            <a href="#" class="flex items-center text-blue-500 hover:text-blue-600">
                <span class="ml-2 text-sm">About Us</span>
            </a>
            <a href="/contact-us" class="flex items-center text-blue-500 hover:text-blue-600">
                {{-- <i class="fas fa-phone fa-2x" style="color: dodgerblue;"></i>--}}
                <span class="ml-2 text-sm">Contact Us</span>
            </a>
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

<x-flash/>
</body>

</html>
