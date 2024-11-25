<!-- A single plan -->
<div class=" flex flex-col justify-around shadow p-8 mx-4 w-1/4 text-center rounded {{ $color ?? 'bg-white' }}">
    <div class="flex justify-between mb-6">
        <h5 class="text-gray-700 uppercase tracking-tight font-bold">{{ $name }}</h5>

        <a href="#" class="no-underline text-blue-500 flex items-baseline font-bold leading-none">
            <span class="text-lg">$</span>
            <span class="text-4xl">{{ $price }}</span>
        </a>

    </div>

    <img src="images/lary-avatar.svg" alt="Image representing the monthly plan" class="w-60 h-60 mx-auto mb-4">

    <p class="mb-8 py-4 text-gray-900 leading-normal">
        Still undecided? Ease in with a monthly plan that can be canceled in ten seconds.
    </p>

    <a href="#"
       class="bg-blue-500 text-white no-underline uppercase py-3 px-6 rounded-full text-xs font-semibold">
        Start Posting
    </a>
</div>
