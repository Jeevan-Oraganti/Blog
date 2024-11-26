<!-- Plan Component -->
<div class="flex flex-col justify-around shadow p-8 mx-8 w-1/4 text-center rounded-xl {{ $effects ?? 'bg-gray-100' }}">
    <div class="flex justify-between mb-6">
        <h5 class="text-gray-700 uppercase tracking-tight font-bold">{{ $name }}</h5>

        <a href="#" class="no-underline text-blue-500 flex flex-col items-end font-bold leading-none text-right">
            <div class="flex items-start">
                <span class="text-3xl mr-1">$</span>
                <span class="text-4xl">{{ $price }}</span>
            </div>
            @if(isset($original_price))
                <span class="text-lg line-through text-gray-500 mr-2">${{ $original_price }}</span>
            @endif
        </a>

    </div>

    <img src="{{ $image }}" class="w-40 h-40 mx-auto mb-4">

    <p class="mb-8 py-4 text-gray-900 leading-normal">
        {{ $excerpt }}
    </p>

    <a href="#"
       class="bg-blue-500 text-white no-underline uppercase py-3 px-6 rounded-full text-xs font-semibold">
        Start Posting
    </a>
</div>
