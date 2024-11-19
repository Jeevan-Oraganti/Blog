<x-layout>
    <div class="flex items-center justify-center">
        <div class="text-center">
            <h5 class="mt-20 mb-20">Navigation fetched from Database</h5>

            <div class="mt-8 md:mt-0 flex items-center justify-center mr-6">
                @auth
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name }} Fetching from Database</button>
                    </x-slot>

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
                </x-dropdown>
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
</x-layout>