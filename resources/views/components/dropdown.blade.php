@props(['$trigger'])
<div x-data="{ show: false}" @click.away="show = false" class="relative">
    {{--Trigger--}}
    <div @click="show = ! show">
        {{ $trigger }}
    </div>
    {{--Links--}}
    <div x-show="show" class="py-4 absolute bg-gray-100 w-full mt-1 rounded-xl z-50 overflow-y-auto max-h-60 ">
        {{$slot}}
    </div>

</div>
