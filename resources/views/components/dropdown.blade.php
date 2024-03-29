@props(['trigger'])

<div 
    x-data="{ show: false }" 
    @click.away="show = false"
    class="relative">

    {{-- Links --}}
    <div @click="show = !show">
        {{ $trigger }}
    </div>

    {{-- Links --}}
    <div 
        x-show="show" 
        class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50 overflow-auto max-h-52 border border-black border-opacity-0 hover:border-opacity-5"
        style="display: none">

        {{ $slot }}
    </div>
</div>