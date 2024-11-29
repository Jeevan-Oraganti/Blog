@if(session()->has('success'))
    <div x-data="{ show:true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         x-transition:leave="transition ease-in duration-300 transform opacity-0"
         x-transition:enter="transition ease-out duration-300 transform opacity-100"
         class="mt-20 fixed top-5 right-5 bg-blue-500 text-white py-3 px-6 rounded-lg shadow-lg text-sm flex items-center space-x-3">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>

        <p>{{ session('success') }}</p>
    </div>
@endif

@if(session()->has('error'))
    <div x-data="{ show:true }"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         x-transition:leave="transition ease-in duration-300 transform opacity-0"
         x-transition:enter="transition ease-out duration-300 transform opacity-100"
         class="mt-20 fixed top-5 right-5 bg-red-500 text-white py-3 px-6 rounded-lg shadow-lg text-sm flex items-center space-x-3">

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
        </svg>

        <p>{{ session('error') }}</p>
    </div>
@endif
