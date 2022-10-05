@props(['name'])

<div class="mb-6">

    <x-form.label name="{{ $name }}" />
    
    <input 
        class="w-full px-3 py-2 rounded-xl placeholder-gray-200 font-semibold text-sm border border-gray-200"
        name="{{ $name }}" 
        id="{{ $name }}"
        {{ $attributes }}>

    <x-form.error name="{{ $name }}" />

</div>