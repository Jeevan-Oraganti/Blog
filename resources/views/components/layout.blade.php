<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">

        <div>
            <a href="/" style="display: inline-block; cursor: pointer; transition: color 0.3s ease;">
                <i
                    class="fa-solid fa-house fa-2x ml-4"
                    style="color: black;"
                    onmouseover="this.style.color='dodgerblue';"
                    onmouseout="this.style.color='black';">
                </i>
{{--                <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">--}}
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            @auth
                <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }}</span>

                <form method="POST" action="/logout" class="text-xs font-bold uppercase text-blue-500 ml-6">
                    @csrf
                    <button type="submit">Log Out</button>
                </form>
                <a href="/contact-us">
                    <i class="fa-solid fa-phone fa-1x ml-4 mr-4" style="color: dodgerblue;"></i>
                </a>
                <span class="disabled" title="About Us">
                    <i class="fa-solid fa-info-circle fa-1x ml-4 mr-4"></i>
                </span>
            @else
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="ml-4 mr-4 text-xs text-blue-500 font-bold uppercase">Log In</a>
                <a href="/contact-us">
                    <i class="fa-solid fa-phone fa-1x ml-4 mr-4" style="color: dodgerblue;"></i>
                </a>
            @endauth
            <a href="#" class="bg-blue-500 ml-4 rounded-full text-xs font-semibold text-white uppercase py-2 px-5">
                <i class="fa-solid fa-bars"></i>
            </a>
        </div>
    </nav>


    {{$slot}}


    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="#" class="lg:flex text-sm">
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>

                        <input id="email" type="text" placeholder="Your email address"
                               class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                    </div>

                    <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </footer>
</section>
<x-flash/>
</body>
