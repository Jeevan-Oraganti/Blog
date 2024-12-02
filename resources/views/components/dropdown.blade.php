@props(['$trigger'])
<div x-data="{ show: false }"
     @click.away="show = false"
     class="relative">
    {{-- Trigger --}}
    <div @click="show = !show" x-ref="trigger">
        {{ $trigger }}
    </div>

    {{-- Links --}}
    <div x-show="show" x-transition
         class="py-4 absolute bg-gray-100 mt-1 rounded-xl z-50 overflow-y-auto max-h-60 w-auto"
         style="min-width: 100%;"
         x-bind:style="{ width: $refs.trigger.offsetWidth + 'px' }">
        {{$slot}}
    </div>
</div>
