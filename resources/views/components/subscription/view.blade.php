<x-layout>

    <div class="font-serif p-6  mt-20">
        <div class="container mx-auto">
            <div class="flex">
                @include('components.navigation.plan', ['name' => 'Teams', 'price' => 499])

                @include('components.navigation.plan', ['name' => 'Monthly', 'color' => 'bg-blue-100', 'price' => 99])

                @include('components.navigation.plan', ['name' => 'Yearly', 'price' => 999])

                @include('components.navigation.plan', ['name' => 'Lifetime', 'price' => 4999])
            </div>
        </div>
    </div>

</x-layout>
